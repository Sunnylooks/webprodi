<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($user->role !== 'superadmin' && $user->role !== 'kaprodi') {
            abort(403);
        }

        $query = Category::with('program');
        
        if ($user->role === 'kaprodi') {
            $query->where('program_id', $user->program_id);
        }
        
        if ($request->filled('program_id')) {
            $query->where('program_id', (int) $request->input('program_id'));
        }
        
        $categories = $query->orderBy('sort_order')->orderBy('name')->paginate(20)->withQueryString();
        
        $programs = $user->role === 'superadmin'
            ? \App\Models\Program::orderBy('name')->get()
            : \App\Models\Program::where('id', $user->program_id)->get();
            
        return view('admin.categories.index', compact('categories', 'programs'));
    }

    public function create()
    {
        $user = Auth::user();
        if ($user->role !== 'superadmin' && $user->role !== 'kaprodi') {
            abort(403);
        }
        
        $programs = $user->role === 'superadmin'
            ? \App\Models\Program::orderBy('name')->get()
            : \App\Models\Program::where('id', $user->program_id)->get();
            
        return view('admin.categories.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->role !== 'superadmin' && $user->role !== 'kaprodi') {
            abort(403);
        }
        
        $data = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer',
        ]);

        if ($user->role === 'kaprodi' && (int)$data['program_id'] !== (int)$user->program_id) {
            abort(403);
        }

        $data['slug'] = Str::slug($data['name']);
        Category::create($data);

        return redirect('/admin/categories')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(int $id)
    {
        $user = Auth::user();
        if ($user->role !== 'superadmin' && $user->role !== 'kaprodi') {
            abort(403);
        }
        
        $category = Category::with('program')->findOrFail($id);
        
        if ($user->role === 'kaprodi' && $category->program_id !== $user->program_id) {
            abort(403);
        }
        
        $programs = $user->role === 'superadmin'
            ? \App\Models\Program::orderBy('name')->get()
            : \App\Models\Program::where('id', $user->program_id)->get();
            
        return view('admin.categories.edit', compact('category', 'programs'));
    }

    public function update(Request $request, int $id)
    {
        $user = Auth::user();
        if ($user->role !== 'superadmin' && $user->role !== 'kaprodi') {
            abort(403);
        }
        
        $category = Category::findOrFail($id);
        
        if ($user->role === 'kaprodi' && $category->program_id !== $user->program_id) {
            abort(403);
        }
        
        $data = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer',
        ]);

        if ($user->role === 'kaprodi' && (int)$data['program_id'] !== (int)$user->program_id) {
            abort(403);
        }

        $data['slug'] = Str::slug($data['name']);
        $category->update($data);

        return redirect('/admin/categories')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy(int $id)
    {
        $user = Auth::user();
        if ($user->role !== 'superadmin' && $user->role !== 'kaprodi') {
            abort(403);
        }
        
        $category = Category::findOrFail($id);
        
        if ($user->role === 'kaprodi' && $category->program_id !== $user->program_id) {
            abort(403);
        }
        
        // Check if category is being used
        if ($category->pages()->count() > 0) {
            return back()->withErrors(['error' => 'Kategori tidak dapat dihapus karena masih digunakan oleh subpage']);
        }

        $category->delete();
        return redirect('/admin/categories')->with('success', 'Kategori berhasil dihapus');
    }
}

