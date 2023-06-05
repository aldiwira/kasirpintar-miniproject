@extends('base')

@section('title', 'Home')

@push('css')
    <style>
        body {
            background-color:#c799ff;
            background-image:
                radial-gradient(at 80% 82%, hsla(233,67%,69%,1) 0px, transparent 50%),
                radial-gradient(at 5% 25%, hsla(201,62%,65%,1) 0px, transparent 50%),
                radial-gradient(at 26% 73%, hsla(238,65%,69%,1) 0px, transparent 50%),
                radial-gradient(at 10% 50%, hsla(321,93%,67%,1) 0px, transparent 50%),
                radial-gradient(at 9% 54%, hsla(304,71%,66%,1) 0px, transparent 50%),
                radial-gradient(at 14% 20%, hsla(203,73%,65%,1) 0px, transparent 50%),
                radial-gradient(at 8% 54%, hsla(358,60%,68%,1) 0px, transparent 50%);
        }
        .bg-glass {
            background-color: rgba(255, 255, 255, 0.37);
            backdrop-filter: blur(5px);
        }
    </style>
@endpush

@section('body')

<div class="container vh-100 text-white">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col">
            <h2>Selamat datang di mini project AKUNTANSIKU x Kasir Pintar</h2>
            <span>Perkenalkan saya Aldi Wirawan, dan berikut ini adalah hasil dari mini project yang sudah saya buat. Terima kasih</span>
        </div>
        <div class="col">
            <div class="bg-glass p-4 rounded text-dark">
                <h4>Detail Pengerjaan</h4>
                <span>Klik untuk mengarahkan anda ke hasil pengerjaan</span>
                <div class="d-grid gap-2 mt-5">
                    <a class="btn btn-dark" href="{{ route('system.login.form') }}" role="button">Login</a>
                    <a class="btn btn-outline-dark" href="{{ route('cv') }}" role="button">CV Saya</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
