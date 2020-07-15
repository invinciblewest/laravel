<nav>
    <div class="nav-wrapper">
        <a href="{{ route('index') }}" class="brand-logo" style="margin-left: 30px">neTwitter</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li class="{{ !request()->route()->named('index') ?: 'active'}}"><a href="{{ route('index') }}">Main</a></li>
        </ul>
    </div>
</nav>
