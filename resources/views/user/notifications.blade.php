@extends('user.layouts.master')

@section('content')
    <section class="notifi-sec pt-5 pb-5">
        <div class="container">
            <div class="card p-4 shadow">
                <h4 class="card-title">Notifications</h4>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Name</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                            {{--                            <th class="data-col dt-type">--}}
                            {{--                                <div class="dt-type-text">Type</div>--}}
                            {{--                            </th>--}}
                            {{--                            <th class="data-col"></th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(auth()->user()->unreadNotifications as $notification)
                            {{ $notification->markAsRead() }}
                        @endforeach
                        @php($i = 1)
                        @forelse(auth()->user()->notifications()->paginate() as $notification)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="data-state data-state-approved"><span
                                                class="d-none">Approved</span></div>
                                        <div ><span>{{ $i++ }}</span></div>
                                    </div>
                                </td>
                                <td><span>{{ $notification->data['taskName'] }}</span></td>
                                <td><span>{{ $notification->data['message']}}</span></td>
                                <td><span>{{ date('d-M-Y h:i', strtotime($notification->data['date'])) }}</span></td>
                                <td ><span>{!! $notification->data['link'] ?? 'None' !!}</span></td>
                                {{--                                <td class="data-col dt-type"><span class="dt-type-md badge badge-outline badge-success badge-md">{{ $transaction->status }}</span><span class="dt-type-sm badge badge-sq badge-outline badge-success badge-md">P</span></td>--}}
                                {{--                                <td class="data-col text-right"><a href="#" data-toggle="modal" data-target="#transaction-details{{$transaction->id}}" class="btn btn-light-alt btn-xs btn-icon"><em class="ti ti-eye"></em></a></td>--}}

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No Notifications Found</td>
                            </tr>
                        @endforelse
                        <!-- .data-item -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
