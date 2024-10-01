<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function getUserGrowthData()
    {
        // Get the users grouped by date and count them
        $userGrowth = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        return response()->json($userGrowth);
    }
}
