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
                    <div class="sidenav__main__list__link">
                        <i class="sidenav__main__list__link__icon fas fa-sign-out-alt fa-lg"></i>
                        <button form="formLogout" type="submit">ログアウト</button>
                    </div>
                    <form id="formLogout" method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                    </form>
                </div>
            </div>
        </main>
        <footer class="sidenav__footer">
        </footer>
    </div>
</nav>
