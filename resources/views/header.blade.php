<header>
    <div class="main_header">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <a class="navbar-brand" href="/">
                    <figure class="mb-0"
                        style="background-color: #f8f9fa; padding: 8px 12px; border-radius: 8px; display: inline-block;">
                        <img src="{{ asset('assets/images/pawsh_logo.png') }}" alt="" class="img-fluid"
                            style="height: 80px; width: auto;">
                    </figure>
                </a>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                            <a class="nav-link" href="/"
                                style="{{ Request::is('/') ? 'color: #4169E1; font-weight: bold;' : '' }}">Home</a>
                        </li>
                        <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('about') }}"
                                style="{{ Request::is('about') ? 'color: #4169E1; font-weight: bold;' : '' }}">About
                                Us</a>
                        </li>
                        <li class="nav-item {{ Request::is('services') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('services') }}"
                                style="{{ Request::is('services') ? 'color: #4169E1; font-weight: bold;' : '' }}">Services</a>
                        </li>
                        <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('shop') }}"
                                style="{{ Request::is('shop') ? 'color: #4169E1; font-weight: bold;' : '' }}">Shop</a>
                        </li>

                        <li class="nav-item {{ Request::is('cart') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('cart') }}"
                                style="{{ Request::is('cart') ? 'color: #4169E1; font-weight: bold;' : '' }}">
                                <svg width="20" height="20" fill="currentColor" class="me-1"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                </svg>
                                Cart
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('blogs') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('blog') }}"
                                style="{{ Request::is('blogs') ? 'color: #4169E1; font-weight: bold;' : '' }}">Blogs</a>
                        </li>
                        <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                            <a class="nav-link default-btn contact_us" href="{{ route('contact') }}"
                                style="{{ Request::is('contact') ? 'background-color: #4169E1; border-color: #4169E1;' : '' }}">Contact
                                Us</a>
                        </li>
                    </ul>

                    <!-- Authentication Section -->
                    <div class="auth_section ms-auto d-flex align-items-center">
                        @auth
                            <!-- User is logged in - Show Username as clickable text -->
                            <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center"
                                style="color: #333; text-decoration: none;">
                                <svg width="24" height="24" fill="currentColor" class="me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                </svg>
                                {{ Auth::user()->name }}
                            </a>
                        @else
                            <!-- User is not logged in - Show Login and Sign Up -->
                            <div class="auth_buttons d-flex align-items-center">
                                <a href="{{ route('login') }}"
                                    class="btn btn-outline-primary me-2 d-flex align-items-center"
                                    style="border-color: #4169E1; color: #4169E1;">
                                    <svg width="16" height="16" fill="currentColor" class="me-1"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                                        <path fill-rule="evenodd"
                                            d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                    </svg>
                                    Login
                                </a>
                                <a href="{{ route('register') }}" class="btn btn-primary d-flex align-items-center"
                                    style="background-color: #4169E1; border-color: #4169E1;">
                                    <svg width="16" height="16" fill="currentColor" class="me-1"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                    </svg>
                                    Sign Up
                                </a>
                            </div>
                        @endauth
                    </div>

                </div>
            </nav>
        </div>
    </div>
</header>
