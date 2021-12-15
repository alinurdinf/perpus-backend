<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $headline = $request->input('headline');

        if($id)
        {
            $news = News::query()->find($id);

            if($news)
                return ResponseFormatter::success(
                    $news,
                    'Data berita berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data berita tidak ada',
                    404
                );
        }

        $news = News::query();

        if($headline)
        $news->where('headline', 'like', '%' . $headline . '%');


        return ResponseFormatter::success(
            $news->paginate($limit),
            'Data buku berhasil diambil'
        );
    }
}