<nav class="navbar {{ $class }}">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a style=" font-family:sans-serif; color:rgb(218,165,32); font-size:20px;" class="navbar-brand" href="{{ route('dashboard') }}">MOJ NOVI BLOG</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div style="background-color:black;" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li style="font-family: Roboto; text-transform:uppercase;"  class="{{ Request::is('/dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}" style="color: rgb(218,165,32)">Nadzorna ploča</a></li>
                @if (Sentinel::check() && Sentinel::hasAccess('posts.view'))
                <li style="font-family: Roboto; text-transform:uppercase;" class="{{ Request::is('posts*') ? 'active' : '' }}"><a href="{{ route('posts.index') }}" style="color: rgb(218,165,32)">Blog postovi</a></li>
                @endif
                @if (Sentinel::check() && Sentinel::hasAccess('users.view'))
                    <li style="font-family: Roboto; text-transform:uppercase;" class="{{ Request::is('users*') ? 'active' : '' }}"><a href="{{ route('users.index') }}" style="color: rgb(218,165,32)">Korisnici</a></li>
                @endif
                @if (Sentinel::check() && Sentinel::hasAccess('roles.view'))
                <li style="font-family: Roboto; text-transform:uppercase;" class="{{ Request::is('roles*') ? 'active' : '' }}"><a href="{{ route('roles.index') }}" style="color: rgb(218,165,32)">Uloge</a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Sentinel::check())
                    <li><p class="navbar-text" style="font-family: Roboto; color: rgb(218,165,32)">{{ Sentinel::getUser()->email }}</p></li>
                    <li><a href="{{ route('auth.logout') }}" style="font-family: Roboto; text-transform:uppercase; color: rgb(218,165,32)">Odjava</a></li>
                @else
                    <li><a href="{{ route('auth.login.form') }}" style="font-family: Roboto; text-transform:uppercase; color: rgb(218,165,32)">Prijava</a></li>
                    <li><a href="{{ route('auth.register.form') }}" style="font-family: Roboto; text-transform:uppercase; color: rgb(218,165,32)">Registracija</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
