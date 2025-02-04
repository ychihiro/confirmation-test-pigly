<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeightManagementRequest;
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
            $weightLog->date = Carbon::parse($weightLog->date);
            $weightLog->exercise_time = Carbon::parse($weightLog->exercise_time);
        }

        return view('dashboard', ['weightLogs' => $weightLogs]);
    }

    public function create(WeightManagementRequest $request)
    {
        $user = Auth::user();
        $properties = $request->only(['date', 'weight', 'calorie', 'time', 'content']);

        WeightLog::create([
            'user_id' => $user->id,
            'date' => $properties['date'],
            'weight' => $properties['weight'],
            'calorie' => $properties['calorie'],
            'exercise_time' => $properties['time'],
            'exercise_content' => $properties['content'],
        ]);

        return redirect('/weight-logs/dashboard');
    }

    public function search(Request $request)
    {
        if ($request->has('reset')) {
            return redirect('/weight-logs/dashboard');
        }

        $user = Auth::user();
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = WeightLog::where('user_id', $user->id);

        if(!empty($startDate)) {
            $query->whereDate('date', '>=', $startDate);
        }

        if(!empty($endDate)) {
            $query->whereDate('date', '<=', $endDate);
        }

        $query->orderBy('date', 'desc');

        $weightLogs = $query->paginate(5);
        $weightLogCount = $query->count();

    return view('dashboard', compact('weightLogs', 'startDate', 'endDate', 'weightLogCount'));
    }
}
