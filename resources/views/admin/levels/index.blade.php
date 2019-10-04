@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Levels</span>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right open">
                <a href="{{ route('admin.levels.create') }}" class="btn red btn-sm" > <b>Add</b>
{{--                    <i class="fa fa-backward"></i>--}}
                </a>
            </div>
        </div>

    </div>
    <h3 class="page-title">Levels
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit bordered">

                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped flip-content">
                        <thead class="flip-content">
                        <tr>
                            <th width="20%"> Sr No. </th>
                            <th> Level Name </th>
                            <th> Type </th>
                            <th> Created </th>
                            <th> Last Updated </th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $i = 0;
                        @endphp
                            @forelse($levels as $level)
                                <tr>
                                    <td> {{ ++$i }} </td>
                                    <td> {{ $level->name }} </td>
                                    <td> {{ $level->types->name }} </td>
                                    <td> {{ $level->created_at }} </td>
                                    <td> {{ $level->updated_at }} </td>
                                    <td>
                                        <form action="{{ route('admin.levels.destroy',$level->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a class="btn btn-primary" href="{{ route('admin.levels.edit', $level->id) }}">Edit</a>

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    No Categories Found
                            @endforelse

                        </tbody>
                    </table>

                </div>


            </div>
        </div>
    </div>
@endsection

