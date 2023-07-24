<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class BookExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        return Book::select('id', 'title', 'description', 'total', 'book_file', 'book_cover', 'category_id')
        ->where('id', $this->id)
        ->get();
    }

    public function query()
    {
        return Book::query()->where('id', $this->id);
    }
}
