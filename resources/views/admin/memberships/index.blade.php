@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Memberships</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right open">
                <a href="{{ route('admin.memberships.create') }}" class="btn blue btn-sm" > <b><i class="fa fa-plus"></i> Add</b>
                </a>
            </div>
        </div>

    </div>
    <h3 class="page-title">Memberships</h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class=" light portlet-fit my_table">

                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped flip-content table-hover">
                        <thead class="flip-content">
                        <tr>
                            <th width="75px"> Sr No. </th>
                            <th> Membership Name </th>
                            <th> Price </th>
                            <th> Duration <small>(months)</small> </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @forelse($memberships as $membership)
                            <tr class="table-row-clickable" onclick="window.location = '{{ route('admin.memberships.show', $membership->id) }}'">
                                <td> {{ ++$i }} </td>
                                <td><img width="20px" src="{{ asset($membership->badge) }}"> {{ $membership->name }}</td>
                                <td> {{ $membership->price }} </td>
                                <td> {{ $membership->duration }} </td>
                                <td>
                                    <form action="{{ route('admin.memberships.destroy',$membership->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-primary" href="{{ route('admin.memberships.edit', $membership->id) }}">Edit</a>
                                        @if($membership->active == 0)
                                            <button type="submit" class="btn btn-success btn-outline sbold uppercase">Active</button>
                                        @else
                                            <button type="submit" class="btn btn-danger btn-outline sbold uppercase" disabled>Inactive</button>
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
                        {{$memberships->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

