@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
                
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if (auth()->user()->isAdmin())
                    Anda login sebagai : <b>{{ Auth::user()->role }} </b>
                    @else
                    Anda login sebagai : <b><?php if (Auth::user()->role == 'writer') { echo "operator"; }?> </b>
                    @endif
                    <br><br>

                    @if (auth()->user()->isAdmin())
                    <p>Hak akses : </p>

                    <table class="table table-bordered" class="text-center">
                        <thead class="thead-dark">
                            <tr>
                                <td>Kategori</td>
                                <td>Merk</td>
                                <td>Produk</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i class="las la-check"></i></td>
                                <td><i class="las la-check"></i></td>
                                <td><i class="las la-check"></i></td>
                            </tr>
                        </tbody>
                    </table>
                    @endif

                    @if (auth()->user()->isOperator())
                    <p>Hak akses : </p>

                    <table class="table table-bordered" class="text-center">
                        <thead>
                            <tr>
                                <td>Kategori</td>
                                <td>Merk</td>
                                <td>Produk</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i class="las la-times"></i></td>
                                <td><i class="las la-times"></i></td>
                                <td><i class="las la-check"></i></td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                
    </div>
</div>
@endsection