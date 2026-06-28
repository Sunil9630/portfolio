<style>
.sidebar {
    width: 260px;
    min-height: 100vh;
    background: linear-gradient(180deg, #0c4a6e 0%, #075985 40%, #0369a1 100%);
    display: flex;
    flex-direction: column;
    position: relative;
    transition: width .3s cubic-bezier(.4,0,.2,1);
    z-index: 100;
    box-shadow: 4px 0 24px rgba(12,74,110,.18);
}
.sidebar.collapsed {
    width: 70px;
}

.sidebar-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.2rem 1rem 1rem;
    border-bottom: 1px solid rgba(255,255,255,.1);
    min-height: 64px;
}
.sidebar-logo {
    display: flex;
    align-items: center;
    gap: .7rem;
    overflow: hidden;
    white-space: nowrap;
}
.sidebar-logo .logo-icon {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: rgba(255,255,255,.15);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 16px;
    color: #7dd3fc;
}
.sidebar-logo .logo-text {
    font-size: 1.1rem;
    font-weight: 800;
    color: #fff;
    letter-spacing: -.01em;
    transition: opacity .2s, width .3s;
    overflow: hidden;
}
.sidebar.collapsed .logo-text {
    opacity: 0;
    width: 0;
}

.toggle-btn {
    width: 30px;
    height: 30px;
    border-radius: 8px;
    background: rgba(255,255,255,.1);
    border: 1px solid rgba(255,255,255,.15);
    color: #bae6fd;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    flex-shrink: 0;
    transition: background .2s, transform .3s;
    font-size: 13px;
}
.toggle-btn:hover {
    background: rgba(255,255,255,.2);
}
.sidebar.collapsed .toggle-btn {
    transform: rotate(180deg);
}

.sidebar-section-label {
    font-size: .65rem;
    font-weight: 700;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: rgba(186,230,253,.45);
    padding: 1.1rem 1rem .4rem;
    white-space: nowrap;
    overflow: hidden;
    transition: opacity .2s;
}
.sidebar.collapsed .sidebar-section-label {
    opacity: 0;
}

.nav-list {
    list-style: none;
    padding: 0 .6rem;
    margin: 0;
    flex: 1;
}
.nav-list li {
    margin-bottom: 2px;
}
.nav-link-item {
    display: flex;
    align-items: center;
    gap: .85rem;
    padding: .65rem .8rem;
    border-radius: 10px;
    color: rgba(186,230,253,.8);
    text-decoration: none;
    font-size: .875rem;
    font-weight: 500;
    white-space: nowrap;
    overflow: hidden;
    transition: background .2s, color .2s, padding .3s;
    position: relative;
}
.nav-link-item:hover {
    background: rgba(255,255,255,.1);
    color: #fff;
}
.nav-link-item.active {
    background: rgba(255,255,255,.15);
    color: #fff;
    font-weight: 600;
}
.nav-link-item.active::before {
    content: '';
    position: absolute;
    left: 0;
    top: 20%;
    height: 60%;
    width: 3px;
    background: #38bdf8;
    border-radius: 0 3px 3px 0;
}
.nav-link-item .nav-icon {
    font-size: 15px;
    width: 20px;
    text-align: center;
    flex-shrink: 0;
    color: #7dd3fc;
    transition: color .2s;
}
.nav-link-item:hover .nav-icon,
.nav-link-item.active .nav-icon {
    color: #38bdf8;
}
.nav-link-item .nav-label {
    transition: opacity .2s, width .3s;
    overflow: hidden;
}
.sidebar.collapsed .nav-label {
    opacity: 0;
    width: 0;
}
.sidebar.collapsed .nav-link-item {
    justify-content: center;
    padding: .65rem;
}

.sidebar-footer {
    padding: .8rem .6rem 1rem;
    border-top: 1px solid rgba(255,255,255,.08);
}
.sidebar-user {
    display: flex;
    align-items: center;
    gap: .75rem;
    padding: .6rem .8rem;
    border-radius: 10px;
    background: rgba(255,255,255,.07);
    overflow: hidden;
    white-space: nowrap;
}
.user-avatar {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    background: linear-gradient(135deg, #38bdf8, #0ea5e9);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 700;
    color: #fff;
    flex-shrink: 0;
}
.user-info {
    overflow: hidden;
    transition: opacity .2s, width .3s;
}
.sidebar.collapsed .user-info {
    opacity: 0;
    width: 0;
}
.user-name {
    font-size: .8rem;
    font-weight: 600;
    color: #fff;
}
.user-role {
    font-size: .68rem;
    color: rgba(186,230,253,.55);
}

/* Tooltip on collapsed */
.sidebar.collapsed .nav-link-item {
    position: relative;
}
.nav-tooltip {
    display: none;
    position: absolute;
    left: calc(100% + 12px);
    top: 50%;
    transform: translateY(-50%);
    background: #0c4a6e;
    color: #fff;
    font-size: .78rem;
    font-weight: 500;
    padding: .35rem .75rem;
    border-radius: 8px;
    white-space: nowrap;
    pointer-events: none;
    z-index: 999;
    border: 1px solid rgba(255,255,255,.12);
}
.nav-tooltip::before {
    content: '';
    position: absolute;
    right: 100%;
    top: 50%;
    transform: translateY(-50%);
    border: 5px solid transparent;
    border-right-color: #0c4a6e;
}
.sidebar.collapsed .nav-link-item:hover .nav-tooltip {
    display: block;
}
</style>

<div class="sidebar" id="sidebar">

    {{-- Header --}}
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <div class="logo-icon">
                <i class="fas fa-layer-group"></i>
            </div>
            <span class="logo-text">Portfolio</span>
        </div>
        <div class="toggle-btn" id="sidebarToggle" title="Toggle sidebar">
            <i class="fas fa-chevron-left"></i>
        </div>
    </div>

    {{-- Main Nav --}}
    <div class="sidebar-section-label">Main</div>
    <ul class="nav-list">
        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home nav-icon"></i>
                <span class="nav-label">Dashboard</span>
                <span class="nav-tooltip">Dashboard</span>
            </a>
        </li>
    </ul>

    {{-- Content Nav --}}
    <div class="sidebar-section-label">Content</div>
    <ul class="nav-list">
        <li>
            <a href="{{ route('admin.projects.index') }}"
               class="nav-link-item {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                <i class="fas fa-code nav-icon"></i>
                <span class="nav-label">Projects</span>
                <span class="nav-tooltip">Projects</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.skills.index') }}"
               class="nav-link-item {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
                <i class="fas fa-bolt nav-icon"></i>
                <span class="nav-label">Skills</span>
                <span class="nav-tooltip">Skills</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.services.index') }}"
               class="nav-link-item {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <i class="fas fa-briefcase nav-icon"></i>
                <span class="nav-label">Services</span>
                <span class="nav-tooltip">Services</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.experiences.index') }}"
               class="nav-link-item {{ request()->routeIs('admin.experiences.*') ? 'active' : '' }}">
                <i class="fas fa-user-tie nav-icon"></i>
                <span class="nav-label">Experience</span>
                <span class="nav-tooltip">Experience</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.blogs.index') }}"
               class="nav-link-item {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                <i class="fas fa-pen-nib nav-icon"></i>
                <span class="nav-label">Blogs</span>
                <span class="nav-tooltip">Blogs</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.testimonials.index') }}"
               class="nav-link-item {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                <i class="fas fa-quote-right nav-icon"></i>
                <span class="nav-label">Testimonials</span>
                <span class="nav-tooltip">Testimonials</span>
            </a>
        </li>
    </ul>

    {{-- System Nav --}}
    <div class="sidebar-section-label">System</div>
    <ul class="nav-list">
        <li>
            <a href="{{ route('admin.contacts.index') }}"
               class="nav-link-item {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                <i class="fas fa-envelope nav-icon"></i>
                <span class="nav-label">Messages</span>
                <span class="nav-tooltip">Messages</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.settings.edit') }}"
               class="nav-link-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="fas fa-cog nav-icon"></i>
                <span class="nav-label">Settings</span>
                <span class="nav-tooltip">Settings</span>
            </a>
        </li>
    </ul>

    {{-- Footer / User --}}
    <div class="sidebar-footer">
        <div class="sidebar-user">
            <div class="user-avatar">A</div>
            <div class="user-info">
                <div class="user-name">Admin</div>
                <div class="user-role">Administrator</div>
            </div>
        </div>
    </div>

</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');
    const STORAGE_KEY = 'sidebar_collapsed';

    // Restore state from localStorage
    if (localStorage.getItem(STORAGE_KEY) === 'true') {
        sidebar.classList.add('collapsed');
    }

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        localStorage.setItem(STORAGE_KEY, sidebar.classList.contains('collapsed'));
    });
</script>