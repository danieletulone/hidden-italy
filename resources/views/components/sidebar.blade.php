<nav id="mySidebar" class="sidebar shadow-lg" >
    <a href="{{ route('home') }}">
        <i class="material-icons-round">home</i>
        <span class="icon-text"></span>
    </a>

    <a href="{{ route('monuments.index') }}">
        <i class="material-icons-round">account_balance</i>
        <span class="icon-text"></span>
    </a>

    <a href="">
        <i class="material-icons">account_circle</i>
        <span class="icon-text"></span>
    </a>

    <a href="{{ route('comments.index') }}">
        <i class="material-icons">notifications</i>
        <span class="icon-text"></span>
    </a>

    <a href="{{ route('logout') }}">
        <i class="material-icons">exit_to_app</i>
        <span class="icon-text"></span>
    </a>
</nav>
