@extends('layouts.utama')
 
@section('title', 'Laman Buku Berdasarkan Kategori')
 
@section('sidebar')
    @parent
    <br>
    Back to Home
@endsection


@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ $message }}</p>
</div>
@endif
<div class="pull-right mb-2">
    <a class="btn btn-success" href="{{ route('book.create') }}"> Tambahkan Buku Baru</a>
</div>

<table class="table table-hover">
        <tr>
            <th>Gambar</th>
            <th>Judul Buku</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
        @foreach ($book as $bk)
        <?php
        $category_name = App\Models\Category::find($bk->category_id)->category_name;?>
        <tr>
            <td><img src="{{asset('cover/'.$bk->book_cover)}}" alt="" width="120"></td>
            <td>{{$bk->title}}</td>
            <td>{{$category_name}}</td>
        <td>
            <form action="{{ route('book.delete',$bk->id) }}" method="POST">
                <a href="{{route('book.show',['id'=>$bk->id])}}" class="btn btn-sm btn-info">Detail</a>
                <a href="{{route('book.edit',['id'=>$bk->id])}}" class="btn btn-sm btn-warning">Ubah</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?')">Hapus</button>
            </form>
        </td>
        </tr>
        @endforeach
    </table>
    
@endsection
