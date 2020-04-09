@extends('admin.layouts.master')

@section('content')
<style>
    .description {
        background: #8080800d;
        padding: 1px 10px 15px 25px;
    }
</style>


<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="javascript:;">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> User </span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> Show </span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right open">
            <a href="{{ url()->previous() }}" class="btn red btn-sm"> <b>Back</b>
                <i class="fa fa-backward"></i>
            </a>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-sm-6">
        <h3 class="d-inline-block page-title"><b>{{ $user->name }}</b></h3>
    </div>

    <div class="col-sm-6">
        <div class="pull-right padding-tb-20">
            @if($user->special == 0)
            <form action="{{ route('admin.users.special', $user->id) }}" method="post">
                @csrf
                <button class="btn btn-success" type="submit" name="action" value="special">Add to Special</button>
            </form>
            @else
            <form action="{{ route('admin.users.special', $user->id) }}" method="post">
                @csrf
                <button class="btn btn-danger" type="submit" name="action" value="non-special">Remove from Special</button>
            </form>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit bordered">

            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>User Name</th>
                        <td>{{$user->name}}</td>
                    </tr>

                    <tr>
                        <th>Gender</th>
                        <td>{{$user->gender}}</td>
                    </tr>

                    <tr>
                        <th>Email Address</th>
                        <td>{{$user->email}}</td>
                    </tr>

                    <tr>
                        <th>Contact No.</th>
                        <td>{{$user->contact}}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>{{$user->active}}</td>
                    </tr>

                    <tr>
                        <th>Total Tasks</th>
                        <td>{{count($tasks)}}</td>
                    </tr>

                    <tr>
                        <th>Total Earned</th>
                        <td>{{ $totalEarned }}</td>
                    </tr>

                    <tr>
                        <th>Balance</th>
                        <td>{{ $user->balance }}</td>
                    </tr>

                    <tr>
                        <th>Writing Points</th>
                        <td>{{ $user->writing_points }}</td>
                    </tr>

                    <tr>
                        <th>Video Points</th>
                        <td>{{ $user->video_points }}</td>
                    </tr>

                    <tr>
                        <th>Total Transactions</th>
                        <td>{{count($transactions)}}</td>
                    </tr>

                    <tr>
                        <th>Created</th>
                        <td>{{$user->created_at}}</td>
                    </tr>

                    <tr>
                        <th>Last Update</th>
                        <td>{{$user->updated_at}}</td>
                    </tr>

                </table>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h3 class="page-title">{{ $user->name }}'s Transactions</h3>

        <div class="portlet light portlet-fit bordered">

            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped flip-content table-hover">
                    <thead class="flip-content">
                        <tr>
                            <th width="75px"> Sr No. </th>
                            <th> User Name </th>
                            <th> Amount </th>
                            <th> Product </th>
                            <th> Date </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 0;
                        @endphp
                        @forelse($transactions as $transaction)
                        <tr>
                            <td> {{ ++$i }} </td>
                            <td> {{ $transaction->user->name }} </td>
                            <td> {{ $transaction->amount }} </td>

                            @if($transaction->task_id != NULL)
                            <td>Task: {{ $transaction->task->name }} </td>
                            @elseif($transaction->test_id != Null)

                            <td>Test: {{ $transaction->test->name }} </td>
                            @elseif($transaction->training_id != NULL)
                            <td>Training: {{ $transaction->training->name }} </td>
                            @endif

                            <td> {{ $transaction->created_at }} </td>
                            <td> {{ $transaction->status }} </td>
                            <td><a class="btn btn-success" href="{{ route('admin.transactions.show', $transaction->id) }}">Show</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">
                                Data Not Found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="text-center">
                    {{$transactions->links()}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <h3 class="page-title">{{ $user->name }}'s Tasks</h3>

        <div class="portlet light portlet-fit bordered">

            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped flip-content table-hover">
                    <thead class="flip-content">
                        <tr>
                            <th width="75px"> Sr No. </th>
                            <th> Task Name </th>
                            <th> Type </th>
                            <th> Deadline </th>
                            <th> Level </th>
                            <th> status </th>
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
                            <td> {{ $task->project->name }} </td>
                            <td> {{ $task->project->type->name }} </td>
                            <td> {{ $task->project->deadline ?? 'None' }} </td>
                            <td> {{ $task->project->level->name }} </td>
                            <td> {{ $task->status }} </td>
                            <td>
                                <form action="{{ route('admin.tasks.destroy',$task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-success" href="{{ route('admin.tasks.show', $task->id) }}">Show</a>
                                    {{-- <a class="btn btn-primary" href="{{ route('admin.tasks.edit', $task->id) }}">Edit</a>--}}

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
</div>
@endsection