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
                                style="{{ Request::is('/') ? 'color: #ff6b35; font-weight: bold;' : '' }}">Home</a>
                        </li>
                        <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('about') }}"
                                style="{{ Request::is('about') ? 'color: #ff6b35; font-weight: bold;' : '' }}">About
                                Us</a>
                        </li>
                        <li class="nav-item {{ Request::is('services') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('services') }}"
                                style="{{ Request::is('services') ? 'color: #ff6b35; font-weight: bold;' : '' }}">Services</a>
                        </li>
                        <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('shop') }}"
                                style="{{ Request::is('shop') ? 'color: #ff6b35; font-weight: bold;' : '' }}">Shop</a>
                        </li>

                        <li class="nav-item {{ Request::is('cart') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('cart') }}"
                                style="{{ Request::is('cart') ? 'color: #ff6b35; font-weight: bold;' : '' }}">Cart</a>
                        </li>
                        {{-- <li class="nav-item {{ Request::is('gallery') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('gallery') }}"
                                style="{{ Request::is('gallery') ? 'color: #ff6b35; font-weight: bold;' : '' }}">Gallery</a>
                        </li> --}}
                        <li class="nav-item {{ Request::is('blogs') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('blog') }}"
                                style="{{ Request::is('blogs') ? 'color: #ff6b35; font-weight: bold;' : '' }}">Blogs</a>
                        </li>
                        <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                            <a class="nav-link default-btn contact_us" href="{{ route('contact') }}"
                                style="{{ Request::is('contact') ? 'background-color: #ff6b35; border-color: #ff6b35;' : '' }}">Contact
                                Us</a>
                        </li>
                    </ul>
                    <div class="outer_div">
                        <figure class="mb-0">
                            <img src="{{ asset('assets/images/navbar_call_image.png') }}" alt=""
                                class="img-fluid hover-effect">
                        </figure>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
