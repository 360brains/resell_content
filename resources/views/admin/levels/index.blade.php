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
                <a href="{{ route('admin.levels.create') }}" class="btn blue btn-sm" > <b><i class="fa fa-plus"></i> Add</b></a>
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
                            <th width="75px"> Sr No. </th>
                            <th> Level Name </th>
                            <th> Min Points </th>
                            <th> Max Points </th>
                            <th> Status </th>
                            <th> Created </th>
{{--                            <th> Last Updated </th>--}}
                            <th> Action </th>
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
                                    <td> {{ $level->min_points ?? 'None' }} </td>
                                    <td> {{ $level->max_points ?? 'None' }} </td>
                                    <td> {{ $level->active == 1 ? 'Active' : 'Deactive' }} </td>
                                    <td> {{ date('d-M-Y', strtotime($level->created_at)) }} </td>
{{--                                    <td> {{ $level->updated_at }} </td>--}}
                                    <td>
                                        <form action="{{ route('admin.levels.destroy',$level->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-success" href="{{ route('admin.levels.show', $level->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('admin.levels.edit', $level->id) }}">Edit</a>
                                            @if($level->active == 0)
                                                <button type="submit" class="btn btn-success btn-outline sbold uppercase">Active</button>
                                            @else
                                                <button type="submit" class="btn btn-danger btn-outline sbold uppercase">Inactive</button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">
                                        Data Not Found
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                </div>


            </div>
        </div>
    </div>
@endsection

