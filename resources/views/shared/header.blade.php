<header class="bg-light p-3">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2><a class="text-decoration-none text-black" href="{{ route('news.index') }}">My News</a></h2>
            @if(!request()->routeIs('login') && !request()->routeIs('register'))
                @if(auth()->user())
                    <div class="d-flex align-items-center">
                        <div class="me-3 fw-bold fs-5">{{ auth()->user()->username }}</div>
                        <form action="{{ route('logout') }}" method="post">
                            @method('POST')
                            @csrf
                            <button type="submit" href="{{ route('logout') }}" class="btn btn-primary">
                                Logout
                            </button>
                        </form>
                        <a href="{{ route('change-password') }}" class="btn btn-primary ms-1">Change password</a>
                    </div>
                @else
                    <div>
                        <a href="{{ route('register') }}" class="btn btn-primary me-2">Register</a>
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    </div>
                @endif
            @endif
        </div>
    </div>
</header>
