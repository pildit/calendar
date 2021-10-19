<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.events.create") }}" class="nav-link {{ request()->is('admin/events/create') ? 'active' : '' }}">
                <i class="fa-fw fas fa-cogs nav-icon"></i>
                Create Events
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.calendar.index") }}" class="nav-link {{ request()->is('admin/calendar') ? 'active' : '' }}">
                Calendar
                </a>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>