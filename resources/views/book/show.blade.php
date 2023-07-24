@extends('layouts.utama')


@section('title', 'Detail Buku')


@section('sidebar')
@parent


@endsection


@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="pull-right mb-2">
            <a class="btn btn-success" href="{{ route('book.index') }}"> Kembali</a>
        </div>
        <div class=" mb-2">
            <a class="btn btn-info" href="{{ route('book.export',[$book->id])}}"> Export Buku (Excel)</a>
        </div>
        <ul>
            <li>Judul Buku: {{$book->title}}</li>
            <li>Deskripsi: {{$book->description}}</li>
            <li>Total: {{$book->total}}</li>
            <li>File Buku: <br> <object data="path/to/file.pdf" type="application/pdf" width="100%" height="100px" download="false">
                    <p>Maaf, browser Anda tidak mendukung tampilan PDF ini. Silakan <a href="{{asset('file/'.$book->book_file)}}">unduh file PDF</a> untuk melihatnya.</p>
            </object></li>
            <li>Cover Buku: <br> <img src="{{asset('cover/'.$book->book_cover)}}" alt="image" width="200"></li>
            
        </ul>
    </div>
</div>
@endsection

