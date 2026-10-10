@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')

<style>
    .form-container {
        max-width: 700px;
        margin: 40px auto;
        background: white;
        padding: 30px;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    }

    .form-title {
        color: #263238;
        margin-bottom: 5px;
    }

    .form-subtitle {
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

    .error {
        color: #d32f2f;
        font-size: 13px;
        margin-top: 5px;
        display: block;
    }

    .form-buttons {
        margin-top: 25px;
        display: flex;
        gap: 10px;
    }

    .btn-simpan {
        padding: 11px 20px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-weight: bold;
    }

    .btn-simpan:hover {
        opacity: 0.9;
    }

    .btn-kembali {
        padding: 11px 20px;
        background: #eceff1;
        color: #37474f;
        text-decoration: none;
        border-radius: 10px;
        font-weight: bold;
    }

    .btn-kembali:hover {
        background: #cfd8dc;
    }
</style>

<div class="form-container">

    <h1 class="form-title">📚 Tambah Buku</h1>

    <p class="form-subtitle">
        Masukkan data buku baru ke dalam koleksi
    </p>

    <form action="{{ route('books.store') }}" method="POST">

        @csrf

        {{-- JUDUL --}}
        <div class="form-group">
            <label for="title">📖 Judul Buku</label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
                placeholder="Masukkan judul buku"
            >

            @error('title')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        {{-- PENULIS --}}
        <div class="form-group">
            <label for="author">✍️ Penulis</label>

            <input
                type="text"
                id="author"
                name="author"
                value="{{ old('author') }}"
                placeholder="Masukkan nama penulis"
            >

            @error('author')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        {{-- STOK --}}
        <div class="form-group">
            <label for="stock">📦 Stok</label>

            <input
                type="number"
                id="stock"
                name="stock"
                value="{{ old('stock') }}"
                placeholder="Masukkan jumlah stok"
                min="0"
            >

            @error('stock')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        {{-- TOMBOL --}}
        <div class="form-buttons">

            <button type="submit" class="btn-simpan">
                💾 Simpan Buku
            </button>

            <a href="{{ route('books.index') }}" class="btn-kembali">
                ← Kembali
            </a>

        </div>

    </form>

</div>

@endsection