@extends('layouts.mainlayout')

@section('title', 'Tambah Fasilitas')

@section('content')

    <h3>Tambah Fasilitas</h3>

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

        <form action="{{ route('fasilitas-store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="NamaRuang" class='form-label'>Nama Ruang</label>
                <input type="text" name="NamaRuang" value="{{ old('NamaRuang', isset($room) ? $room->NamaRuang : '') }}" id="NamaRuang" class="form-control" placeholder="co: Yohanes">
            </div>
            <div class="mb-3">
                <label for="Item" class='form-label'>Item</label>
                <select name="barang_id" id="barang_id" class="form-control">
                    <option value="">Pilih Barang</option>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}" {{ old('barang_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->NamaBarang }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="JumlahBarang" class='form-label'>Jumlah Barang</label>
                <input type="number" name="JumlahBarang" id="JumlahBarang" class="form-control" placeholder="Masukkan jumlah barang" value="{{ old('JumlahBarang') }}">
            </div>
            <div class="mt-3">
                <button class="btn btn-success" type="submit">Simpan</button>
            </div>
        </form>
    </div>

@endsection
