@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">List Produk</div>
        <div class="card-body">
        <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('posts.create') }}" class="btn btn-success">Tambah Produk</a>
    </div>
            @if ($posts->count() > 0)
            <table class="table table-bordered">
                <thead class="">
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                    
                </thead>
                <tbody>
                    @foreach ($posts->sortByDesc('published_at') as $post)
                    <tr>
                        <!-- <td>
                            <img src="{{ 'storage/' .$post->image }}" width="120px" height="60px" alt="">
                        </td> -->
                        <td>
                            {{ $post->title }}
                        </td>
                        <td>
                            <a href="{{ route('categories.edit', $post->category->id) }}">
                                {{ $post->category->name }}
                            </a>
                        </td>
                        <td>
                            Rp. {{ $post->harga }}
                        </td>
                        @if ($post->trashed())
                            <td class="text-center">
                                <form action="{{ route('restore-posts', $post->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary btn-sm">Restore</button>
                                </form>
                            </td>
                        @else 
                        @endif
                        <td style="margin-right: 10em">     
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" href="" class="btn btn-danger btn-sm">
                                    {{ $post->trashed() ? 'Hapus' : 'Hapus' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody> 
                @endforeach
            </table>

            @else 
                <h3 class="text-center"></h3>
            @endif
            
        </div>
    </div>
@endsection