<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FingerprintController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'fingerprint_data' => 'required|string',
        ]);

        $user = User::find($validated['user_id']);
        $user->fingerprint_data = $validated['fingerprint_data'];
        $user->save();

        return response()->json(['message' => 'Fingerprint data saved successfully']);
    }
}
