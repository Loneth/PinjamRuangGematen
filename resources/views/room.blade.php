@extends('layouts.mainlayout')

@section('title', 'Data Ruang')

@section('content')

    <h3>Data Ruang</h3>

    <div class="my-5 d-flex justify-content-end">
        <a href="{{ route('create') }}" class="btn btn-primary">+ Data Ruang</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class='my-5'>
        <table class='table '>
            <thead>
                <tr>

                    <th>Nama Ruang</th>
                    <th>Kapasitas</th>
                    <th>Fasilitas</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $item)
                    <tr>

                        <td>{{ $item->NamaRuang }}</td>

                        <td>{{ $item->Kapasitas }}</td>
                        <td><img src="{{ asset('Gambar/' . $item->Gambar) }}" width="100px"></td>
                        <td>

                            <form action="{{ route('room-destroy', $item->id) }}" method="POST">
                                <a href="{{ route('create-fasilitas', ['ruang_id' => $item->id]) }}" class="btn btn-primary">+ fasilitas</a>
                                <a href="{{ route('room-edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
