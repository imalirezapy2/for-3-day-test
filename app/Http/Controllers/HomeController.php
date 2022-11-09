<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use function GuzzleHttp\Promise\all;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query;
        $plans = Plan::all();

        if ($query->count()){

                $plans = Plan::where('start_city', $query->get('beginning'))
                    ->orWhere('start_terminal', $query->get('beginning'))
                    ->orWhere('end_terminal', $query->get('destination'))
                    ->orWhere('end_city', $query->get('destination'))->get();

            if ($query->get('date') and Carbon::hasFormat($query->get('date'), 'Y-m-d')) {
                $plans = $plans->whereBetween('created_at', [$query->get('date'), $query->get('date')]);
            }

        };
        return view('home', [
            'plans' => $plans,
            ]);
    }
}
