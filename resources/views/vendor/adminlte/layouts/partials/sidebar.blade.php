<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}
                    </a>
                </div>
            </div>
    @endif

    <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li>
                <a href="{{ url('home') }}"><i class='fa fa-link'></i>
                    <span>{{ trans('adminlte_lang::message.home') }}</span>
                </a>
            </li>
            <li class="{{ request()->is(['client', 'client/*'])? 'active' : '' }}">
                <a href="{{ url('client') }}"><i class='fa fa-building'></i>
                    <span>{{ trans('adminlte_lang::message.clients') }}</span>
                </a>
            </li>
            <li class="{{ request()->is(['product', 'product/*'])? 'active' : '' }}">
                <a href="{{ url('product') }}"><i class='fa fa-bars'></i>
                    <span>{{ trans('adminlte_lang::message.products') }}</span>
                </a>
            </li>
            <li class="{{ request()->is(['order', 'order/*'])? 'active' : '' }}">
                <a href="{{ url('order') }}"><i class='fa fa-shopping-cart'></i>
                    <span>{{ trans('adminlte_lang::message.orders') }}</span>
                </a>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
