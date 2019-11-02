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
                <div class="col-lg-12">
                <div class="referral-info card">
                    <div class="card-innr">
                        <h6 class="card-title card-title-sm">Upload your video</h6>
                        <form action="{{ route('user.tests.save.progress', $test->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input class="" type="file" id="video" name="video">
                            <button type="submit" class="btn btn-auto btn-lg btn-danger" name="action" value="video"><em class="fas fa-upload"></em> Upload </button>
                        </form>
                    </div>
                    <!-- .copy-wrap -->
                </div>
            </div>
            </div>

        </div>
    </div>

@endsection
