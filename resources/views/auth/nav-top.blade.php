    <ul class="nav justify-content-center nav-tabs">
        <li class="nav-item">
            <a class="nav-link @if ($nav==='login' ) active text-info @endif" aria-current="page" href="{{ route('login') }}">登入</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if ($nav==='register' ) active text-info @endif" href="{{ route('register') }}">註冊</a>
        </li>
    </ul>
