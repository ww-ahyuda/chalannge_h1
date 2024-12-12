<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
    return view('categories.create'); // Tampilkan form tambah kategori
    }

    public function store(Request $request)
    {
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Buat kategori baru
    \App\Models\Category::create([
        'name' => $request->name,
    ]);

    // Redirect ke halaman daftar buku dengan pesan sukses
    return redirect()->route('books.index')->with('success', 'Kategori berhasil ditambahkan!');
    }



}
