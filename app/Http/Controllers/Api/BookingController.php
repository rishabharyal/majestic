<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->session()->put('booking', $request->get('booking'));
        if (!Auth::user()) {
            $request->session()->put('continue_to_checkout', true);
            return response()->json(
                [
                    'success' => false,
                    'message' => 'You must be logged in to place a booking.',
                    'data' => [
                        'is_logged_in' => false,
                    ]
                ]
            );
        }

        return response()->json(
            [
                'success' => true,
                'data' => [
                    'is_logged_in' => true,
                    'price' => 2000
                ]
            ]
        );
    }
}
