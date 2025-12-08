<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramPage;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function redirectToDefault()
    {
        $program = Program::orderBy('name')->first();
        if ($program) {
            return redirect('/p/'.$program->slug);
        }
        return redirect('/login');
    }

    public function index()
    {
        return $this->redirectToDefault();
    }

    public function program(string $programSlug)
    {
        $program = Program::where('slug', $programSlug)->firstOrFail();
        $pages = $program->pages()->where('is_published', true)->get();
        $nav = $pages->groupBy('category');
        return view('program.home', compact('program', 'nav'));
    }

    public function subpage(string $programSlug, string $pageSlug)
    {
        $program = Program::where('slug', $programSlug)->firstOrFail();
        $page = ProgramPage::where('program_id', $program->id)
            ->where('slug', $pageSlug)
            ->where('is_published', true)
            ->with('attachments')
            ->firstOrFail();
        $pages = $program->pages()->where('is_published', true)->get();
        $nav = $pages->groupBy('category');
        return view('program.subpage', compact('program', 'page', 'nav'));
    }
}
