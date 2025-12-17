<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $programs = $user->role === 'superadmin'
            ? Program::orderBy('name')->get()
            : Program::where('id', $user->program_id)->get();
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        $this->authorizeAdmin();
        return view('admin.programs.create');
    }

    public function store(Request $request)
    {
        $this->authorizeAdmin();
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:programs,slug',
            'faculty' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
        Program::create($data);
        return redirect('/admin/programs');
    }

    public function edit(int $id)
    {
        $this->authorizeAdmin();
        $program = Program::findOrFail($id);
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, int $id)
    {
        $this->authorizeAdmin();
        $program = Program::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:programs,slug,'.$program->id,
            'faculty' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
        $program->update($data);
        return redirect('/admin/programs');
    }

    public function destroy(int $id)
    {
        $this->authorizeAdmin();
        $program = Program::findOrFail($id);
        $program->delete();
        return redirect('/admin/programs');
    }

    public function editHomePage(Request $request)
    {
        $user = Auth::user();
        
        if ($user->role === 'superadmin') {
            $programs = Program::orderBy('name')->get();
            $selectedProgramId = $request->get('program_id');
            
            if ($selectedProgramId) {
                $program = Program::findOrFail($selectedProgramId);
            } else {
                $program = $programs->first();
            }
            
            return view('admin.programs.edit-home', compact('program', 'programs'));
        }
        
        $program = Program::findOrFail($user->program_id);
        return view('admin.programs.edit-home', compact('program'));
    }

    public function updateHomePage(Request $request)
    {
        $user = Auth::user();
        
        $data = $request->validate([
            'home_content' => 'nullable|string',
            'program_id' => 'nullable|exists:programs,id',
        ]);
        
        if ($user->role === 'superadmin') {
            $programId = $request->input('program_id');
            if (!$programId) {
                return redirect()->back()->with('error', 'Program harus dipilih!');
            }
            $program = Program::findOrFail($programId);
        } elseif ($user->role === 'kaprodi') {
            $program = Program::findOrFail($user->program_id);
        } else {
            abort(403);
        }
        
        $program->update(['home_content' => $data['home_content']]);
        
        $redirectUrl = $user->role === 'superadmin' 
            ? route('admin.programs.edit-home', ['program_id' => $program->id])
            : route('admin.programs.edit-home');
        
        return redirect($redirectUrl)->with('success', 'Home page berhasil diupdate!');
    }

    protected function authorizeAdmin(): void
    {
        if (Auth::user()?->role !== 'superadmin') {
            abort(403);
        }
    }
}
