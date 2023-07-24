<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use PDF;

class BooksController extends Controller
{
    public function index()
    {
      $book = Book::all();
      $category = Category::all();
      return view('book/index',['book'=>$book],['category'=>$category]);

    }

    public function home()
    {
      $book = Book::all();
      return view('book.app',['book'=>$book]);

    }
    
    public function create()
    {
      $category = Category::all();
      $book = Book::all();
        return view('book/create',['category'=>$category],['book'=>$book]);
    }

    public function show($id)
    {
        $book = Book::find($id);
        return view('book.show',['book'=>$book]);
    }



    public function form()
    {
      return view('book/update');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $category = Category::all();
        return view('book.edit',['book'=>$book],['category'=>$category]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'total' => 'required',
            'category_id' => 'required',
            
        ]);
        $book = Book::find($id);

        $book->title = $request->title;
        $book->description = $request->description;
        $book->total = $request->total;
        $book->book_cover = $request->book_cover;
        $book->book_file = $request->book_file;
        $book->category_id = $request->category_id;
        $book->save();
        return redirect()->route('book.index')->with('success','Data Buku sudah berhasil diubah!'); 
      }

    public function store(Request $request)
      {
          $this->validate($request, [
              'book_cover' => 'required|file|image|mimes:jpeg,png,jpg',
              'book_file' => 'required|file|mimes:pdf',
              'title' => 'required',
              'total' => 'required',
              'category_id' => 'required',
              'description' => 'required',
          ]);
          $book = new Book();
          $cover = $request->file('book_cover');
          $file = $request->file('book_file');
          
          $file_name = time()."_".$file->getClientOriginalName();
          $destination = 'file';
          $file->move($destination,$file_name);

          $cover_name = time()."_".$cover->getClientOriginalName();
          $destination = 'cover';
          $cover->move($destination,$cover_name);
  
          $book->title = $request->title;
          $book->book_cover = $cover_name;
          $book->book_file = $file_name;
          $book->total = $request->total;
          $book->category_id = $request->category_id;
          $book->description = $request->description;
          $book->save();
          return redirect()->route('book.index')->with('success','Data Buku sudah berhasil ditambahkan!');
      }

      public function delete($id)
      {
          $book = Book::find($id);
          $book->delete();
          return redirect()->route('book.index')->with('success','Data Buku sudah berhasil dihapus!');
      }

      public function search(Request $request)
    {
        $search = $request->input('search');
        $book = Book::where('title', 'like', '%'.$search.'%')->get();
        return view('book.index')->with(['book'=>$book]);
    }
}
