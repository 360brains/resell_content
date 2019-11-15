@extends('user.layouts.master')

@section('content')

    <div class="page-content">
        <div class="container">
            <div class="creative-box clearfix">
                <div class="row">
                    @forelse($trainings as $training)
                    <div class="col-md-4">
                        <div class="spacing">
                            <a href="{{ route('user.learn.details', $training->id) }}">
                                <div class="border_cource  blog-img-course">
                                    <div class="blog-img">
                                        <img src="{{ url( $training->avatar ) }}"
                                             alt="Training image">
                                        <div class="blog_overlay_new">
                                            <p>learn more<span class="green_dot">.</span></p>
                                        </div>
                                    </div>

                                    <div class="cource_pading">
                                        <h3 class="product_name mt-3 mb-1">{{ $training->name }}
                                        </h3>

                                        <!-- Jon Youshaei -->

                                        <p class="instructor_title">
                                            {!! $training->description !!}
                                        </p>

                                        <div class="bottom_fix_cource">
                                            <div class="left_con_cource float-left">
                                                @if(!is_null($training->fee))
                                                    <span><sup>$</sup><strong>{{ $training->fee }}</strong></span>
                                                @else
                                                    <span><strong>FREE</strong></span>
                                                @endif
                                            </div>

                                            <div class="right_con_cource float-right">

                                            <i class="fas {{ $training->medium == 'Live' ? 'fa-chalkboard-teacher' : 'fa-video'}}" title="Video Lecture"></i>

                                            <div class="right_con_cource">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </a>

                    </div>
                    </div>
                    @empty
                        <h2>No Trainings found</h2>
                    @endforelse


                </div>
                <div class="text-center">
                    {{$trainings->links()}}
                </div>
            </div>
        </div><!-- .container -->
    </div>

@endsection
