<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoorlockController extends Controller
{
    public function accessList($doorlock_id)
    {
        // Assuming a user has doorlock_id in profile or pivot table (customize accordingly)
        $users = DB::table('transactions')
            ->where('doorlock_id', $doorlock_id)
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->select('users.id', 'users.name', 'users.lockPassword', 'transactions.fingerprint_data')
            ->get();

        return response()->json([
            'doorlock_id' => $doorlock_id,
            'users' => $users,
        ]);
    }

    public function status()
    {
        // Dummy logic: You can add more rules as needed
        $needsUpdate = DB::table('transactions')->where('status', 'Pending')->exists();

        return response()->json([
            'status' => $needsUpdate ? 'NEED_UPDATE' : 'UPDATED',
        ]);
    }
}
