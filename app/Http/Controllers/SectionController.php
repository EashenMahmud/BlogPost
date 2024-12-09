<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the sections for the about page.
     */
    public function about()
    {
        // Retrieve the sections ordered by 'order'
        $sections = Section::orderBy('order')->get();

        // Pass the sections data to the 'public.about' view
        return view('public.about', compact('sections'));
    }

    /**
     * Show the form for creating a new section.
     */
    public function create()
    {
        return view('sections.create');
    }

    /**
     * Store a newly created section in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_first' => 'required|string|max:255',
            'title_second' => 'required|string|max:255',
            'content' => 'required|string',
            'icon' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
            'order' => 'required|integer',
        ]);

        // Handle file upload
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('icons', 'public');
        }

        Section::create([
            'title_first' => $request->title_first,
            'title_second' => $request->title_second,
            'content' => $request->content,
            'icon' => $iconPath ?? null,
            'order' => $request->order,
        ]);

        return redirect()->route('sections.index')->with('success', 'Section created successfully.');
    }

    /**
     * Show the form for editing the specified section.
     */
    public function edit(Section $section)
    {
        return view('sections.edit', compact('section'));
    }

    /**
     * Update the specified section in storage.
     */
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'title_first' => 'required|string|max:255',
            'title_second' => 'required|string|max:255',
            'content' => 'required|string',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
            'order' => 'required|integer',
        ]);

        // Handle file upload
        if ($request->hasFile('icon')) {
            // Delete old icon if exists
            if ($section->icon) {
                \Storage::disk('public')->delete($section->icon);
            }
            $iconPath = $request->file('icon')->store('icons', 'public');
            $section->icon = $iconPath;
        }

        $section->title_first = $request->title_first;
        $section->title_second = $request->title_second;
        $section->content = $request->content;
        $section->order = $request->order;
        $section->save();

        return redirect()->route('sections.index')->with('success', 'Section updated successfully.');
    }

    /**
     * Remove the specified section from storage.
     */
    public function destroy(Section $section)
    {
        // Delete icon if exists
        if ($section->icon) {
            \Storage::disk('public')->delete($section->icon);
        }

        $section->delete();

        return redirect()->route('sections.index')->with('success', 'Section deleted successfully.');
    }
}
