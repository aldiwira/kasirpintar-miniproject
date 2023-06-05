@extends('system/view/cmsbase')


@section('content')
    <h3>Data Barang</h3>
    <span>Masukkan data barang sesuai dengan form</span>

    <form action="{{ isset($data) ? route('system.barang.update', $data->id) : route("system.barang.store") }}" method="POST" class="mt-4">
        @if (isset($data))
            @method("PUT")
        @endif
        @csrf
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nama Barang</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                value="{{ isset($data) ? $data->name : old('name')}}" name="name" id="name" aria-describedby="nameId"
                placeholder="Nama Barang">
            @error('name')
            <small id="nameId" class="text-danger m-0">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" rows="3"
                placeholder="Penyebab terjadinya penyakit" name="description" id="description" aria-describedby="descriptionId">{{isset($data) ? $data->description : old('description')}}</textarea>
            @error('description')
                <small id="descriptionId" class="text-danger m-0">{{$message}}</small>
            @enderror
        </div>

        <div class="d-block">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a role="button" href="{{ route('system.barang.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </form>
@endsection
