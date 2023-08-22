<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        DB::table('comments')->insert([
            'user_id' => $userId,
            'user_name' => User::find($userId)->name,
            'product_id' => $request->product_id,
            'comment' => $request->comment ?? '',
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
}
