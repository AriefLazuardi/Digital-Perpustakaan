


<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Year Published</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->description }}</td>
            <td>{{ $book->total }}</td>
            <td><a href="{{asset('file/'.$book->book_file)}}">unduh file PDF</a></td>
            <td><img src="{{asset('cover/'.$book->book_cover)}}" alt="image" width="200"></td>
        </tr>
        @endforeach
    </tbody>
</table>