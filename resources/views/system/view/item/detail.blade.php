@extends('system/view/cmsbase')


@section('content')
    <h3>Data Barang</h3>
    <span>Masukkan data barang sesuai dengan form</span>

    <form  class="mt-4">
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nama Barang</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" disabled
                value="{{ isset($data) ? $data->name : old('name')}}" name="name" id="name" aria-describedby="nameId"
                placeholder="Nama Barang">
        </div>
        <div class="form-group mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" disabled rows="3"
                placeholder="Penyebab terjadinya penyakit" name="description" id="description" aria-describedby="descriptionId">{{isset($data) ? $data->description : old('description')}}</textarea>
        </div>

        <div class="d-block">
            <a role="button" href="{{ route('system.barang.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </form>
@endsection
