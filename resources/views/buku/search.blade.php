<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" 
            content="width=device-width, user-scalable=no initial-scale=1.0,
            maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Belajar Model PPW2</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        @extends('layouts.master') <!-- Menggunakan layout utama -->

        @section('title', 'Daftar Buku') <!-- Menambahkan judul halaman -->

        @section('content')
            @if(Session::has('pesanstore'))
                <div class="alert alert-success">{{ Session::get('pesanstore') }}</div>
            @endif

            @if(Session::has('pesanupdate'))
                <div class="alert alert-primary">{{ Session::get('pesanupdate') }}</div>
            @endif

            @if(Session::has('pesandelete'))
                <div class="alert alert-warning">{{ Session::get('pesandelete') }}</div>
            @endif

            <h1>Daftar Buku</h1>
            <a href="{{ route('buku.create') }}" class="btn btn-primary float-end">Tambah Buku</a>

            @if(count($data_buku)) 
                <div class="alert alert-success">Ditemukan 
                    <strong>{{count($data_buku)}}</strong> 
                    data dengan kata: 
                    <strong>{{ $cari }}</strong>
                </div>
            @endif

            <form action="{{route('buku.search')}}" method="get">@csrf
                <input type="text" name="kata" class="form-control" placeholder="Cari..." style="width: 30%;
                display: inline; margin-top: 10px; margin-bottom: 10px; float: right;">
            </form>


            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Harga</th>
                        <th>Tanggal Terbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_buku as $index => $buku)
                    <tr>
                        <td>{{ $buku->id }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ "Rp. ".number_format($buku->harga, 0, ',','.') }}</td>
                        <td>{{ (new DateTime($buku->tgl_terbit))->format('d/m/Y') }}</td>
                        <td>
                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin mau dihapus?')" type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            <form action="{{ route('buku.edit', $buku->id) }}" method="GET" style="display:inline;">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div>{{ $data_buku->links() }}</div>
            <div><strong>Jumlah Buku: {{ $jumlah_buku }}</strong></div>
        @endsection
    </body>
</html>
