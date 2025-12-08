<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Program;
use App\Models\ProgramPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProgramPageController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = ProgramPage::with('program');
        if ($user->role === 'kaprodi') {
            $query->where('program_id', $user->program_id);
        }
        if ($request->filled('program_id')) {
            $query->where('program_id', (int) $request->input('program_id'));
        }
        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }
        if ($request->filled('q')) {
            $q = trim((string) $request->input('q'));
            $query->where(function($w) use ($q) {
                $w->where('title','like',"%$q%")
                  ->orWhere('slug','like',"%$q%")
                  ->orWhere('content','like',"%$q%");
            });
        }
        $query->orderBy('program_id')->orderBy('category')->orderBy('sort_order');
        $pages = $query->paginate(20)->withQueryString();
        $programs = $user->role === 'superadmin'
            ? Program::orderBy('name')->get()
            : Program::where('id', $user->program_id)->get();
        $categories = [
            'SOP & Tata Kelola', 'Profil', 'Informasi', 'Panduan', 'Perkuliahan', 'Formulir', 'Mahasiswa', 'Survey', 'Data TI'
        ];
        return view('admin.pages.index', compact('pages','programs','categories'));
    }

    public function create()
    {
        $user = Auth::user();
        $programs = $user->role === 'superadmin'
            ? Program::orderBy('name')->get()
            : Program::where('id', $user->program_id)->get();
        $categories = [
            'SOP & Tata Kelola', 'Profil', 'Informasi', 'Panduan', 'Perkuliahan', 'Formulir', 'Mahasiswa', 'Survey', 'Data TI'
        ];
        return view('admin.pages.create', compact('programs', 'categories'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'attachments.*' => 'file|max:5120',
        ]);

        if ($user->role === 'kaprodi' && (int)$data['program_id'] !== (int)$user->program_id) {
            abort(403);
        }

        $data['slug'] = Str::slug($data['title']);
        $page = ProgramPage::create([
            'program_id' => $data['program_id'],
            'category' => $data['category'],
            'title' => $data['title'],
            'slug' => $data['slug'],
            'content' => $data['content'] ?? null,
            'sort_order' => $data['sort_order'] ?? 0,
            'is_published' => true,
        ]);

        if ($request->hasFile('attachments')) {
            $uploadDir = public_path('uploads');
            if (!is_dir($uploadDir)) {
                @mkdir($uploadDir, 0775, true);
            }
            foreach ($request->file('attachments') as $file) {
                if (!$file || !$file->isValid()) {
                    continue;
                }
                $originalName = $file->getClientOriginalName();
                $clientMime = $file->getClientMimeType();
                $size = $file->getSize();

                $filename = uniqid('att_').'.'.$file->getClientOriginalExtension();
                $file->move($uploadDir, $filename);

                Attachment::create([
                    'program_page_id' => $page->id,
                    'file_path' => 'uploads/'.$filename,
                    'original_name' => $originalName,
                    'mime_type' => $clientMime,
                    'size' => $size,
                ]);
            }
        }

        return redirect('/admin/pages');
    }

    public function edit(int $id)
    {
        $user = Auth::user();
        $page = ProgramPage::with('program', 'attachments')->findOrFail($id);
        if ($user->role === 'kaprodi' && $page->program_id !== $user->program_id) {
            abort(403);
        }
        $programs = $user->role === 'superadmin'
            ? Program::orderBy('name')->get()
            : Program::where('id', $user->program_id)->get();
        $categories = [
            'SOP & Tata Kelola', 'Profil', 'Informasi', 'Panduan', 'Perkuliahan', 'Formulir', 'Mahasiswa', 'Survey', 'Data TI'
        ];
        return view('admin.pages.edit', compact('page','programs','categories'));
    }

    public function update(Request $request, int $id)
    {
        $user = Auth::user();
        $page = ProgramPage::with('attachments')->findOrFail($id);
        if ($user->role === 'kaprodi' && $page->program_id !== $user->program_id) {
            abort(403);
        }
        $data = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'remove_attachments' => 'array',
            'remove_attachments.*' => 'integer',
            'attachments.*' => 'file|max:5120',
        ]);

        if ($user->role === 'kaprodi' && (int)$data['program_id'] !== (int)$user->program_id) {
            abort(403);
        }

        $page->update([
            'program_id' => $data['program_id'],
            'category' => $data['category'],
            'title' => $data['title'],
            'slug' => Str::slug($data['title']),
            'content' => $data['content'] ?? null,
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        // Remove selected attachments
        foreach ((array)($data['remove_attachments'] ?? []) as $attId) {
            $att = $page->attachments->firstWhere('id', (int)$attId);
            if ($att) {
                $path = public_path($att->file_path);
                if (is_file($path)) { @unlink($path); }
                $att->delete();
            }
        }

        // Add new attachments
        if ($request->hasFile('attachments')) {
            $uploadDir = public_path('uploads');
            if (!is_dir($uploadDir)) { @mkdir($uploadDir, 0775, true); }
            foreach ((array)$request->file('attachments') as $file) {
                if (!$file || !$file->isValid()) { continue; }
                $originalName = $file->getClientOriginalName();
                $clientMime = $file->getClientMimeType();
                $size = $file->getSize();
                $filename = uniqid('att_').'.'.$file->getClientOriginalExtension();
                $file->move($uploadDir, $filename);
                Attachment::create([
                    'program_page_id' => $page->id,
                    'file_path' => 'uploads/'.$filename,
                    'original_name' => $originalName,
                    'mime_type' => $clientMime,
                    'size' => $size,
                ]);
            }
        }

        return redirect('/admin/pages');
    }

    public function destroy(int $id)
    {
        $user = Auth::user();
        $page = ProgramPage::with('attachments')->findOrFail($id);
        if ($user->role === 'kaprodi' && $page->program_id !== $user->program_id) {
            abort(403);
        }
        foreach ($page->attachments as $att) {
            $path = public_path($att->file_path);
            if (is_file($path)) { @unlink($path); }
            $att->delete();
        }
        $page->delete();
        return redirect('/admin/pages');
    }
}
