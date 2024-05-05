<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Page;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    // Metoda koja prikazuje sve elemente izbornika
    public function index()
    {
        $menuItems = MenuItem::all();
        return view('cms.menu_items.index', compact('menuItems'));
    }

    // Metoda koja prikazuje formu za stvaranje novog elementa izbornika
    public function create()
    {
        $pages = Page::all();
        return view('cms.menu_items.create', compact('pages'));
    }

    // Metoda koja sprema novi element izbornika u bazu podataka
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'url' => 'required|max:255',
            'page_id' => 'required|exists:pages,id',
        ]);

        $menuItem = new MenuItem();
        $menuItem->title = $request->input('title');
        $menuItem->url = $request->input('url');
        $menuItem->page_id = $request->input('page_id');
        $menuItem->save();

        return redirect()->route('cms.menu_items.index')->with('success', 'Element izbornika je uspješno stvoren.');
    }

    // Metoda koja prikazuje formu za uređivanje postojećeg elementa izbornika
    public function edit(MenuItem $menuItem)
    {
        $pages = Page::all();
        return view('cms.menu_items.edit', compact('menuItem', 'pages'));
    }

    // Metoda koja ažurira element izbornika u bazi podataka
    public function update(Request $request, MenuItem $menuItem)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'url' => 'required|max:255',
            'page_id' => 'required|exists:pages,id',
        ]);

        $menuItem->title = $request->input('title');
        $menuItem->url = $request->input('url');
        $menuItem->page_id = $request->input('page_id');
        $menuItem->save();

        return redirect()->route('cms.menu_items.index')->with('success', 'Element izbornika je uspješno ažuriran.');
    }

    // Metoda koja briše element izbornika iz baze podataka
    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();

        return redirect()->route('cms.menu_items.index')->with('success', 'Element izbornika je uspješno izbrisan.');
    }
}
