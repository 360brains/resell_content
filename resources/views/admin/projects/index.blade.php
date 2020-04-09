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
            <div class="light portlet-fit my_table">

                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped flip-content table-hover" id="projects">
                        <thead class="flip-content">
                        <tr>
                            <th width="75px"> Sr No. </th>
                            <th> Project Name </th>
                            <th> No. of Tasks </th>
                            <th> Type </th>
                            <th> Deadline </th>
                            <th> Level </th>
                            <th> Price </th>
                            <th> Status </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#projects').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [[ 0, "desc" ]],
                "ajax":{
                    "url": "{{ route('admin.get.projects') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{csrf_token()}}"}
                },
                "columns": [
                    { "data": "sr" },
                    { "data": "name" },
                    { "data": "quantity" },
                    { "data": "type" },
                    { "data": "deadline" },
                    { "data": "level" },
                    { "data": "price" },
                    { "data": "active" },
                    { "data": "options" }
                ]

            });
        });
    </script>
@endpush

