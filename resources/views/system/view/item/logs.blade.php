@extends('system/view/cmsbase')

@section('content')
    <h3>Logs barang</h3>

    <div class="mt-4">
        <table id="tables" class="table table-striped" style="width:100%">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Action</th>
                    <th>User</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$item['item']}}</td>
                    <td>{{$item['status']}}</td>
                    <td>{{ $item['user']}}</td>
                    <td>{{date('Y/m/d H:i:s', strtotime($item['updated_at']))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-block">
            <a role="button" href="{{ route('system.barang.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
@endsection
