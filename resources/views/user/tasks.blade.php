@extends('user.layouts.master')

@section('content')

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 main-content">
                    <div class="card content-area">
                        <div class="card-innr">
                            <div class="card-head">
                                <h4 class="card-title">Task Details</h4></div>
                            <table class="data-table dt-init user-tnx">
                                <thead>
                                <tr class="data-item data-head">
                                    <th class="data-col dt-tnxno">Task No.</th>
                                    <th class="data-col dt-amount">Name</th>
                                    <th class="data-col dt-usd-amount">Level</th>
                                    <th class="data-col dt-account">Start Date</th>
                                    <th class="data-col dt-account">Action</th>
                                    <th class="data-col dt-type"><div class="dt-type-text">Current Status</div></th>
                                    <th class="data-col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @forelse($tasks as $task)
                                    <tr class="data-item">
                                        <td class="data-col dt-tnxno">
                                            <div class="d-flex align-items-center">
                                                <div class="fake-class"><span class="lead tnx-id">{{ $i++ }}</span></div>
                                            </div>
                                        </td>
                                        <td class="data-col dt-amount"><span class="lead amount-pay">{{ $task->project->name }}</span></td>
                                        <td class="data-col dt-usd-amount"><span class="lead amount-pay">{{ $task->project->level->name }}</span></td>
                                        <td class="data-col dt-account"><span class="lead user-info">{{ $task->created_at }}</span></td>
                                        <td class="data-col dt-account">

                                            @if( $task->status == 'started' OR $task->status == 'extended' OR $task->status == 'reworking')
                                            <span class="lead user-info">
                                                @if($task->project->type->name == 'Content Writing')
                                                    <a href="{{ route('user.tasks.work') }}" class="btn btn-auto btn-xs btn-warning">Write</a>
                                                @else
                                                    <a href="{{ route('user.tasks.work') }}" class="btn btn-auto btn-xs btn-warning">Film</a>
                                                @endif
                                            </span>
                                            @endif
                                        </td>
                                        <td class="data-col dt-type"><span class="dt-type-md badge badge-outline badge-success badge-md">{{ $task->status }}</span><span class="dt-type-sm badge badge-sq badge-outline badge-success badge-md">P</span></td>
                                        <td class="data-col text-right"><a href="#" data-toggle="modal" data-target="#transaction-details{{$task->id}}" class="btn btn-light-alt btn-xs btn-icon"><em class="ti ti-eye"></em></a></td>


                                        <div class="modal fade" id="transaction-details{{$task->id}}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-lg modal-dialog-centered">
                                                <div class="modal-content"><a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                                                    <div class="popup-body popup-body-lg">
                                                        <div class="content-area">
                                                            <div class="card-head d-flex justify-content-between align-items-center">
                                                                <h4 class="card-title mb-0">Task Details</h4></div>
                                                            <div class="gaps-1-5x"></div>
                                                            <div class="data-details d-md-flex">
                                                                <div class="fake-class"><span class="data-details-title">Task Date</span><span class="data-details-info">{{ $task->created_at }}</span></div>
                                                                <div class="fake-class"><span class="data-details-title">Task Status</span><span class="badge badge-success ucap">{{ $task->status }}</span></div>
                                                                @if($task->status == 'approved')
                                                                <div class="fake-class"><span class="data-details-title">Task Approved Note</span><span class="data-details-info">By <strong>Admin</strong> at {{ $task->updated_at }}</span></div>
                                                                @else
                                                                    <div class="fake-class"><span class="data-details-title">Task Approved Note</span><span class="data-details-info">Not approved yet</span></div>
                                                                @endif
                                                            </div>
                                                            <div class="gaps-3x"></div>
                                                            <h6 class="card-sub-title">Task Info</h6>
                                                            <ul class="data-details-list">
                                                                <li>
                                                                    <div class="data-details-head">Start Date</div>
                                                                    <div class="data-details-des"><strong>{{ $task->created_at }}</strong></div>
                                                                </li>
                                                                <!-- li -->
                                                                <li>
                                                                    <div class="data-details-head">Deadline</div>
                                                                    <div class="data-details-des"><strong>{{ $task->deadline }}</strong></div>
                                                                </li>
                                                                <!-- li -->
                                                                @foreach($task->statuses as $status)
                                                                    @switch($status->name)
                                                                        @case('started')
                                                                        <li>
                                                                            <div class="data-details-head">Taken at</div>
                                                                            <div class="data-details-des"><strong>{{ $status->created_at }}</strong></div>
                                                                        </li>
                                                                        @break

                                                                        @case('extended')
                                                                        <li>
                                                                            <div class="data-details-head">Extended at</div>
                                                                            <div class="data-details-des"><span>{{ $status->extended_at }}</span> <span></span></div>
                                                                        </li>
                                                                        @break

                                                                        @case('delivered')
                                                                        <li>
                                                                            <div class="data-details-head">Delivered at</div>
                                                                            <div class="data-details-des"><span>{{ $status->delivered_at }}</span> <span></span></div>
                                                                        </li>
                                                                        @break

                                                                        @case('approved')
                                                                        <li>
                                                                            <div class="data-details-head">Approved at</div>
                                                                            <div class="data-details-des"><span>{{ $status->approved_at }}</span> <span></span></div>
                                                                        </li>
                                                                        @break

                                                                        @case('rejected')
                                                                        <li>
                                                                            <div class="data-details-head">Rejected at</div>
                                                                            <div class="data-details-des">{{ $status->rejected_at }}</div>
                                                                        </li>
                                                                        @break

                                                                        @case('reworking')
                                                                        <li>
                                                                            <div class="data-details-head">Reworking at</div>
                                                                            <div class="data-details-des">{{ $status->reworking_at }}</div>
                                                                        </li>
                                                                        @break


                                                                        @default
                                                                        <span>No Status Found</span>
                                                                    @endswitch
                                                                @endforeach
                                                            </ul>
                                                            <!-- .data-details -->

                                                            <div class="gaps-3x"></div>
                                                            <h6 class="card-sub-title">Task Info</h6>
                                                            <ul class="data-details-list">
                                                                <li>
                                                                    <div class="data-details-head">Task Type</div>
                                                                    <div class="data-details-des"><strong>{{ $task->project->type->name }}</strong></div>
                                                                </li>
                                                                <!-- li -->
                                                                <li>
                                                                    <div class="data-details-head">Task Category</div>
                                                                    <div class="data-details-des"><strong>{{ $task->project->category->name }}</strong></div>
                                                                </li>
                                                                <!-- li -->
                                                                <li>
                                                                    <div class="data-details-head">Task Level</div>
                                                                    <div class="data-details-des"><strong>{{ $task->project->level->name }}</strong></div>
                                                                </li>
                                                                <!-- li -->
                                                                <li>
                                                                    <div class="data-details-head">Points Awarded</div>
                                                                    <div class="data-details-des"><span>{{ $task->points_awarded }}</span> <span></span></div>
                                                                </li>
                                                                <!-- li -->
                                                                @forelse($task->project->trainings as $training)
                                                                    <li>
                                                                    <div class="data-details-head">Trainings Required</div>
                                                                    <div class="data-details-des"><span>{{ $training->name }} - Requires level: {{ $training->levels->name }} of Type {{ $training->types->name }}</span> <span></span></div>
                                                                    </li>
                                                                @empty
                                                                    <li><div class="data-details-head">No training required.</div></li>
                                                                @endforelse
                                                                <!-- li -->
                                                            </ul>
                                                            <!-- .data-details -->

                                                            <div class="gaps-3x"></div>
                                                            <h6 class="card-sub-title">Task Description</h6>
                                                            <ul class="data-details-list">
                                                                <li>
                                                                    <div class="data-details-des"><strong>{!! $task->project->description !!}</strong></div>
                                                                </li>
                                                            <!-- li -->
                                                            </ul>
                                                            <!-- .data-details -->


                                                            <div class="gaps-3x"></div>
                                                            <h6 class="card-sub-title">Task Transaction Details</h6>
                                                            <ul class="data-details-list">
                                                                @foreach(auth()->user()->transactions as $transaction)
                                                                    @if($transaction->task_id == $task->id)
                                                                <li>
                                                                    <div class="data-details-head">Status</div>
                                                                    <div class="data-details-des"><span class="badge badge-success ucap">{{ $transaction->status }}</span></div>
                                                                </li>
                                                                <!-- li -->
                                                                <li>
                                                                    <div class="data-details-head">Amount</div>
                                                                    <div class="data-details-des"><span><strong>{{ $transaction->amount }} PKR</strong> <em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="1 PKR = 0.0064 USD"></em></span><span><em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="1 PKR = 0.0064 USD"></em> ${{ $transaction->amount*0.0064 }}</span></div>
                                                                </li>
                                                                <!-- li -->
                                                                <li>
                                                                    <div class="data-details-head">Date</div>
                                                                    <div class="data-details-des"><strong>{{ $transaction->created_at }}</strong></div>
                                                                </li>
                                                                <!-- li -->
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            <!-- .data-details -->
                                                        </div>
                                                        <!-- .card -->
                                                    </div>
                                                </div>
                                                <!-- .modal-content -->
                                            </div>
                                            <!-- .modal-dialog -->
                                        </div>


                                    </tr>
                                @empty
                                    <tr><td colspan="5">No Tasks Found</td></tr>
                                @endforelse
                                <!-- .data-item -->
                                </tbody>
                            </table>
                        </div>
                        <!-- .card-innr -->
                    </div>
                    <!-- .card -->
                </div>
            </div>
        </div>
        <!-- .container -->
    </div>

@endsection

