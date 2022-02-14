<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionsController extends Controller
{
    public function index($user_id)
    {
        $user = User::with(['transactions'])->find($user_id)->first();
        if (!$user) {
            return Response::json([
                "message" => "user not found"
            ], 404);
        }
        return response()->json($user->transactions);
    }
}
