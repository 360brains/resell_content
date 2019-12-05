@extends('user.layouts.master')

@section('content')
    <section class="my-projects pt-5 pb-5">
        <div class="container">
            <h4>Statictics</h4>
            <div class="statictics text-center">
                <div class="row">
                    <div class="col-md border-right pt-3 pb-3">
                        <h5>TOTAL WRITING</h5>
                        <h3>250</h3>
                    </div>
                    <div class="col-md border-right pt-3 pb-3">
                        <h5>TOTAL VIDEOS</h5>
                        <h3>250</h3>
                    </div>
                    <div class="col-md border-right pt-3 pb-3">
                        <h5>IN REVISION</h5>
                        <h3>250</h3>
                    </div>
                    <div class="col-md border-right pt-3 pb-3">
                        <h5>PENDING</h5>
                        <h3>250</h3>
                    </div>
                    <div class="col-md pt-3 pb-3">
                        <h5>REJECTED</h5>
                        <h3>250</h3>
                    </div>
                </div>
            </div>
            <div class="clearfix pt-3 pb-2">
                <h4 class="pt-3 float-left">My Jobs</h4>
                <div class="dropdown float-right">
                    Sort by:
                    <button class="btn btn-sm btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Completed
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <div class="my-jobs-table shadow">
                <div class="table-responsive">
                    <table class="table table-borderless ">
                        <thead>
                        <tr>
                            <th>SR.</th>
                            <th>JOB TITLE</th>
                            <th>DUE ON</th>
                            <th>STARTED DATE</th>
                            <th>ACTION</th>
                            <th>STATUS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @forelse($tasks as $task)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $task->project->name }}</td>
                                <td>{{ $task->created_at }}</td>
                                <td>{{ $task->deadline }}</td>
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
                                <td>{{ $task->status }}</td>
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
                                                                <div class="data-details-des"><span>{{ $training->name }}</span> <span></span></div>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

