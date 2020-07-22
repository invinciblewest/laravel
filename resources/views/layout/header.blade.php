<nav>
    <div class="nav-wrapper">
        <a href="{{ route('index') }}" class="brand-logo" style="margin-left: 30px">neTwitter</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li class="{{ !request()->route()->named('index') ?: 'active'}}"><a href="{{ route('index') }}">Main</a></li>
            @guest
                <li class="{{ !request()->route()->named('login') ?: 'active'}}"><a href="{{ route('login') }}">Login</a></li>
                <li class="{{ !request()->route()->named('register') ?: 'active'}}"><a href="{{ route('register') }}">Register</a></li>
            @else
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
            @endguest
        </ul>
        <ul id="dropdown1" class="dropdown-content">
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('#logout_form').submit();">Logout</a>
                <form id="logout_form" action="{{ route('logout') }}" method="POST" style="display: none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
