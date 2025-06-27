<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS CDN for immediate styling -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>

    <!-- Alpine.js for interactions -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- Trix Editor Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .sidebar {
            background-color: #F0F5F4;
            width: 280px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .main-content {
            margin-left: 280px;
            min-height: 100vh;
            background-color: white;
            display: flex;
            flex-direction: column;
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            margin: 4px 16px;
            border-radius: 12px;
            color: #374151;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-item:hover {
            background-color: white;
            color: #5260DE;
            transform: translateX(4px);
        }

        .nav-item.active {
            background-color: #5260DE;
            color: white;
        }

        .nav-item svg {
            width: 20px;
            height: 20px;
            margin-right: 12px;
        }

        .top-header {
            background-color: white;
            padding: 16px 24px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .page-content {
            flex: 1;
            padding: 24px;
            background-color: white;
        }

        .user-dropdown {
            position: relative;
        }

        .dropdown-content {
            position: absolute;
            right: 0;
            top: 100%;
            background-color: white;
            min-width: 280px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            padding: 16px;
            margin-top: 8px;
            display: none;
            z-index: 1001;
        }

        .dropdown-content.show {
            display: block;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #5260DE, #FFD700);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 16px;
        }

        .sidebar-user-section {
            margin-top: auto;
            padding: 20px;
            border-top: 1px solid #d1d5db;
            background-color: white;
            border-radius: 12px 12px 0 0;
            margin: 0 16px 16px 16px;
        }

        .logout-btn {
            background-color: #ef4444;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-weight: 500;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #dc2626;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
                display: none;
            }

            .mobile-overlay.show {
                display: block;
            }
        }
    </style>
</head>

<body>
    <!-- Mobile Overlay -->
    <div class="mobile-overlay" id="mobileOverlay"></div>

    <!-- Left Sidebar -->
    <div class="sidebar" id="sidebar">
        <!-- Logo Section -->
        <div style="padding: 24px 20px; border-bottom: 1px solid #d1d5db;">
            <div style="display: flex; align-items: center; gap: 12px;">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo"
                    style="width: 40px; height: 40px; border-radius: 8px;">
                <span
                    style="font-size: 20px; font-weight: 700; color: #1f2937;">{{ config('app.name', 'MyApp') }}</span>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav style="flex: 1; padding: 24px 0;">
            @if (auth()->user()->role === 'admin')
                <!-- Admin Navigation Items -->
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                    </svg>
                    Dashboard
                </a>


                <a href="{{ url('/admin/users') }}"
                    class="nav-item {{ request()->is('admin/users*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                        </path>
                    </svg>
                    Manage Users
                </a>

                <a href="{{ url('/admin/users/create') }}"
                    class="nav-item {{ request()->is('admin/users/create') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Create User
                </a>

                <a href="{{ url('/admin/blog-posts') }}"
                    class="nav-item {{ request()->is('admin/blog-posts*') && !request()->is('admin/blog-posts/create') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    Blog Posts
                </a>

                <a href="{{ url('/admin/blog-posts/create') }}"
                    class="nav-item {{ request()->is('admin/blog-posts/create') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Create Blog Post
                </a>

                <a href="{{ url('/admin/listings') }}"
                    class="nav-item {{ request()->is('admin/listings*') && !request()->is('admin/listings/create') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                    Listings
                </a>

                <a href="{{ url('/admin/listings/create') }}"
                    class="nav-item {{ request()->is('admin/listings/create') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Create Listing
                </a>

                <a href="{{ route('profile.edit') }}"
                    class="nav-item {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Profile
                </a>
            @else
                <!-- Regular User Navigation Items (Only Profile) -->
                <a href="{{ route('profile.edit') }}"
                    class="nav-item {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Profile
                </a>
            @endif
        </nav>

        <!-- Bottom User Section -->
        <div class="sidebar-user-section">
            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
                <div class="user-avatar">
                    {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                </div>
                <div style="flex: 1; min-width: 0;">
                    <div
                        style="font-weight: 600; color: #1f2937; font-size: 14px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        {{ auth()->user()->name ?? 'User Name' }}
                    </div>
                    <div
                        style="color: #6b7280; font-size: 12px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        {{ auth()->user()->email ?? 'user@example.com' }}
                    </div>
                </div>
            </div>
            <div style="font-size: 12px; color: #6b7280; margin-bottom: 12px;">
                <div>Role: <span
                        style="font-weight: 500; color: #5260DE;">{{ auth()->user()->role ?? 'Admin' }}</span>
                </div>
                <div>ID: <span style="font-weight: 500;">#{{ auth()->user()->id ?? '001' }}</span></div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <svg style="width: 16px; height: 16px; display: inline; margin-right: 8px;" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    Log Out
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Top Header -->
        <header class="top-header">
            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn"
                style="display: none; padding: 8px; border: none; background: none; cursor: pointer; border-radius: 6px;">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>

            <!-- Page Title -->
            <div>
                @isset($header)
                    {{ $header }}
                @else
                    <h1 style="font-size: 24px; font-weight: 700; color: #1f2937; margin: 0;">
                        @if (request()->routeIs('dashboard'))
                            Dashboard
                        @elseif(request()->routeIs('profile.*'))
                            Profile
                        @else
                            Dashboard
                        @endif
                    </h1>
                @endisset
            </div>

            <!-- Top Right User Info -->
            <div class="user-dropdown">
                <button id="userDropdownBtn"
                    style="display: flex; align-items: center; gap: 12px; padding: 8px 12px; border: none; background: none; cursor: pointer; border-radius: 12px; transition: background-color 0.3s ease;">
                    <div class="user-avatar" style="width: 32px; height: 32px; font-size: 14px;">
                        {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                    </div>
                    <div style="text-align: left;">
                        <div style="font-weight: 600; color: #1f2937; font-size: 14px;">
                            {{ auth()->user()->name ?? 'User Name' }}</div>
                        <div style="color: #6b7280; font-size: 12px;">{{ auth()->user()->role ?? 'Admin' }}</div>
                    </div>
                    <svg style="width: 16px; height: 16px; color: #6b7280;" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div class="dropdown-content" id="userDropdown">
                    <div style="margin-bottom: 16px; padding-bottom: 16px; border-bottom: 1px solid #e5e7eb;">
                        <div style="font-weight: 600; color: #1f2937; margin-bottom: 4px;">
                            {{ auth()->user()->name ?? 'User Name' }}</div>
                        <div style="color: #6b7280; font-size: 14px; margin-bottom: 8px;">
                            {{ auth()->user()->email ?? 'user@example.com' }}</div>
                        <div style="color: #6b7280; font-size: 12px;">
                            <span>Role: <strong
                                    style="color: #5260DE;">{{ auth()->user()->role ?? 'Admin' }}</strong></span><br>
                            <span>User ID: <strong>#{{ auth()->user()->id ?? '001' }}</strong></span>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('profile.edit') }}"
                            style="display: flex; align-items: center; gap: 8px; padding: 8px 12px; color: #374151; text-decoration: none; border-radius: 8px; margin-bottom: 8px; transition: background-color 0.3s ease;">
                            <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Profile Settings
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                style="display: flex; align-items: center; gap: 8px; padding: 8px 12px; color: #ef4444; background: none; border: none; border-radius: 8px; cursor: pointer; width: 100%; text-align: left; transition: background-color 0.3s ease;">
                                <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="page-content">
            @yield('content')
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu functionality
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const sidebar = document.getElementById('sidebar');
            const mobileOverlay = document.getElementById('mobileOverlay');

            // User dropdown functionality
            const userDropdownBtn = document.getElementById('userDropdownBtn');
            const userDropdown = document.getElementById('userDropdown');

            // Show mobile menu button on small screens
            function checkScreenSize() {
                if (window.innerWidth <= 768) {
                    mobileMenuBtn.style.display = 'block';
                } else {
                    mobileMenuBtn.style.display = 'none';
                    sidebar.classList.remove('mobile-open');
                    mobileOverlay.classList.remove('show');
                }
            }

            // Initial check
            checkScreenSize();
            window.addEventListener('resize', checkScreenSize);

            // Mobile menu toggle
            mobileMenuBtn.addEventListener('click', function() {
                sidebar.classList.toggle('mobile-open');
                mobileOverlay.classList.toggle('show');
            });

            // Close mobile menu when overlay is clicked
            mobileOverlay.addEventListener('click', function() {
                sidebar.classList.remove('mobile-open');
                mobileOverlay.classList.remove('show');
            });

            // User dropdown toggle
            userDropdownBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                userDropdown.classList.toggle('show');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!userDropdownBtn.contains(e.target) && !userDropdown.contains(e.target)) {
                    userDropdown.classList.remove('show');
                }
            });

            // Add hover effects
            userDropdownBtn.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#f3f4f6';
            });

            userDropdownBtn.addEventListener('mouseleave', function() {
                this.style.backgroundColor = 'transparent';
            });
        });
    </script>
</body>

</html>
