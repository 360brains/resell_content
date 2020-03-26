@extends("user.n-layouts.master")
@section("content")
    <div class="animated" style="animation-duration: 500ms;">
    <section class="section parallax-container section-md bg-gray-700 bg-overlay-5 text-center" data-parallax-img="images/parallax-3.jpg">
        <div class="material-parallax parallax">
            <img src="{{ asset('front/images/parallax-3.jpg') }}" alt="" style="display: block; transform: translate3d(-50%, 335px, 0px) rotate(0.1deg);">
        </div>
    <div class="parallax-content">
        <div class="container">
            <div class="block-2">
                <h3>Forgot Password</h3>
                <p style="letter-spacing: 0.05em;">Enter your email.</p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" class="rd-form form-lg form-filled form-inline form-inline_condensed" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-wrap">
                                <input id="email" type="email" class="form-input form-control-has-validation @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter e-mail" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <div class="form-button">
                            <button class="button button-blue-9 button-form-indicator button-icon-only" type="submit" aria-label="subscribe"><span class="icon form-icon-default icon-lg fl-bigmug-line-paper122"></span><span class="icon form-icon-success icon-lg mdi mdi-check"></span></button>
                        </div>

                    </form>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection
