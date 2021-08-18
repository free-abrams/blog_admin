<?php

/**
 * Created by FreeAbrams
 * Date 2021/8/18
 */

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $where = [];
        $where[] = ['status', '=', 1];
        $blog = Blog::query()->where($where)
            ->paginate($request->input('limit', 10));

        return $this->showMsg($blog);
    }

    public function detail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return $this->showMsg([], '400', $validator->errors()->first());
        }
        $blog = Blog::find((int)$request->id);
        return $this->showMsg($blog);
    }
}
