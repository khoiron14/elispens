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
            <li class="{{ request()->routeIs('dashboard*') ? 'active-page' : '' }}">
                <a href="index.html" class="active"><i class="material-icons-outlined">dashboard</i>Dashboard</a>
            </li>
        </ul>
    </div>
</div>