@extends('user.layouts.master')

@section('content')

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="referral-info card">
                        <div class="card-innr">
                            {{ dd($test) }}
                            <h3 class="">{!! $test->description !!}</h3>

                        </div>
                        <!-- .copy-wrap -->
                    </div>
                </div>
                <div class="col-lg-12 main-content">
                    <div class="card content-area">
                        <div class="card-innr">
                            <div class="card-head">
                                <form action="{{ route('user.tests.save.progress', $test->pivot->id) }}" method="post">
                                    @csrf
                                    <textarea id="messageArea" name="body" rows="7" class="form-control ckeditor" placeholder="Write your message..">
                                        {{ $test->pivot->body }}
                                    </textarea>
                                    <div class="gaps-2-5x"></div>
                                    <small><strong>Remember!</strong> You will have to complete it in the time awarded. If you do not submit in time, you lose progress and might have to write on any other topic.</small><br>
                                    <small><strong>Beware!</strong> Do not copy your content from any resource. It will be rejected streight away if found plagiarized.</small>
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

        </div>
    </div>

@endsection
