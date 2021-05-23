<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>




                <li class="nav-item">
                    <a href="{{ route("admin.quizz.index") }}" class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        Evaluaciones
                    </a>
                </li>




                <li class="nav-item">
                    <a href="{{ route("admin.blocapp") }}" class="nav-link {{ request()->is('admin/blocapp/index') || request()->is('admin/blocapp/index*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-trophy nav-icon">
                        </i>
                        BlocApp
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route("admin.recognitions.req05") }}" class="nav-link">
                        <i class="nav-icon fas fa-vector-square">

                        </i>
                        Usuarios Identificados
                    </a>
                </li>

            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>


        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
