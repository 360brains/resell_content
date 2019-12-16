@extends('user.layouts.master')

@section('content')
    <section class="task-work pt-5 pb-5">
        <div class="container">
            <div class="row">
                @foreach(auth()->user()->tasks as $task)
                    @if($task->status == 'started' OR $task->status == 'extended' OR $task->status == 'reworking')
                        @if($task->project->type->name == 'Content Writing')
                            <div class="col-md-12">
                                <div class="task-title shadow">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h1>{{ $task->project->name }}
                                                <a data-toggle="modal" data-target="#task-dec" href="#"><i  class="far fa-question-circle"></i></a>
                                            </h1>
                                            <div class="clearfix">
                                          <span class="text-danger countdown-time">
                                                @php
                                                    $now = new DateTime();
                                                    $future_date = new DateTime($task->deadline);
                                                    $interval = $future_date->diff($now);
                                                    echo $interval->format("%a days, %h hours, %i minutes left");
                                                @endphp
                                          </span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 ">
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
                                                    <form action="{{ route('user.tasks.upload.doc', $task->id) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="file" name="file" accept=".doc, .docx"/>
                                                        <button type="submit" class="btn float-right btn-outline-success"><em class="fas fa-upload"></em> Submit</button>
                                                    </form>
                                                </div>
                                            </div>
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
                        @elseif($task->project->type->name == 'Video Making')
                            <div class="col-md-12">
                                <div class="task-title shadow">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h1>{{ $task->project->name }}
                                                <a data-toggle="modal" data-target="#task-dec" href="#"><i  class="far fa-question-circle"></i></a>
                                            </h1>
                                            <div class="clearfix">
                                          <span class="text-danger countdown-time">
                                                @php
                                                    $now = new DateTime();
                                                    $future_date = new DateTime($task->deadline);
                                                    $interval = $future_date->diff($now);
                                                    echo $interval->format("%a days, %h hours, %i minutes left");
                                                @endphp
                                          </span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 ">
                                            <div class="card-innr">
                                                <h6 class="card-title card-title-sm">Upload your video <small>(Form your
                                                        PC)</small></h6>
                                                <div class="clearfix">
                                                    <form action="{{ route('user.tasks.save.progress', $task->id) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="file" name="video" accept=".mp4,.flv,.mkv,.3gp," id="video"/>
                                                        <button type="submit" name="action" value="video" class="btn float-right btn-outline-success"><em class="fas fa-upload"></em> Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                    @endif
                @endforeach

                    <div class="modal fade" id="task-dec"  tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content"><a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                                <div class="popup-body popup-body-lg">
                                    <div class="content-area">
                                        <div class="card-head d-flex justify-content-between align-items-center">
                                            <h4 class="card-title pb-2 mb-0">Task Description</h4></div>
                                        <ul class="data-details-list ">
                                            <li>
                                                <div class="p-3" >
                                                    {!! $task->project->description !!}
                                                </div>
                                            </li>
                                        </ul>
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


