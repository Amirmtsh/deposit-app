<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CardInformationController extends Controller
{
    public function setCardInformation(Request $request, $user_id)
    {
        $validated = request()->validate([
            'card_number' => 'required',
            'cvv2' => 'required',
            'second_password' => 'required',
            'card_expire_date' => 'required',
        ]);
        $user = User::find($user_id);
        if (!$user) {
            return Response::json([
                "message" => "user not found"
            ], 404);
        }
        $user->update($validated);
    }
}
