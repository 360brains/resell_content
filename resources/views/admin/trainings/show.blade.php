@extends('admin.layouts.master')

@section('content')
    <style>
        .description{
            background: #8080800d;
            padding: 1px 10px 15px 25px;
        }
    </style>


    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span> Traininga</span>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span> Show</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right open">
                <a href="{{ url()->previous() }}" class="btn red btn-sm" > <b>Back</b>
                    <i class="fa fa-backward"></i>
                </a>
            </div>
        </div>

    </div>

    <h3 class="page-title">Details of <b>{{ $trainings->name }}</b>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">

                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Test Name</th>
                            <td>{{$trainings->name}}</td>
                        </tr>

                        <tr>
                            <th>Test Type</th>
                            <td>{{$trainings->types->name}}</td>
                        </tr>

                        <tr>
                            <th>Fee</th>
                            <td>{{$trainings->fee}}</td>
                        </tr>

                        <tr>
                            <th>Videos</th>
                            <td>{{ count($trainings->trainingLists) }}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>{{$trainings->active==1?'Active':'Deactive'}}</td>
                        </tr>

                        <tr>
                            <th>Created</th>
                            <td>{{$trainings->created_at}}</td>
                        </tr>

                        <tr>
                            <th>Last Update</th>
                            <td>{{$trainings->updated_at}}</td>
                        </tr>

                    </table>

                    <h3 >Description</h3>
                    <div class="description">{!! $trainings->description !!}</div>

                </div>
            </div>
        </div>
    </div>


    <div class="portlet light portlet-fit bordered">
        <div class="portlet-body">
        <div class="row">
                <div class="col-md-8">
                    <video width="100%" height="350px" id="myVideo" controls>
                        @if(count($trainings->trainingLists) > 0)
                            <source id="myVideoSrc" src="{{ asset('trainings/'.$trainings->id.'/'.$trainings->trainingLists->first()->name) }}" type="video/mp4">
                        @else
                            <source id="myVideoSrc" src="{{ asset('trainings/'.$trainings->id.'/') }}" type="video/mp4">
                        @endif
                        Your browser does not support video.
                    </video>
                </div>
                <div class="col-md-4">
                    <div class="p-4">
                        <div class="course-syllabus-wrapper">
                            <h2> Course Syllabus </h2>
                            <div class="course-list">
                                <ul>
                                    @forelse($trainings->trainingLists as $list)
                                        <div class="row padding-tb-10">
                                            <div class="col-md-3 pr-0">
                                                <div style="width: 100%; height: 40px">
                                                    <img style="object-fit: cover; width: 100%; height: 100%" src="{{ asset($trainings->avatar) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="learn-dec">
                                                    <li onclick="changeVideo( '{{ asset('trainings/'.$trainings->id.'/'.$list->name)}}' )" data-type="icon-lesson" class="training-name">
                                                        {{ $list->name }}
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <h5> No Videos in Syllabus list. </h5>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
