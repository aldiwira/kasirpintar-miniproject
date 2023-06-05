@extends('base')

@push('css')
    <link rel="stylesheet" href="https://getbootstrap.com/docs/5.2/assets/css/docs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    @if (Session::has('typeToast') && Session::has('messageToast'))
        <script>
            toastr.options = {
                closeButton : true
            }

            var type = "{{ Session::get('typeToast', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('messageToast') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('messageToast') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('messageToast') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('messageToast') }}");
                    break;
            }
        </script>
    @endif

    @yield('script')
@endpush

@section('body')
<div class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand text-uppercase fw-bold">Sistem Barang</a>
            <div class="d-flex">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (auth()->user())
                        @auth
                        {{auth()->user()->name}} ({{auth()->user()->getRoleNames()[0]}})
                        @endauth
                        @else
                        Guest (Guest)
                        @endif
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('system.logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-2">
            <div class="col-3">
                <ul class="list-group">
                    <a href="{{ route('system.dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>
                    <a href="{{route('system.barang.index')}}" class="list-group-item list-group-item-action">Barang</a>
                </ul>
            </div>
            <div class="col">
                @yield('content')
            </div>
        </div>

    </div>
    <!-- Footer -->
    <footer class="py-3 px-3 bg-dark-blue d-flex flex-sm-row flex-column  justify-content-between" style="flex: 0 0 auto">
        <p class="m-0 text-light">Agustin Dwi Nur Hamidah &copy; </p>
    </footer>
</div>
@endsection
