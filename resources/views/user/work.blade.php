@extends('user.layouts.master')

@section('content')
    <section class="task-work pt-5 pb-5">
        <div class="container">
            <div class="row">
                @foreach(auth()->user()->tasks as $task)
                    @if($task->status == 'started' OR $task->status == 'extended' OR $task->status == 'reworking')
                        @if($task->project->type->name == 'Content Writing')
                            <div class="col-md-8">
                                <div class="task-title shadow">
                                    <h1>Task Title: {{ $task->project->name }}</h1>
                                    <div class="clearfix">
                                          <span class="float-right text-danger countdown-time">
                                                @php
                                                    $now = new DateTime();
                                                    $future_date = new DateTime($task->deadline);
                                                    $interval = $future_date->diff($now);
                                                    echo $interval->format("%a days, %h hours, %i minutes left");
                                                @endphp
                                          </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="upload shadow">
                                    {{--                                    <div class="card-innr">--}}
                                    {{--                                        <h6 class="card-title card-title-sm">Download Template .DOC</h6>--}}
                                    {{--                                        <ul class="btn-grp">--}}
                                    {{--                                            <li><a href="{{ route('user.tasks.create.doc', $task->id) }}" class="btn btn-auto btn-sm btn-success"><em class="fas fa-download"></em> Download</a></li>--}}
                                    {{--                                        </ul>--}}
                                    {{--                                        <div class="gaps-2-5x"></div>--}}
                                    {{--                                        <p class=" pdb-0-5x">Use the template to comply with our writing format <strong>or use our online editor.</strong></p>--}}
                                    {{--                                    </div>--}}

                                    <div class="card-innr">
                                        <h6 class="card-title card-title-sm">Upload Task .DOC <small>(Form your
                                                PC)</small></h6>
                                        <div class="clearfix">
                                            <form action="{{ route('user.tasks.upload.doc', $task->id) }}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="upload-btn-wrapper">
                                                    <button class="btn1 float-left">Upload a file</button>
                                                    <input type="file" name="file" />
                                                </div>
                                                {{--                                            <input type="file" name="file" accept=".doc, .docx"/>--}}
                                                <button type="submit" class="btn float-right  btn-outline-success"><em
                                                        class="fas fa-upload"></em> Submit
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 pt-3 main-content">
                                <div class="card p-4 shadow">
                                    <div class="card-innr">
                                        <div class="card-head">
                                            <form action="{{ route('user.tasks.save.progress', $task->id) }}"
                                                  method="post">
                                                @csrf
                                                <textarea id="messageArea" name="body" rows="7"
                                                          class="form-control ckeditor"
                                                          placeholder="Write your message..">{{ $task->body }}</textarea>
                                                <ul class="clearfix pt-3">
                                                    <li class="float-left">
                                                        <button class="btn btn-auto float-left btn-success"
                                                                type="submit"
                                                                name="action" value="save"><em
                                                                class="fas fa-download"></em>
                                                            Save Progress
                                                        </button>
                                                    </li>
                                                    <div class="my-work-btn float-right">
                                                        <li>
                                                            <button class="btn float-left btn-auto btn-danger"
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
                        @elseif($task->project->type->name == 'Video Making')
                            <div class="col-md-12">
                                <div class="card content-area">
                                    <div class="card-innr">
                                        <h3 class="d-inline">{!! $task->project->description !!}
                                            <span class="float-right countdown-time">
                                                @php
                                                    $now = new DateTime();
                                                    $future_date = new DateTime($task->deadline);
                                                    $interval = $future_date->diff($now);
                                                    echo $interval->format("%a days, %h hours, %i minutes left");
                                                @endphp
                                            </span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="referral-info card">
                                    <div class="card-innr">
                                        <h6 class="card-title card-title-sm">Upload your video</h6>
                                        <form action="{{ route('user.tasks.save.progress', $task->id) }}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input class="" type="file" accept=".mp4,.flv,.mkv,.3gp," id="video"
                                                   name="video">
                                            <button class="btn btn-auto btn-lg btn-danger" name="action" value="video">
                                                <em class="fas fa-upload"></em> Upload
                                            </button>
                                        </form>
                                    </div>
                                    <!-- .copy-wrap -->
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach

            </div>
        </div>
        <!-- .container -->
    </section>

@endsection


