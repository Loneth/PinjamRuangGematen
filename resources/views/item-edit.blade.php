@extends('layouts.mainlayout')

@section('title', 'Edit Item')

@section('content')

<h3>Edit Item</h3>

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

    <form action="{{route('item-update',$item->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="NamaBarang" class='form-label'>Nama Barang</label>
            <input type="text" name="NamaBarang" id="NamaBarang" class="form-control" value="{{ $item->NamaBarang }}" placeholder="Masukkan nama barang">
        </div>
        <div class="mb-3">
            <label for="Deskripsi" class='form-label'>Deskripsi</label>
            <textarea class="form-control" name="Deskripsi" id="Deskripsi" style="height:150px" cols="30" rows="10">{{ $item->Deskripsi }}</textarea>
        </div>
        <div class="mt-3">
            <button class="btn btn-success" type="submit">Simpan</button>
        </div>
    </form>
</div>

@endsection
