@extends('system/view/cmsbase')

@section('content')
    <h3>Data barang</h3>

    <div class="mt-4">
        <div class="mb-3">
            @can('create items')
                <a role="button" href="{{ route('system.barang.create') }}" class="btn btn-success">Tambah Barang</a>
            @endcan
        </div>
        <table id="tables" class="table table-striped" style="width:100%">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{Str::limit($item->description, 20, "....")}}</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </a>

                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ route('system.barang.show', $item) }}">Lihat</a></li>
                              @can('edit items')
                              <li><a class="dropdown-item" href="{{ route('system.barang.edit', $item) }}">Edit</a></li>
                              @endcan
                              @can('delete items')
                              <li><button class="dropdown-item" onclick="deleteItem({{$item->id}})" data-bs-toggle="modal" data-bs-target="#modalDelete">Delete</button></li>
                              @endcan
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{$items->links()}}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin untuk menghapus data?
            </div>
            <form method="POST" id="formWrap" class="modal-footer">
                @csrf
                @method('delete')
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
        </div>
    </div>
@endsection




@section('script')
    <script>
        const deleteItem = (id) => {
            $("#formWrap").attr('action', "{{ route('system.barang.destroy', 9999) }}".replace('9999', id))
        }

        const myModalEl = document.getElementById('modalDelete')
        myModalEl.addEventListener('hidden.bs.modal', event => {
        })
    </script>
@endsection
