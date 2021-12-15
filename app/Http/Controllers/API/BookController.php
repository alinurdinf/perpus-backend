<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $title = $request->input('title');
        $penulis = $request->input('penulis');
        $publication_date = $request->input('publication_date');
        $isbn = $request->input('isbn');
        $tags = $request->input('tags');
        $categories = $request->input('categories');


        if($id)
        {
            $book = Book::with(['category','covers'])->find($id);

            if($book)
                return ResponseFormatter::success(
                    $book,
                    'Data buku berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data buku tidak ada',
                    404
                );
        }

        $book = Book::with(['category','covers']);

        if($title)
            $book->where('title', 'like', '%' . $title . '%');

        if($penulis)
            $book->where('penulis', 'like', '%' . $penulis . '%');

        if($tags)
            $book->where('tags', 'like', '%' . $tags . '%');

        if($categories)
            $book->where('categories_id', $categories);

        if($publication_date)
            $book->where('sinopsis', $publication_date);

        if($isbn)
            $book->where('isbn', $isbn);

        return ResponseFormatter::success(
            $book->paginate($limit),
            'Data buku berhasil diambil'
        );
    }
}

