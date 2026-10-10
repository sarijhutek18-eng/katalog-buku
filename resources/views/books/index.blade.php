@extends('layouts.app')

@section('title', 'Data Buku')

@section('content')

<div class="container">
    <h1>Data Buku</h1>

    <p>Kelola data buku perpustakaan.</p>

    {{-- TAMBAH BUKU --}}
    <p>
        <a href="{{ route('books.create') }}">Tambah Buku</a>
    </p>

    {{-- PENCARIAN --}}
    <form method="GET" action="{{ route('books.index') }}">
        <input
            type="search"
            name="q"
            value="{{ $keyword }}"
            placeholder="Cari judul, penulis, atau ISBN"
        >

        <button type="submit">Cari</button>

        <a href="{{ route('books.index') }}">Reset</a>
    </form>

    <br>

    {{-- TABEL BUKU --}}
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>
                        {{ $books->firstItem() + $loop->index }}
                    </td>

                    <td>{{ $book->title }}</td>

                    <td>{{ $book->author }}</td>

                    <td>{{ $book->stock }}</td>

                    <td>
                        <a href="{{ route('books.show', $book) }}">
                            Detail
                        </a>

                        |

                        <a href="{{ route('books.edit', $book) }}">
                            Edit
                        </a>

                        |

                        <form
                            method="POST"
                            action="{{ route('books.destroy', $book) }}"
                            style="display: inline;"
                            onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">
                        Data buku belum tersedia.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- PAGINATION --}}
    <div style="margin-top: 20px;">
        {{ $books->links() }}
    </div>
</div>

@endsection