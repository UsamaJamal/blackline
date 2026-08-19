<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/blacline-marketing-favicon.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | BlackLine</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="admin-sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2>BlackLine<span>.</span></h2>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}" class="active"><i data-feather="grid"></i> <span>Dashboard</span></a></li>
                    <li class="nav-section">PAGES</li>
                    <li>
                        <a href="{{ route('admin.home-hero') }}" class="{{ request()->routeIs('admin.home-hero') || request()->routeIs('admin.case-studies.*') || request()->routeIs('admin.feedbacks.*') ? 'active' : '' }}">
                            <i data-feather="home"></i> <span>Home Page Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                            <i data-feather="briefcase"></i> <span>Service Pages</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.portfolio.items.index') }}" class="{{ request()->routeIs('admin.portfolio.items.*') || request()->routeIs('admin.portfolio-hero') ? 'active' : '' }}">
                            <i data-feather="image"></i> <span>Portfolio</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.case-study-pages.index') }}" class="{{ request()->routeIs('admin.case-study-pages.*') ? 'active' : '' }}">
                            <i data-feather="file-text"></i> <span>Case Study Pages</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.blogs.index') }}" class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                            <i data-feather="edit-3"></i> <span>Blogs</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.seo-settings') }}" class="{{ request()->routeIs('admin.seo-settings') ? 'active' : '' }}">
                            <i data-feather="search"></i> <span>Static Pages SEO</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.authors.index') }}" class="{{ request()->routeIs('admin.authors.*') ? 'active' : '' }}">
                            <i data-feather="user"></i> <span>Authors</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.contact-settings') }}" class="{{ request()->routeIs('admin.contact-settings') ? 'active' : '' }}">
                            <i data-feather="phone-call"></i> <span>Contact Info</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.footer-settings') }}" class="{{ request()->routeIs('admin.footer-settings') ? 'active' : '' }}">
                            <i data-feather="layout"></i> <span>Footer Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.faqs.index') }}" class="{{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                            <i data-feather="help-circle"></i> <span>FAQs</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.appointments.index') }}" class="{{ request()->routeIs('admin.appointments.*') ? 'active' : '' }}">
                            <i data-feather="calendar"></i> <span>Appointments</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn"><i data-feather="log-out"></i> <span>Logout</span></button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="admin-main">
            <!-- Topbar -->
            <header class="admin-topbar">
                <button id="sidebar-toggle" class="icon-btn"><i data-feather="menu"></i></button>
                <div class="topbar-right">
                    <div class="user-profile">
                        <div class="avatar">{{ substr(session('admin_name', 'Admin'), 0, 1) }}</div>
                        <span>{{ session('admin_name', 'Admin') }}</span>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="admin-content">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        feather.replace();
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('collapsed');
        });
    </script>
</body>
</html>
