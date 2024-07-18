<?php

namespace App\Http\Controllers;

use App\Models\WeightLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeightManagementController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $weightLogs = WeightLog::where('user_id', $user->id)->orderBy('date', 'desc')->paginate(5);

        foreach ($weightLogs as $weightLog) {
            $weightLog->date = Carbon::parse($weightLog->date)->format('Y/m/d');
        }

        return view('dashboard', ['weightLogs' => $weightLogs]);
    }
}
