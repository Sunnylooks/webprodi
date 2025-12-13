<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $this->authorizeSuperAdmin();
        $users = User::with('program')->orderBy('name')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $this->authorizeSuperAdmin();
        $programs = Program::orderBy('name')->get();
        return view('admin.users.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $this->authorizeSuperAdmin();
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:kaprodi,superadmin',
            'program_id' => 'nullable|exists:programs,id',
        ]);

        if ($data['role'] === 'kaprodi' && !$data['program_id']) {
            return back()->withErrors(['program_id' => 'Program harus dipilih untuk role kaprodi'])->withInput();
        }

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect('/admin/users')->with('success', 'User berhasil ditambahkan');
    }

    public function edit(int $id)
    {
        $this->authorizeSuperAdmin();
        $user = User::findOrFail($id);
        $programs = Program::orderBy('name')->get();
        return view('admin.users.edit', compact('user', 'programs'));
    }

    public function update(Request $request, int $id)
    {
        $this->authorizeSuperAdmin();
        $user = User::findOrFail($id);
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:kaprodi,superadmin',
            'program_id' => 'nullable|exists:programs,id',
        ]);

        if ($data['role'] === 'kaprodi' && !$data['program_id']) {
            return back()->withErrors(['program_id' => 'Program harus dipilih untuk role kaprodi'])->withInput();
        }

        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect('/admin/users')->with('success', 'User berhasil diperbarui');
    }

    public function destroy(int $id)
    {
        $this->authorizeSuperAdmin();
        $user = User::findOrFail($id);
        
        // Jangan hapus superadmin terakhir
        if ($user->role === 'superadmin' && User::where('role', 'superadmin')->count() === 1) {
            return back()->withErrors(['error' => 'Tidak dapat menghapus superadmin terakhir']);
        }

        $user->delete();
        return redirect('/admin/users')->with('success', 'User berhasil dihapus');
    }

    protected function authorizeSuperAdmin(): void
    {
        if (Auth::user()?->role !== 'superadmin') {
            abort(403);
        }
    }
}
