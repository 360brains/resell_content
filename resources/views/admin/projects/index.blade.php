@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Projects</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right open">
                <a href="{{ route('admin.projects.create') }}" class="btn blue btn-sm" > <b><i class="fa fa-plus"></i> Add</b></a>
            </div>
        </div>

    </div>
    <h3 class="page-title">Projects
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit bordered">

                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped flip-content">
                        <thead class="flip-content">
                        <tr>
                            <th width="75px"> Sr No. </th>
                            <th> Projects Name </th>
                            <th> Quantity </th>
                            <th> Type </th>
                            <th> Description </th>
                            <th> Deadline </th>
                            <th> Category </th>
                            <th> Level </th>
                            <th> Created </th>
                            <th> Last Updated </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $i = 0;
                        @endphp
                            @forelse($projects as $project)
                                <tr>
                                    <td> {{ ++$i }} </td>
                                    <td><a href="{{ route('admin.projects.show', $project->id) }}"> {{ $project->name }} </a></td>
                                    <td> {{ $project->quantity }} </td>
                                    <td> {{ $project->type->name }} </td>
                                    <td> {{ $project->description }} </td>
                                    <td> {{ $project->category->name }} </td>
                                    <td> {{ $project->level->name }} </td>
                                    <td> abc </td>
                                    <td> {{ $project->created_at }} </td>
                                    <td> {{ $project->updated_at }} </td>
                                    <td>
                                        <form action="{{ route('admin.projects.destroy',$project->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project->id) }}">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-outline sbold uppercase">Delete</button>

                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <h3> No Categories Found</h3>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="text-center">
                    {{$projects->links()}}
                    </div>
            </div>
        </div>
    </div>
@endsection

