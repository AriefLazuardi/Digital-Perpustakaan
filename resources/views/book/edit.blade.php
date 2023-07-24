@extends('layouts.utama')


@section('title', 'Ubah Kategori')


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


           <form action="{{route('book.update',['id'=>$book->id])}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" value="{{$book->title}}">
                @error('title')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id">
                        @foreach ($category as $ct)
                        <option value="{{ $ct->id }}">{{ $ct->category_name }}</option>
                    @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <input class="form-control" type="text" name="description" value="{{$book->description}}">
                @error('description')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="total">total</label>
                <input class="form-control" type="text" name="total" value="{{$book->total}}">
                @error('total')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="book_cfile">Upload File Buku</label>
                <input class="form-control" type="file" name="book_file" id="book_filer" value="{{$book->book_file}}">
                @error('book_file')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="book_cover">Upload Cover Buku</label>
                <input class="form-control" type="file" name="book_cover" id="book_cover" value="{{$book->book_cover}}">
                @error('book_cover')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-md btn-primary">Ubah</button>
            <a class="btn btn-md btn-danger" href="{{ route('book.index') }}">Batal</a>
        </form>
    </div>
</div>
@endsection
