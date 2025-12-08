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

    protected function authorizeAdmin(): void
    {
        if (Auth::user()?->role !== 'superadmin') {
            abort(403);
        }
    }
}
