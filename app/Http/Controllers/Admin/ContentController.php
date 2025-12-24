<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Category;
use App\Models\ProgramPage;

class ContentController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        
        // Get programs based on role
        if ($user->role === 'superadmin') {
            $programs = Program::orderBy('name')->get();
        } else {
            $programs = collect([$user->program]);
        }
        
        // Filter by program
        $selectedProgramId = $request->program_id;
        if ($user->role === 'kaprodi') {
            $selectedProgramId = $user->program_id;
        }
        
        // Get categories for selected program
        $categories = collect();
        $pages = collect();
        
        if ($selectedProgramId) {
            $categories = Category::where('program_id', $selectedProgramId)
                                  ->orderBy('sort_order')
                                  ->get();
            
            // Group pages by category
            $pages = ProgramPage::where('program_id', $selectedProgramId)
                               ->orderBy('category')
                               ->orderBy('sort_order')
                               ->get()
                               ->groupBy('category');
        }
        
        return view('admin.content.index', compact('programs', 'categories', 'pages', 'selectedProgramId'));
    }
    
    public function edit($id)
    {
        $page = ProgramPage::findOrFail($id);
        $user = auth()->user();
        
        // Authorization check
        if ($user->role === 'kaprodi' && $user->program_id != $page->program_id) {
            abort(403, 'Unauthorized');
        }
        
        return view('admin.content.edit', compact('page'));
    }
    
    public function update(Request $request, $id)
    {
        $page = ProgramPage::findOrFail($id);
        $user = auth()->user();
        
        // Authorization check
        if ($user->role === 'kaprodi' && $user->program_id != $page->program_id) {
            abort(403, 'Unauthorized');
        }
        
        $validated = $request->validate([
            'content' => 'required|string',
        ]);
        
        $page->content = $validated['content'];
        $page->save();
        
        return redirect()->route('admin.content.index', ['program_id' => $page->program_id])
                        ->with('success', 'Content berhasil diupdate');
    }
}
