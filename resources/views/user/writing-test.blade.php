@extends('user.layouts.master')

@section('content')

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="referral-info card">
                        <div class="card-innr">
                            <h3 class="">{!! $test->description !!}</h3>

                        </div>
                        <!-- .copy-wrap -->
                    </div>
                </div>
                <div class="col-lg-12 main-content">
                    <div class="card content-area">
                        <div class="card-innr">
                            <div class="card-head">
                                <form action="" method="post">
                                    @csrf
                                    <textarea id="messageArea" name="body" rows="7" class="form-control ckeditor" placeholder="Write your message..">{{ $test->body }}</textarea>
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

            </div>
            <div class="col-lg-12">
                <div class="referral-info card">
                    <div class="card-innr">
                        <h6 class="card-title card-title-sm">Upload your video</h6>
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <input class="" type="file" id="video" name="video">
                            <button class="btn btn-auto btn-lg btn-danger" name="action" value="video"><em class="fas fa-upload"></em> Upload </button>
                        </form>
                    </div>
                    <!-- .copy-wrap -->
                </div>
            </div>
        </div>
    </div>

@endsection
