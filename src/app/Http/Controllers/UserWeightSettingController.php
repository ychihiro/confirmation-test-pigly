<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserWeightSettingRequest;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserWeightSettingController extends Controller
{
    public function index()
    {
        return view('auth.register.step2');
    }

    public function create(UserWeightSettingRequest $request)
    {
        $properties = $request->only(['current_weight', 'target_weight']);
        $user = Auth::user();

        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $properties['target_weight'],
        ]);

        WeightLog::create([
            'user_id' => $user->id,
            'date' => now(),
            'weight' => $properties['current_weight'],
        ]);

        return view('dashboard');
    }

    public function show()
    {
        $user = Auth::user();
        $target = WeightTarget::where('user_id', $user->id)->first();

        return view('setting', ['target' => $target]);
    }
}
