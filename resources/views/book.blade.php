@extends('layouts.master')

@section('content')

    <style>

        .line {
            width: 100%;

            border-bottom: 1px solid #000;
            line-height: 0.1em;
            margin: 10px 0 20px;
        }

        .line span {
            background:#fff;
            padding:0 10px;
        }
        p {
            font-size: 20px
        }
    </style>
    <div class="row  " >
        <h2>{{$plan->start_city}} - {{$plan->end_city}}</h2>
        <div class="d-flex">
        terminal: <h5 class="line w-25"><span class="text-end">{{$plan->start_terminal}}</span></h5><h5>{{$plan->end_terminal}}</h5>
        </div>
        <p>price: {{number_format($plan->price)}} R</p>

        <p >move: {{\App\Helpers\Week::convert($plan->move_day).'-'.$plan->move_time}}</p>
        <p>proccess time: {{$plan->proccess_time}} minute</p>
        <p>capacity: {{$rcapacity}}</p>

    </div>
@endsection
