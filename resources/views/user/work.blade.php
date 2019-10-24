@extends('user.layouts.master')

@section('content')

    <div class="page-content">
        <div class="container">
            <div class="row">
                @foreach(auth()->user()->tasks as $task)
                    @if($task->status == 'started' OR $task->status == 'extended' OR $task->status == 'reworking')
                        @if($task->project->type->name == 'Content Writing')
                            <div class="col-lg-8 main-content">
                                <div class="card content-area">
                                    <div class="card-innr">
                                        <div class="card-head">
                                            <form action="{{ route('user.tasks.save.progress', $task->id) }}" method="post">
                                                @csrf
                                                <textarea id="messageArea" name="body" rows="7" class="form-control ckeditor" placeholder="Write your message..">{{ $task->body }}</textarea>
                                                <div class="gaps-2-5x"></div>
                                                <ul class="work-submit">
                                                    <li>
                                                        <button class="btn btn-auto btn-lg btn-success" type="submit" name="action" value="save"><em class="fas fa-download"></em>
                                                            Save Progress </button>
                                                    </li>
                                                    <div class="my-work-btn" >
                                                        <li><button class="btn btn-auto btn-lg btn-danger" name="action" value="submit"><em class="fas fa-upload"></em> Submit </button></li>
                                                    </div>

                                                </ul>
                                            </form>
                                        </div>

                                    </div>
                                    <!-- .card-innr -->
                                </div>
                                <!-- .card -->
                            </div>
                            <div class="col-lg-4 aside sidebar-right">
                                <div class="account-info card">
                                    <div class="card-innr">
                                        <h6 class="card-title card-title-sm">Download Template .DOC</h6>
                                        <ul class="btn-grp">
                                            <li><a href="{{ route('user.tasks.create.doc', $task->id) }}" class="btn btn-auto btn-sm btn-success"><em class="fas fa-download"></em> Download</a></li>
                                        </ul>
                                        <div class="gaps-2-5x"></div>
                                        <p class=" pdb-0-5x">Use the template to comply with our writing format <strong>or use our online editor.</strong></p>
                                    </div>

                                    <div class="card-innr">
                                        <h6 class="card-title card-title-sm">Upload Task .DOC <small>(Form your PC)</small></h6>

                                        <form action="{{ route('user.tasks.upload.doc', $task->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="file" accept=".doc, .docx"/>
                                            <div class="gaps-2-5x"></div>
                                            <button type="submit" class="btn btn-auto btn-sm btn-danger"><em class="fas fa-upload"></em> Submit</button>
                                        </form>
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
                            </div>
                        @elseif($task->project->type->name == 'Video Making')
                            <div class="col-lg-12">
                                <div class="referral-info card">
                                    <div class="card-innr">
                                        <h6 class="card-title card-title-sm">Upload your video</h6>
                                        <form action="{{ route('user.tasks.save.progress', $task->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input class="" type="file" id="video" name="video">
                                            <button class="btn btn-auto btn-lg btn-danger" name="action" value="video"><em class="fas fa-upload"></em> Upload </button>
                                        </form>
                                    </div>
                                    <!-- .copy-wrap -->
                                </div>
                            </div>
            @endif
            @endif
            @endforeach

        </div>
    </div>
    <!-- .container -->
    </div>

@endsection


