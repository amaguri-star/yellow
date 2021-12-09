{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
            data-mdb-target="#navbarRightAlignExample" aria-controls="navbarRightAlignExample" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarRightAlignExample">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('auth.register') }}">ユーザー登録</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.login') }}">ログイン</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle"></i>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <form method="POST" action="{{ route('auth.logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">ログアウト</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav> --}}
<nav class="sidenav">
    <div class="sidenav__wrapper">
        <header class="sidenav__header">
            <div class="sidenav__header__user d-flex">
                <div class="sidenav__header__user__icon">
                    <i class="fas fa-user-circle fa-3x"></i>
                </div>
                <div class="sidenav__header__user__info">
                    <div class="sidenav__header__user__info__name">{{ Auth::user()->name }}</div>
                    <div class="sidenav__header__user__info__rank">ランク: 7</div>
                </div>
            </div>
        </header>
        <hr class="mt-3 mb-3">
        <main class="sidenav__main">
            <div class="sidenav__main__wrapper">
                <div class="sidenav__main__list">
                    <a class="sidenav__main__list__link">
                        <i class="sidenav__main__list__link__icon fas fa-tasks fa-lg"></i>
                        タスク
                    </a>
                    <a class="sidenav__main__list__link">
                        <i class="sidenav__main__list__link__icon far fa-comment-dots fa-lg"></i>
                        チャット
                    </a>
                    <a class="sidenav__main__list__link">
                        <i class="sidenav__main__list__link__icon far fa-sticky-note fa-lg"></i>
                        記録
                    </a>
                    <a class="sidenav__main__list__link">
                        <i class="sidenav__main__list__link__icon fas fa-sign-out-alt fa-lg"></i>
                        ログアウト
                    </a>
                </div>
            </div>
        </main>
        <footer class="sidenav__footer">

        </footer>
    </div>
</nav>
