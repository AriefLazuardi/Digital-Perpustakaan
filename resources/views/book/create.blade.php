@extends('layouts.utama')
 
@section('title', 'Tambahkan Buku Baru')
 
@section('sidebar')
    @parent


@endsection


@section('content')
<div class="row">


    <div class="col-md-6">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{route('book.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Judul Buku</label>
                <input class="form-control" type="text" name="title">
                @error('title')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

            </div>
            <div class="form-group">
                <label for="category_id">Kategori</label>
                    <select class="form-control" id="category_id" name="category_id">
                    @foreach ($category as $ct)
                        <option value="{{ $ct->id }}">{{ $ct->category_name }}</option>
                    @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea id="description" class="form-control" name="description" cols="30" rows="10"></textarea>
                @error('description')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input class="form-control" type="text" name="total">
                @error('total')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="book_cfile">Upload File Buku</label>
                <input class="form-control" type="file" name="book_file" id="book_file">
                @error('book_file')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="book_cover">Upload File Cover Buku</label>
                <input class="form-control" type="file" name="book_cover" id="book_cover">
                @error('file_cover')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
            <a class="btn btn-md btn-danger" href="{{ route('book.index') }}">Batal</a>
        </form>
    </div>
</div>
@endsection
