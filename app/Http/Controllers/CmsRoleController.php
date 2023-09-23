<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class CMSRoleController extends Controller
{
    // Metoda koja prikazuje sve uloge u sustavu
    public function index()
    {
        $roles = Role::all();
        return view('cms.roles.index', compact('roles'));
    }

    // Metoda koja prikazuje formu za stvaranje nove uloge
    public function create()
    {
        return view('cms.roles.create');
    }

    // Metoda koja sprema novu ulogu u bazu podataka
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles|max:255',
            'description' => 'required|max:255',
        ]);

        $role = new Role();
        $role->name = $request->input('name');
        $role->description = $request->input('description');
        $role->save();

        return redirect()->route('cms.roles.index')->with('success', 'Uloga je uspješno stvorena.');
    }

    // Metoda koja prikazuje formu za uređivanje postojeće uloge
    public function edit(Role $role)
    {
        return view('cms.roles.edit', compact('role'));
    }

    // Metoda koja ažurira ulogu u bazi podataka
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:roles,name,' . $role->id,
            'description' => 'required|max:255',
        ]);

        $role->name = $request->input('name');
        $role->description = $request->input('description');
        $role->save();

        return redirect()->route('cms.roles.index')->with('success', 'Uloga je uspješno ažurirana.');
    }

    // Metoda koja briše ulogu iz baze podataka
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('cms.roles.index')->with('success', 'Uloga je uspješno izbrisana.');
    }
}