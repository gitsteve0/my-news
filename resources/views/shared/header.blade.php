<header class="bg-light p-3">
    <div class="container">
        <div class="d-flex justify-content-between">
            <h2><a class="text-decoration-none text-black" href="{{ route('news.index') }}">My News</a></h2>
            @if(!request()->routeIs('login'))
                @if(auth()->user())
                    <div class="d-flex align-items-center">
                        <h4 class="me-3">{{ auth()->user()->username }}</h4>
                        <form action="{{ route('logout') }}" method="post">
                            @method('POST')
                            @csrf
                            <button type="submit" href="{{ route('logout') }}" class="btn btn-primary fs-3">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary fs-3">Login</a>
                @endif
            @endif
        </div>
    </div>
</header>
