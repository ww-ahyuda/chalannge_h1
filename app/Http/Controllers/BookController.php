<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('category')->get(); 
        return view('books.index', compact('books')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    $categories = \App\Models\BookCategory::all(); // Ambil semua kategori buku
    return view('books.create', compact('categories')); // Kirim data ke view


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|unique:books,name',
            'book_category_id' => 'required|exists:book_categories,id',
            'author' => 'required',
            'description' => 'required'
        ]);
    
        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    $book = Book::findOrFail($id); // Cari buku berdasarkan ID
    return view('books.edit', compact('book')); // Kirim data buku ke view 'books/edit.blade.php'
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)     
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'author' => 'required|string|max:255',
    ]);

    $book = Book::findOrFail($id); // Cari buku berdasarkan ID
    $book->update($request->all()); // Perbarui data buku dengan input baru

    return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id); // Cari buku berdasarkan ID
        $book->delete(); // Hapus buku dari database
    
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
    
   

  
}
