@extends('user.layouts.master')

@section('content')

    <section class="task-work pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="task-title shadow">
                            <h3 class="d-inline">{!! $test->description !!}
                            </h3>
                                <span class="text-danger countdown-time">
                                @php
                                    $now = new DateTime();
                                    $future_date = new DateTime($test->pivot->deadline);

                                    $interval = $future_date->diff($now);

                                    echo $interval->format("%a days, %h hours, %i minutes left");
                                @endphp
                                    {{--                                {{ $test->pivot->deadline }}--}}
                            </span>
                    </div>

                </div>
                <div class="col-md-12 pt-3 main-content">
                    <div class="card p-4 shadow">
                        <div class="card-innr">
                            <div class="card-head">
                                <form action="{{ route('user.tests.save.progress', $test->pivot->id) }}" method="post">
                                    @csrf
                                    <textarea id="messageArea" name="body" rows="7" class="form-control ckeditor" placeholder="Write your message..">
                                        {{ $test->pivot->body }}
                                    </textarea>
                                    <div class="gaps-2-5x"></div>
                                    <small><strong>Remember!</strong> You will have to complete it in the time awarded. If you do not submit in time, you lose progress and might have to write on any other topic.</small><br>
                                    <small><strong>Beware!</strong> Do not copy your content from any resource. It will be rejected streight away if found plagiarized.</small>
                                    <ul class="clearfix pt-3">
                                        <li class="float-left">
                                            <button class="btn btn-lg float-left btn-success"
                                                    type="submit"
                                                    name="action" value="save"><em
                                                    class="fas fa-download"></em>
                                                Save Progress
                                            </button>
                                        </li>
                                        <div class="my-work-btn float-right">
                                            <li>
                                                <button class="btn btn-lg float-left btn-danger"
                                                        name="action"
                                                        value="submit"><em class="fas fa-upload"></em>
                                                    Submit
                                                </button>
                                            </li>
                                        </div>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <!-- .card-innr -->
                    </div>
                    <!-- .card -->
                </div>

            </div>

        </div>
    </section>

@endsection
