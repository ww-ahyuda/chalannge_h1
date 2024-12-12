<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Buku</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($books->isEmpty())
            <div class="alert alert-warning text-center">Tidak ada data buku</div>
        @else
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($books as $book)
                    <div class="col">
                        <div class="card h-100">
                            @if($book->image)
                                <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top" alt="{{ $book->name }}">
                            @else
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Gambar tidak tersedia">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->name }}</h5>
                                <p class="card-text">Kategori: {{ $book->category }}</p>
                                <p class="card-text">Penulis: {{ $book->author }}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>