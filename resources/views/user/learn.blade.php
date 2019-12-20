@extends('user.layouts.master')

@section('content')
    <section class="learn pb-3">
        <div class="learn-banner">
            <img class="img-fluid" src="{{ asset('user/images/learn-banner.png') }}" alt="">
        </div>
        <div class="learn-content pt-3">
            <div class="main-heading">
                <h3 class="m-0">Content <span>Course</span></h3>
                <p class="pt-1">Achieve your career goal with recognized learning paths</p>
            </div>
            <div class="learn-boxes pt-5">
                <div class="container">
                    <div class="row">
                        @forelse($trainings as $training)
                            <div class="col-md-4">
                                <a href="{{ route('user.learn.details', $training->id) }}">
                                    <div class="box mb-4 shadow ">
                                        <div style="width: 100%; height: 250px;">
                                            <img class="img-fluid traning-img" src="{{ url( $training->avatar ) }}" alt="">
                                        </div>
                                        <div class="p-3">
                                            <h4>{{ $training->name }}</h4>
                                            <p><img class="img-fluid" src="{{ asset('user/images/learn-star.png') }}" alt=""> <span class="rating">4.9</span> <span>(254)</span></p>
                                            <hr>
                                            <div class="clearfix">
                                                <h4 class="float-right">
                                                    @if(!is_null($training->fee))
                                                        Rs. {{ $training->fee }}
                                                    @else
                                                        FREE
                                                    @endif
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <h2>No Trainings found</h2>
                        @endforelse
                    </div>

                    <div class="text-center">
                        {{$trainings->links()}}
                    </div>

                    <div class="text-center pt-5">
                        <button class="btn btn-success see-btn">See More</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
