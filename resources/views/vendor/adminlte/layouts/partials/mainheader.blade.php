<header class="main-header">
    <a href="{{ url('/home') }}" class="logo">
        <span class="logo-mini">RW</span>
        <span class="logo-lg"><b>Rocketz</b> Web</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ Gravatar::get($user->email) }}" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image"/>
                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ trans('adminlte_lang::message.login') }} Nov. 2012</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ trans('adminlte_lang::message.signout') }}
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                    <input type="submit" value="logout" style="display: none;">
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
