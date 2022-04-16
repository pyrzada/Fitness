<section class="routine">
    <div class="container">
        <h1>
            We Offer Plans accoring to your Needs
        </h1>
        <h4>
            So get in touch and Opt for any plan that suites your need.
        </h4>
        <div class="routine-plan">
            @foreach($plans as $single_plan)
                <div class="plan1">
                    <div class="plan-img">
                        <img src="{{asset('storage/'.$single_plan->image_url)}}" alt="Plan-1">
                    </div>
                    <h1>
                        {{$single_plan->name}}
                    </h1>
                    <p>
                        {{$single_plan->small_description}}
                    </p>
                    <a href="weekly" class="btn">View Plan</a>
                </div>
            @endforeach
{{--            <div class="plan2">--}}
                {{--                <div class="plan-img">--}}
                {{--                    <img src="{{asset('images/plan-2.jpg')}}" alt="Plan-2">--}}
                {{--                </div>--}}
                {{--                <h1>--}}
                {{--                    Are You Up For Our 1 Month Plan--}}
                {{--                </h1>--}}
                {{--                <button class="btn">View Plan</button>--}}
                {{--            </div>--}}
                {{--            <div class="plan3">--}}
                {{--                <div class="plan-img">--}}
                {{--                    <img src="{{asset('images/plan-3.jpg')}}" alt="Plan-3">--}}
                {{--                </div>--}}
                {{--                <h1>--}}
                {{--                    Are You Up For Our 3 Month Plan--}}
                {{--                </h1>--}}
                {{--                <button class="btn">View Plan</button>--}}
                {{--            </div>--}}
        </div>
    </div>
</section>
