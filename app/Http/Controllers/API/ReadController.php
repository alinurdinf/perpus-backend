<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Read;
use App\Models\ReadItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReadController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $progress = $request->input('progress');

        if($id)
        {
            $read = Read::with(['items.read'])->find($id);

            if($read)
                return ResponseFormatter::success(
                    $read,
                    'Data bacaan berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data bacaan berhasil diambil',
                    404
                );
        }

        $read = Read::with(['items.book'])->where('users_id', Auth::user()->id);

        if($progress)
            $read->where('progress', $progress);

        return ResponseFormatter::success(
            $read->paginate($limit),
            'Data list bacaan berhasil diambil'
        );
    }

}



