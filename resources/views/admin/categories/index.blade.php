@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Categories</span>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Create</span>
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
    <h3 class="page-title">Categories
        <small>Create Category</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit bordered">

                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped flip-content">
                        <thead class="flip-content">
                        <tr>
                            <th width="20%"> Code </th>
                            <th> Company </th>
                            <th class="numeric"> Price </th>
                            <th class="numeric"> Change </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td> AGK </td>
                            <td> AGL ENERGY LIMITED </td>
                            <td class="numeric"> $13.82 </td>
                            <td class="numeric"> +0.02 </td>
                        </tr>
                        <tr>
                            <td> AGO </td>
                            <td> ATLAS IRON LIMITED </td>
                            <td class="numeric"> $3.17 </td>
                            <td class="numeric"> -0.02 </td>
                        </tr>
                        </tbody>
                    </table>

                </div>


            </div>
        </div>
    </div>
@endsection

