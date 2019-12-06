<section>
    <div class="row nav-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0 d-flex">
                <a class="navbar-brand" href="{{ route('pages.home') }}">
                    great
                    <span
                        style="color: #07b107; font-weight: 500;">Content</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent1"
                        aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link hvrcenter
                        {{strpos((request()->path()),"projects") == 'true' ? 'nav-active' : ''}}"
                               href="{{ route('pages.projects') }}">Browser Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hvrcenter
                     {{strpos((request()->path()),"#") == 'true' ? 'nav-active' : ''}}"
                               href="#">How it works</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hvrcenter
                     {{strpos((request()->path()),"#") == 'true' ? 'nav-active' : ''}}"
                               href="#">About Us</a>
                        </li>

                    </ul>
                    @guest
                        <a href="{{ asset('login') }}">
                            <button class="btn btn-success ml-3">Log in</button>
                        </a>
                    @else
                    @endguest
                </div>
            </nav>
        </div>
    </div>
</section>
