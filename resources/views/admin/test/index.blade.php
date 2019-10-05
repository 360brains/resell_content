@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Tests</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right open">
                <a href="{{ route('admin.test.create') }}" class="btn blue btn-sm" > <b><i class="fa fa-plus"></i> Add</b>
                </a>
            </div>
        </div>

    </div>
    <h3 class="page-title">Tests</h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit bordered">

                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped flip-content">
                        <thead class="flip-content">
                        <tr>
                            <th width="75px"> Sr No. </th>
                            <th> Test Name </th>
                            <th> Type </th>
                            <th> Level </th>
                            <th> Status </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @forelse($test as $t)
                            <tr>
                                <td> {{ ++$i }} </td>
                                <td> {{ $t->name }}</td>
                                <td> {{ $t->types->name }} </td>
                                <td> {{ $t->levels->name }} </td>
                                <td>{{ $t->active == 0 ? 'Deactive':'Active' }}</td>
                                <td>
                                    <form action="{{ route('admin.test.destroy',$t->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <a class="btn btn-primary" href="{{ route('admin.test.edit', $t->id) }}">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-outline sbold uppercase">Delete</button>
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
                    <div class="text-center">
                        {{$test->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

