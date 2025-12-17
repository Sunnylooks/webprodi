<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramPage;
use App\Models\Category;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function portal()
    {
        $programs = Program::orderBy('name')->get();
        return view('portal.index', compact('programs'));
    }

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
        return $this->portal();
    }

    public function program(string $programSlug)
    {
        $program = Program::where('slug', $programSlug)->firstOrFail();
        $pages = $program->pages()->where('is_published', true)->get();
        $categories = Category::where('program_id', $program->id)->orderBy('sort_order')->orderBy('name')->get();
        $nav = $pages->groupBy('category');
        return view('program.home', compact('program', 'nav', 'categories'));
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
        $categories = Category::where('program_id', $program->id)->orderBy('sort_order')->orderBy('name')->get();
        $nav = $pages->groupBy('category');
        return view('program.subpage', compact('program', 'page', 'nav', 'categories'));
    }
}
