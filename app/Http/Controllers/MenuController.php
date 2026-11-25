<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::orderBy('id')->get()->groupBy('kategori');

        $data = [
            'Main Course' => $menu->get('Main Course', collect()),
            'Dessert'     => $menu->get('Dessert', collect()),
            'Drink'       => $menu->get('Drink', collect()),
        ];

        return view('menu.index', compact('data'));
    }

    public function create()
    {
        return view('menu.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:100',
            'harga'     => 'required|integer|min:0',
            'kategori'  => 'required|in:Main Course,Dessert,Drink',
            'halal'     => 'required|in:Halal,Non Halal',
            'deskripsi' => 'nullable|string',
            'alergen'   => 'nullable|string|max:100',
            'foto'      => 'nullable|image|max:2048',
        ]);

        $namaFoto = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFoto = time() . '_' . preg_replace('/[^A-Za-z0-9._-]/', '', $file->getClientOriginalName());
            $file->move(public_path('uploads'), $namaFoto);
        }

        $menu = new Menu();
        $menu->nama      = $request->nama;
        $menu->harga     = $request->harga;
        $menu->kategori  = $request->kategori;
        $menu->halal     = $request->halal;
        $menu->deskripsi = $request->deskripsi ?? '';
        $menu->alergen   = $request->alergen ?? '';
        $menu->foto      = $namaFoto;
        $menu->save();

        return redirect('/menu')->with('sukses', 'Menu berhasil ditambahkan.');
    }
}