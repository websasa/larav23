<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Metoda koja prikazuje sve stranice u sustavu
    public function index()
    {
        $pages = Page::all();
        return view('cms.pages.index', compact('pages'));
    }

    // Metoda koja prikazuje formu za stvaranje nove stranice
    public function create()
    {
        return view('cms.pages.create');
    }

    // Metoda koja sprema novu stranicu u bazu podataka
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $page = new Page();
        $page->title = $request->input('title');
        $page->content = $request->input('content');

        // Učitavanje i spremanje slike ako je uploadana
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $page->image = $imageName;
        }

        $page->save();

        return redirect()->route('cms.pages.index')->with('success', 'Stranica je uspješno stvorena.');
    }

    // Metoda koja prikazuje formu za uređivanje postojeće stranice
    public function edit(Page $page)
    {
        return view('cms.pages.edit', compact('page'));
    }

    // Metoda koja ažurira stranicu u bazi podataka
    public function update(Request $request, Page $page)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $page->title = $request->input('title');
        $page->content = $request->input('content');

        // Ažuriranje slike ako je uploadana
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $page->image = $imageName;
        }

        $page->save();

        return redirect()->route('cms.pages.index')->with('success', 'Stranica je uspješno ažurirana.');
    }

    // Metoda koja briše stranicu iz baze podataka
    public function destroy(Page $page)
    {
        // Brišemo i sliku ako postoji
        if ($page->image) {
            $imagePath = public_path('images/') . $page->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $page->delete();

        return redirect()->route('cms.pages.index')->with('success', 'Stranica je uspješno izbrisana.');
    }
}