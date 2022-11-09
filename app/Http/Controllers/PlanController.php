<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Plan;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index(Plan $plan)
    {
        $booked = $plan->books()->where('payed', true)->pluck('count')->sum();

        return view('book', [
            'plan' => $plan,
            'rcapacity' => $plan->capacity - $booked
        ]);
    }
}
