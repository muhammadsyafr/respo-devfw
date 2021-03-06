@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
            {{ isset($post->id) ? 'Edit Produk' : 'Tambah Produk' }}
        </div>
        <div class="card-body">
            @include('partials.error')
            <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title">Nama</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ isset($post->title) ? $post->title : '' }}">
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" cols="5" rows="2" class="form-control">{{ isset($post->description) ? $post->description : '' }}</textarea>
                </div>

                <div class="form-group">
                    <label for="title">Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" value="{{ isset($post->harga) ? $post->harga : '' }}">
                </div>

                <div class="form-group">
                    <label for="content">Isi</label>
                    <input id="content" class="form-control" type="text" name="content" value="{{ isset($post->content) ? $post->content : '' }}">
                    <!-- <trix-editor input="content"></trix-editor> -->
                </form>

                <div class="form-group my-3">
                    <label for="published_at">Dipublish pada</label>
                    <input type="text" class="form-control" name="published_at" id="published_at" value="{{ isset($post->published_at) ? $post->published_at : '' }}">
                </div>

                @if (isset($post))
                    <div class="form-group">
                        <img src="/storage/{{ ($post->image) }}" alt="" style="width: 100%">
                    </div>
                @endif

                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>

                <div class="form-group">
                    <label for="Category">Kategori</label>
                    <select name="category" id="category" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                    @if (isset($post))
                                        @if ($category->id == $post->category_id)
                                        selected
                                        @endif 
                                    @endif
                                >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                @if ($tags->count() > 0)
                    <div class="form-group">
                        <label for="tags">Merek</label>
                        <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}"
                                @if (isset($post))
                                    @if ($post->hasTag($tag->id))
                                        selected
                                    @endif
                                @endif
                                >
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{ isset($post) ? 'Update Produk' : 'Tambah Produk' }}
                    </button>
                </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        flatpickr('#published_at', {
            enableTime: true
        });

        document.addEventListener("trix-file-accept", function(event) {
            event.preventDefault();
        });

        $(document).ready(function() {
            $('.tags-selector').select2();
        });
    </script>
@endsection

@section('css')
    <style>
        .trix-button--icon-attach,
        .trix-button--icon-attach { display: none; }

        .trix-button--icon-increase-nesting-level,
        .trix-button--icon-decrease-nesting-level { display: none; }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

@endsection

