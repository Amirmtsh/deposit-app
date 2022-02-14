<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class DepositToOthersController extends Controller
{
    public function deposit($track_id, Request $request)
    {
        $validated = request()->validate([
            'amount' => 'required',
            'discription' => 'required',
            'destinationFirstname' => 'required',
            'destinationLastname' => 'required',
            'paymentNumber' => 'required',
            'deposit' => 'required',
            'reasonDescription' => 'required'
        ]);
        $user_id = auth()->user()->id;
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer " . env('Token')
        ])->post("http://localhost/oak/v2/clients/$user_id/transferTo?trackId=$track_id", array_merge($validated, [
            'sourceFirstName' => auth()->user()->first_name,
            'sourceLastName' => auth()->user()->last_name
        ]));
        $data = json_decode($response);
        if ($response->status() == 400) {
            return Response::json([
                "message" => $data->error->message
            ], 400);
        }
        $flight = Transaction::create($data->result);
        return response()->json(["message" => "transaction was successful"]);
    }
}
