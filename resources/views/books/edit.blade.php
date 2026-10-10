@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f7fb;
    }

    .edit-container {
        max-width: 650px;
        margin: 40px auto;
        padding: 30px;
        background: white;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    }

    .edit-title {
        margin-bottom: 5px;
        color: #263238;
    }

    .edit-subtitle {
        color: #78909c;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #37474f;
    }

    .form-group input {
        width: 100%;
        box-sizing: border-box;
        padding: 12px 15px;
        border: 1px solid #d0d7de;
        border-radius: 10px;
        outline: none;
        font-size: 14px;
    }

    .form-group input:focus {
        border-color: #667eea;
        box-shadow: 0 0 5px rgba(102,126,234,0.3);
    }

    .btn-update {
        padding: 11px 18px;
        background: #667eea;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-weight: bold;
    }

    .btn-update:hover {
        background: #4f63c6;
    }

    .btn-kembali {
        display: inline-block;
        padding: 11px 18px;
        margin-left: 8px;
        background: #eceff1;
        color: #455a64;
        text-decoration: none;
        border-radius: 10px;
    }

    .error {
        color: #d32f2f;
        font-size: 13px;
        margin-top: 5px;
    }
</style>


<div class="edit-container">

    <h1 class="edit-title">✏️ Edit Buku</h1>

    <p class="edit-subtitle">
        Perbarui informasi buku di bawah ini.
    </p>

    <form
        method="POST"
        action="{{ route('books.update', $book) }}"
    >

        @csrf
        @method('PUT')

        {{-- JUDUL --}}
        <div class="form-group">
            <label for="title">📖 Judul Buku</label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $book->title) }}"
                placeholder="Masukkan judul buku"
                required
            >

            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>


        {{-- PENULIS --}}
        <div class="form-group">
            <label for="author">✍️ Penulis</label>

            <input
                type="text"
                id="author"
                name="author"
                value="{{ old('author', $book->author) }}"
                placeholder="Masukkan nama penulis"
                required
            >

            @error('author')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>


        {{-- STOK --}}
        <div class="form-group">
            <label for="stock">📦 Stok</label>

            <input
                type="number"
                id="stock"
                name="stock"
                value="{{ old('stock', $book->stock) }}"
                min="0"
                placeholder="Masukkan jumlah stok"
                required
            >

            @error('stock')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>


        {{-- TOMBOL --}}
        <button type="submit" class="btn-update">
            💾 Simpan Perubahan
        </button>

        <a
            href="{{ route('books.index') }}"
            class="btn-kembali"
        >
            ← Kembali
        </a>

    </form>

</div>

@endsection