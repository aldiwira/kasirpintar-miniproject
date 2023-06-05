@extends('base')

@section('title', 'Login')

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
            <h2>Selamat datang di system mini project AKUNTANSIKU x Kasir Pintar</h2>
            <span>Pada system ini anda dapat mengelola beberapa barang.</span>
        </div>
        <div class="col">
            <form action="{{ route('system.login.submit') }}" method="POST" class="bg-glass p-4 rounded text-dark">
                @csrf
                <h4>Login</h4>
                <span>Masukkan Email dan password yang valid untuk masuk ke system.</span>
                <div class="mt-4">
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" name="email" placeholder="name@example.com" aria-describedby="usernameid" value="{{old('email')}}">
                            <label for="floatingInput">Email address</label>
                        </div>
                        @error('email')
                            <small id="usernameid" class="text-danger m-0">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-floating">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword" placeholder="Password" aria-describedby="pid">
                            <label for="floatingPassword">Password</label>
                        </div>
                        @error('password')
                            <small id="pid" class="text-danger m-0">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-dark">Login</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection
