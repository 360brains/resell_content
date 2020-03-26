@extends('user.layouts.master')

@section('content')
    <section class="task-work pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pt-3 pb-3">
                    <div class="task-title shadow">
                        <div class="row">
                            <div class="col-md-6">
                                <h1>{!! $test->description !!}</h1>
                                <div class="clearfix">
                                          <span class="text-danger countdown-time">
                                                 @php
                                                     $now = new DateTime();
                                                       $future_date = new DateTime($test->pivot->deadline);

                                                       $interval = $future_date->diff($now);

                                                       echo $interval->format("%a days, %h hours, %i minutes left");
                                                 @endphp
                                              {{ $test->pivot->deadline }}
                                          </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-innr">
                                    <h6 class="card-title card-title-sm">Upload your video <small>(Form your PC)</small></h6>
                                    <div class="clearfix">
                                        <form action="{{ route('user.tests.save.progress', $test->pivot->id) }}" method="post"--}}
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input class="" type="file" id="video" name="video">
                                            <button type="submit" class="button button-sm button-primary float-right" name="action" value="video"><em
                                                    class="fas fa-upload"></em> Upload
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .container -->
    </section>

@endsection


