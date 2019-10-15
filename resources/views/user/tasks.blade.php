@extends('user.layouts.master')

@section('content')

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 main-content">
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
                                    <th class="data-col dt-type">
                                        <div class="dt-type-text">Current Status</div>
                                    </th>
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
                                        <td class="data-col dt-amount"><span class="lead amount-pay">{{ $task->name }}</span></td>
                                        <td class="data-col dt-usd-amount"><span class="lead amount-pay">{{ $task->level->name }}</span></td>
                                        <td class="data-col dt-account"><span class="lead user-info">{{ $task->created_at }}</span></td>
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
                                                                            <div class="data-details-des"><span>{{ $status->created_at }}</span> <span></span></div>
                                                                        </li>
                                                                        @break

                                                                        @case('delivered')
                                                                        <li>
                                                                            <div class="data-details-head">Delivered at</div>
                                                                            <div class="data-details-des"><span>{{ $status->created_at }}</span> <span></span></div>
                                                                        </li>
                                                                        @break

                                                                        @case('approved')
                                                                        <li>
                                                                            <div class="data-details-head">Approved at</div>
                                                                            <div class="data-details-des"><span>{{ $status->created_at }}</span> <span></span></div>
                                                                        </li>
                                                                        @break

                                                                        @case('rejected')
                                                                        <li>
                                                                            <div class="data-details-head">Rejected at</div>
                                                                            <div class="data-details-des">{{ $status->created_at }}</div>
                                                                        </li>
                                                                        @break

                                                                        @case('reworking')
                                                                        <li>
                                                                            <div class="data-details-head">Reworking at</div>
                                                                            <div class="data-details-des">{{ $status->created_at }}</div>
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
                                                                    <div class="data-details-des"><strong>{{ $task->type->name }}</strong></div>
                                                                </li>
                                                                <!-- li -->
                                                                <li>
                                                                    <div class="data-details-head">Task Category</div>
                                                                    <div class="data-details-des"><strong>{{ $task->category->name }}</strong></div>
                                                                </li>
                                                                <!-- li -->
                                                                <li>
                                                                    <div class="data-details-head">Task Level</div>
                                                                    <div class="data-details-des"><strong>{{ $task->level->name }}</strong></div>
                                                                </li>
                                                                <!-- li -->
                                                                <li>
                                                                    <div class="data-details-head">Points Awarded</div>
                                                                    <div class="data-details-des"><span>{{ $task->points_awarded }}</span> <span></span></div>
                                                                </li>
                                                                <!-- li -->
                                                                @forelse($task->trainings as $training)
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
                                                                    <div class="data-details-des"><strong>{!! $task->description !!}</strong></div>
                                                                </li>
                                                            <!-- li -->
                                                            </ul>
                                                            <!-- .data-details -->


                                                            <div class="gaps-3x"></div>
                                                            <h6 class="card-sub-title">{{ $task->for }}Transaction Details</h6>
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
                <div class="col-lg-4 aside sidebar-right">
                    <div class="account-info card">
                        <div class="card-innr">
                            <h6 class="card-title card-title-sm">Your Account Status</h6>
                            <ul class="btn-grp">
                                <li><a href="#" class="btn btn-auto btn-xs btn-success">Email Verified</a></li>
                                <li><a href="#" class="btn btn-auto btn-xs btn-warning">KYC Pending</a></li>
                            </ul>
                            <div class="gaps-2-5x"></div>
                            <h6 class="card-title card-title-sm">Receiving Wallet</h6>
                            <div class="d-flex justify-content-between"><span><span>0x39deb3.....e2ac64rd</span> <em class="fas fa-info-circle text-exlight" data-toggle="tooltip" data-placement="bottom" title="1 ETH = 100 TWZ"></em></span><a href="#" data-toggle="modal" data-target="#edit-wallet" class="link link-ucap">Edit</a></div>
                        </div>
                    </div>
                    <div class="referral-info card">
                        <div class="card-innr">
                            <h6 class="card-title card-title-sm">Earn with Referral</h6>
                            <p class=" pdb-0-5x">Invite your friends &amp; family and receive a <strong><span class="text-primary">bonus - 15%</span> of the value of contribution.</strong></p>
                            <div class="copy-wrap mgb-0-5x"><span class="copy-feedback"></span><em class="fas fa-link"></em>
                                <input type="text" class="copy-address" value="https://demo.themenio.com/ico?ref=7d264f90653733592" disabled>
                                <button class="copy-trigger copy-clipboard" data-clipboard-text="https://demo.themenio.com/ico?ref=7d264f90653733592"><em class="ti ti-files"></em></button>
                            </div>
                            <!-- .copy-wrap -->
                        </div>
                    </div>
                    <div class="kyc-info card">
                        <div class="card-innr">
                            <h6 class="card-title card-title-sm">Identity Verification - KYC</h6>
                            <p>To comply with regulation, participant will have to go through indentity verification.</p>
                            <p class="lead text-light pdb-0-5x">You have not submitted your KYC application to verify your indentity.</p><a href="#" class="btn btn-primary btn-block">Click to Proceed</a>
                            <h6 class="kyc-alert text-danger">* KYC verification required for purchase token</h6></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .container -->
    </div>

@endsection
