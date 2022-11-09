@extends('layouts.master')
@section('content')



            <div class=" justify-content-center">
                <div class="s01">
                    <form action="" >
                        <div class="inner-form">
                            <div class="input-field first-wrap">
                                <input name="beginning" type="text" value="{{request()->query('beginning')}}" placeholder="beginning" />
                            </div>
                            <div class="input-field first-wrap">
                                <input name="destination" type="text" value="{{request()->query('destination')}}" placeholder="destination" />
                            </div>
                            <div class="input-field first-wrap" >
                                <input name="date" placeholder="ticket date" value="{{request()->query('date')}}" class="textbox-n " type="text" onfocus="(this.type='date')" onfocusout="(this.type='text')" id="date">
                            </div>
                            <div class="input-field third-wrap">
                                <button class="btn-search" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                @foreach($plans as $plan)
                    <div class=" mb-5">
                        <div class="card h-100 card-body ">
                            <div class="justify-content-between d-flex p-4">
                            <div>

                                    <!-- Product name-->
                                 <h5 class="fw-bolder mb-4"><span class="text-black-50">{{$plan->bus_type}}</span> {{$plan->start_city}} - {{$plan->end_city}}</h5>
                                <!-- Product price-->
                                {{$plan->price}} R

                            </div>
                            <div class="">
                                <div class="text-end">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder mb-4">{{ \App\Helpers\Week::convert($plan->move_day)}}</h5>
                                    <h6>{{$plan->time_plan}}</h6>
                                    <!-- Product price-->

                                </div>
                            </div>
                        </div>
                            <!-- Product actions-->

                            <div class="card-footer text-end p-4 pt-0 border-top-0 bg-transparent">
                                <a class="btn btn-outline-dark  mt-auto" href="/plans/{{$plan->id}}">book</a>
                            </div>


                        </div>
                    </div>
                @endforeach

            </div>



@endsection
