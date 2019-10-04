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
                <a href="{{ route('admin.categories.create') }}" class="btn blue btn-sm" > <b><i class="fa fa-plus"></i> Add</b>
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
                            <th> Category Name </th>
                            <th> Created </th>
                            <th> Last Updated </th>
                            <th> Super Category </th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @forelse($categories as $category)
                            <tr>
                                <td> {{ ++$i }} </td>
                                <td><a href="{{ route('admin.categories.show', $category->id) }}"> {{ $category->name }} </a></td>
                                <td> {{ $category->created_at }} </td>
                                <td> {{ $category->updated_at }} </td>
                                <td>{{ $category->parent_category->name ?? 'None' }}</td>
                                <td>
                                    <form action="{{ route('admin.categories.destroy',$category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <a class="btn btn-primary" href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>

                                        @if($category->child_categories->count() > 0)
                                            <a class="btn btn-danger btn-outline sbold uppercase " id="demo_5"> Delete </a>
                                            <button type="submit" class="btn btn-danger btn-outline sbold uppercase hidden-button" id="delete_category">Delete</button>
                                        @else
                                            <button type="submit" class="btn btn-danger btn-outline sbold uppercase">Delete</button>
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
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

