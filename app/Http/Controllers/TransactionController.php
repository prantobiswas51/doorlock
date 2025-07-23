<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'fingerprint_id' => 'required|integer',
            'user_id' => 'nullable|exists:users,id',
            'transaction_type' => 'required|string',
            'doorlock_id' => 'nullable|string',
            'fingerprint_data' => 'nullable|string',
            'image_data' => 'nullable|string',
            'opened_at' => 'nullable|string',
            'closed_at' => 'nullable|string',
            'company_id' => 'nullable|exists:companies,id',
            'status' => 'required|in:Pending,Approved,Disapproved,Incorrect Password,Correct Password,Undected Face,User Abort',
        ]);

        $transaction = Transaction::create($request->all());

        return response()->json([
            'message' => 'Transaction created successfully.',
            'data' => $transaction,
        ]);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->all());

        return response()->json([
            'message' => 'Transaction updated successfully.',
            'data' => $transaction,
        ]);
    }

    public function status($id)
    {
        $transaction = Transaction::findOrFail($id);

        return response()->json([
            'transaction_id' => $transaction->id,
            'status' => $transaction->status,
        ]);
    }
}
