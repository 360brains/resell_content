@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Trainings</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right open">
                <a href="{{ route('admin.trainings.create') }}" class="btn blue btn-sm" > <b><i class="fa fa-plus"></i> Add</b>
                </a>
            </div>
        </div>

    </div>
    <h3 class="page-title">Trainings</h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit bordered">

                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped flip-content">
                        <thead class="flip-content">
                        <tr>
                            <th width="75px"> Sr No. </th>
                            <th> Training Name </th>
                            <th> Type </th>
                            <th> Level </th>
                            <th> Fee </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @forelse($trainings as $training)
                            <tr>
                                <td> {{ ++$i }} </td>
                                <td> {{ $training->name }}</td>
                                <td> {{ $training->types->name }} </td>
                                <td> {{ $training->levels->name }} </td>
                                <td> {{ $training->fee==0? 'Free': $training->fee}} </td>
                                <td>{{ $training->active == 0 ? 'Deactive':'Active' }}</td>
                                <td>
                                    <form action="{{ route('admin.trainings.destroy',$training->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-success" href="{{ route('admin.trainings.show', $training->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('admin.trainings.edit', $training->id) }}">Edit</a>
                                        @if($training->active == 0)
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
                    <div class="text-center">
                        {{$trainings->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

