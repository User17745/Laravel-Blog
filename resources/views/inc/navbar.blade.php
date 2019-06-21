<nav class="navbar fixed-bottom navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav m-auto">
            <a class="nav-item nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="/posts">Blog</a>
            <a class="nav-item nav-link" href="/services">Service</a>
            <a class="nav-item nav-link" href="/about">About</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/posts/create" class="nav-item nav-link">Create Post</a></li>
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li>
                <a href="#" class="nav-item nav-link">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
            </li>

            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="nav-item nav-link">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                </form>
            </li>
        @endguest
        </ul>
    </div>
</nav>