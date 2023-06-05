@extends('system/view/cmsbase')


@section('content')
    <h3>Dashboard</h3>
    <span>Selamat datang pada sistem pencatatan barang</span>

    <div class="row mt-3">
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                  Jumlah Barang
                </div>
                <div class="card-body text-center">
                    <h3>{{$totalItem}} Barang</h3>
                </div>
              </div>
        </div>
    </div>
@endsection
