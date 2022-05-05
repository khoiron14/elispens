<div class="page-sidebar">
    <div class="logo-box">
        <a href="#" class="logo-text">
            <img src="{{ asset('images/logo1.png') }}" alt="elispens" height="34">
        </a>
        <a href="#" id="sidebar-close"><i class="material-icons">close</i></a>
        <a href="#" id="sidebar-state">
            <i class="material-icons">adjust</i>
            <i class="material-icons compact-sidebar-icon">panorama_fish_eye</i>
        </a>
    </div>
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            @admin
            <li class="{{ request()->routeIs('dashboard*') ? 'active-page' : '' }}">
                <a href="{{ route('dashboard') }}" class="active"><i class="material-icons-outlined">dashboard</i>Dashboard</a>
            </li>
            <li class="sidebar-title">Manajemen</li>
            <li class="{{ request()->routeIs('users*') ? 'active-page' : '' }}">
                <a href="{{ route('users.index') }}" class="active"><i class="material-icons-outlined">person</i>User</a>
            </li>
            <li class="{{ request()->routeIs('study_programs*') ? 'active-page' : '' }}">
                <a href="{{ route('study_programs.index') }}" class="active"><i class="material-icons-outlined">local_library</i>Program Studi</a>
            </li>
            <li class="{{ request()->routeIs('courses*') ? 'active-page' : '' }}">
                <a href="{{ route('courses.index') }}" class="active"><i class="material-icons-outlined">book</i>Mata Kuliah</a>
            </li>
            @endadmin
        </ul>
    </div>
</div>