<?php

namespace App\Http\Controllers\API;

use App\Models\BookCategory;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class BookCategoryController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $show_book = $request->input('show_book');

        if($id)
        {
            $bookcategory = BookCategory::with(['books'])->find($id);

            if($bookcategory)
                return ResponseFormatter::success(
                    $bookcategory,
                    'Data produk berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data kategori produk tidak ada',
                    404
                );
        }

        $bookcategory = BookCategory::query();

        if($name)
            $bookcategory->where('name', 'like', '%' . $name . '%');

        if($show_book)
            $bookcategory->with('books');

        return ResponseFormatter::success(
            $bookcategory->paginate($limit),
            'Data list kategori produk berhasil diambil'
        );
    }
}