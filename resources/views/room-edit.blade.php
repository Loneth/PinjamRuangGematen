@extends('layouts.mainlayout')
@section('title', 'Edit Ruang')

@section('content')
    

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Edit Ruang</h3>
            </div>
        </div>
    </div>

    <div class="mt-5 w-50">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('room-update', $room->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="NamaRuang" class='form-label'>Nama Ruang</label>
                <input type="text" name="NamaRuang" value='{{ $room->NamaRuang }}' id="NamaRuang" class="form-control"
                    placeholder="co: Yohanes">
            </div>
            <div class="mb-3">
                <label for="Kapasitas" class='form-label'>Kapasitas</label>
                <input type="number" name="Kapasitas" id="Kapasitas" class="form-control" placeholder=" Kapasitas ruangan">
            </div>

            <div class="mb-3">
                <label for="Gambar" class='form-label,'>Gambar</label>
                <input type="file" name="Gambar" id='Gambar' class="form-control">
                <img src="/Gambar/{{ $room->Gambar }}" alt="">
            </div>
            <div class="mt-3">
                <button class="btn btn-success" type="submit">Simpan</button>
            </div>
        </form>
    </div>

@endsection
