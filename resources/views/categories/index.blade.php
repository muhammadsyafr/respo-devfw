@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">List Kategori</div>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('categories.create') }}" class="btn btn-success">Tambah Kategori</a>
        </div>
        @if ($categories->count() > 0)
        <table class="table table-bordered">
            <thead>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>
                        {{ $category->name }}
                    </td>

                    <td class="">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">
                            Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $category->id }})">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="deleteModal" tabindex="-1" role="diaf" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <form action="" method="POST" id="deleteCategoryForm">
                @csrf
                @method('DELETE')
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Hapus Kategori</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Yakin mau dihapus ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-danger">Ya</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @else
        <h3 class="text-center"></h3>
        @endif
    </div>
    @endsection

    @section('scripts')
    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteCategoryForm')
            form.action = '/categories/' + id
            $('#deleteModal').modal('show')
        }
    </script>
    @endsection