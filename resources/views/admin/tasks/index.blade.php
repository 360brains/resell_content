@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Tasks</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right open">
                <a href="{{ route('admin.tasks.create') }}" class="btn blue btn-sm" > <b><i class="fa fa-plus"></i> Add</b></a>
            </div>
        </div>

    </div>
    <h3 class="page-title">Tasks
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
                            <th> Task Name </th>
                            <th> Type </th>
                            <th> Deadline </th>
                            <th> Category </th>
                            <th> Level </th>
                            <th> Status </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $i = 0;
                        @endphp
                            @forelse($tasks as $task)
                                <tr>
                                    <td> {{ ++$i }} </td>
                                    <td> {{ $task->name }} </td>
                                    <td> {{ $task->type->name }} </td>
                                    <td> {{ $task->deadline }} </td>
                                    <td> {{ $task->category->name }} </td>
                                    <td> {{ $task->level->name }} </td>
                                    <td> {{ $task->active == 0 ? 'Deactive':'Active' }} </td>
                                    <td>
                                        <form action="{{ route('admin.tasks.destroy',$task->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a class="btn btn-success" href="{{ route('admin.tasks.show', $task->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('admin.tasks.edit', $task->id) }}">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-outline sbold uppercase">Delete</button>

                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9">
                                        Data Not Found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="text-center">
                    {{$tasks->links()}}
                    </div>
            </div>
        </div>
    </div>
@endsection

