<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Shop - Dogs, Puppies & Pet Products | Gibmarnel Kenya</title>
    <meta name="description"
        content="Shop quality dogs, adorable puppies and premium pet products at Gibmarnel. Browse our selection of trained dogs, healthy puppies and pet accessories. Contact +254 743 136920">
    <meta name="keywords" content="buy dogs Kenya, puppies for sale, pet products Kenya, dog shop, Gibmarnel shop">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta charset="utf-8">

    <link rel="canonical" href="https://gibmarnel.com/shop">
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/assets/images/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap CSS -->
    <link href="/assets/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Main Styles -->
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/mediaqueries.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/owl.theme.default.min.css" rel="stylesheet" type="text/css">

    <!-- AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">

    <script src="/assets/js/bootstrap.min.js" defer></script>
</head>


<body>
    <div class="sub-banner-section-outer">
        @include('header')
        <!-- SUB BANNER SECTION -->
        {{-- <section class="banner-section" style="padding: 60px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 col-12 d-lg-block d-none"></div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 text-center">
                        <div class="banner-section-content">
                            <h1 data-aos="fade-up">Our Dogs, Puppies & Pet Products</h1>
                            <p data-aos="fade-right" style="font-size: 16px;">Quality dogs, adorable puppies, and
                                premium pet products from Gibmarnel's breeding program.</p>
                            <div class="btn_wrapper" data-aos="fade-up">
                                <span>Home </span><span class="slash">/</span><span class="sub_span"> Shop</span>
                            </div>
                            <figure class="sub_banner_content_top_shape mb-0 position-absolute left_right_shape">
                                <img src="/assets/images/sub_banner_content_top_shape.png" alt=""
                                    class="img-fluid">
                            </figure>
                            <figure class="sub_banner_pink_foot_shape mb-0 position-absolute top_bottom_shape">
                                <img src="/assets/images/sub_banner_pink_foot.png" alt="" class="img-fluid">
                            </figure>
                            <figure class="sub_banner_green_foot_shape mb-0 position-absolute top_bottom_shape">
                                <img src="/assets/images/sub_banner_green_foot.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-12 d-lg-block d-none"></div>
                </div>
                <figure class="sub_banner_left_shape mb-0 position-absolute top_bottom_shape">
                    <img src="/assets/images/sub_banner_left_shape.png" alt="" class="img-fluid">
                </figure>
                <figure class="sub_banner_right_shape mb-0 position-absolute top_bottom_shape">
                    <img src="/assets/images/sub_banner_right_shape.png" alt="" class="img-fluid">
                </figure>
            </div>
        </section> --}}
    </div>
    <!-- OUR STORE SECTION -->
    <!-- Shop Section -->
   <section class="py-5">
    <div class="container">
        <!-- Header with Modern Styling -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="h1 mb-4 text-primary fw-bold">
                    <svg width="32" height="32" fill="currentColor" viewBox="0 0 16 16" class="me-2">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                    </svg>
                    Our Shop
                </h2>
                <p class="lead text-muted fs-4">Find your perfect companion or quality dog products</p>
            </div>
        </div>

        <!-- Enhanced Filters Section -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card shadow-lg border-0" style="border-radius: 20px; overflow: hidden;">
                    <div class="card-header bg-gradient-primary text-white py-4">
                        <h5 class="mb-0 fw-bold text-center">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" class="me-2">
                                <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                            Filter & Search
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form method="GET" action="{{ route('shop.index') }}" class="row g-4">
                            <!-- Search -->
                            <div class="col-md-4">
                                <label for="search" class="form-label fw-semibold text-primary">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                    Search
                                </label>
                                <input type="text" class="form-control form-control-lg border-2 border-primary" 
                                       id="search" name="search" value="{{ request('search') }}" 
                                       placeholder="🔍 Search dogs, products...">
                            </div>

                            <!-- Type Filter -->
                            <div class="col-md-2">
                                <label for="type" class="form-label fw-semibold text-info">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                        <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3A1.5 1.5 0 0 1 15 10.5v3A1.5 1.5 0 0 1 13.5 15h-3A1.5 1.5 0 0 1 9 13.5v-3z"/>
                                    </svg>
                                    Type
                                </label>
                                <select class="form-select form-select-lg border-2 border-info" id="type" name="type" onchange="toggleFilters()">
                                    <option value="">🏷️ All Types</option>
                                    <option value="dog" {{ request('type') === 'dog' ? 'selected' : '' }}>🐕 Dogs</option>
                                    <option value="product" {{ request('type') === 'product' ? 'selected' : '' }}>📦 Products</option>
                                </select>
                            </div>

                            <!-- Category Filter (Products) -->
                            <div class="col-md-2" id="category-filter" style="{{ request('type') === 'product' ? '' : 'display: none;' }}">
                                <label for="category" class="form-label fw-semibold text-success">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                    Category
                                </label>
                                <select class="form-select form-select-lg border-2 border-success" id="category" name="category">
                                    <option value="">📋 All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category }}" {{ request('category') === $category ? 'selected' : '' }}>
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Size Filter (Dogs) -->
                            <div class="col-md-2" id="size-filter" style="{{ request('type') === 'dog' ? '' : 'display: none;' }}">
                                <label for="size" class="form-label fw-semibold text-warning">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.5-13.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                                    </svg>
                                    Size
                                </label>
                                <select class="form-select form-select-lg border-2 border-warning" id="size" name="size">
                                    <option value="">📏 All Sizes</option>
                                    @foreach ($sizes as $size)
                                        <option value="{{ $size }}" {{ request('size') === $size ? 'selected' : '' }}>
                                            {{ $size }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Price Range -->
                            <div class="col-md-2">
                                <label for="min_price" class="form-label fw-semibold text-danger">
                                    💰 Min Price (KES)
                                </label>
                                <input type="number" class="form-control form-control-lg border-2 border-danger" 
                                       id="min_price" name="min_price" value="{{ request('min_price') }}" 
                                       placeholder="0" min="0">
                            </div>

                            <div class="col-md-2">
                                <label for="max_price" class="form-label fw-semibold text-danger">
                                    💸 Max Price (KES)
                                </label>
                                <input type="number" class="form-control form-control-lg border-2 border-danger" 
                                       id="max_price" name="max_price" value="{{ request('max_price') }}" 
                                       placeholder="100000" min="0">
                            </div>

                            <!-- Filter Buttons -->
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg fw-semibold me-3">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="me-2">
                                        <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                    Apply Filters
                                </button>
                                <a href="{{ route('shop.index') }}" class="btn btn-outline-danger btn-lg fw-semibold">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="me-2">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                    Clear All
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Results Summary with Modern Design -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center p-3 bg-gradient-info text-white rounded-3">
                    <span class="fw-semibold">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" class="me-2">
                            <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                        </svg>
                        Showing {{ $listings->firstItem() ?? 0 }}-{{ $listings->lastItem() ?? 0 }} of {{ $listings->total() }} results
                    </span>
                    @if (request()->hasAny(['search', 'type', 'category', 'size', 'min_price', 'max_price']))
                        <a href="{{ route('shop.index') }}" class="btn btn-light btn-sm fw-semibold">
                            View All Listings
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Enhanced Listings Grid -->
        <div class="row">
            @forelse($listings as $listing)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a href="{{ route('shop.show', $listing->slug) }}" class="text-decoration-none">
                        <article class="card h-100 shadow-lg border-0 listing-card">
                            <!-- Enhanced Image Section -->
                            <div class="position-relative overflow-hidden" style="height: 240px; border-radius: 15px 15px 0 0;">
                                @if ($listing->first_image)
                                    <img src="{{ asset('storage/' . $listing->first_image) }}" 
                                         alt="{{ $listing->name }}" 
                                         class="card-img-top h-100 w-100" 
                                         style="object-fit: cover; transition: transform 0.3s ease;">
                                @else
                                    <div class="bg-gradient-primary d-flex align-items-center justify-content-center h-100 text-white">
                                        <div class="text-center">
                                            <svg width="48" height="48" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                                            </svg>
                                            <p class="mt-2 fw-bold">{{ $listing->type === 'dog' ? '🐕 Dog' : '📦 Product' }}</p>
                                        </div>
                                    </div>
                                @endif

                                <!-- Enhanced Type Badge -->
                                <span class="position-absolute top-0 start-0 m-3 badge bg-gradient-{{ $listing->isDog() ? 'info' : 'success' }} text-white fw-semibold px-3 py-2" style="border-radius: 20px; font-size: 0.8rem;">
                                    {{ $listing->isDog() ? '🐕 Dog' : '📦 Product' }}
                                </span>

                                <!-- Price Badge -->
                                <span class="position-absolute top-0 end-0 m-3 badge bg-gradient-warning text-dark fw-bold px-3 py-2" style="border-radius: 20px; font-size: 0.9rem;">
                                    💰 KES {{ number_format($listing->price, 0) }}
                                </span>
                            </div>

                            <!-- Enhanced Card Body -->
                            <div class="card-body d-flex flex-column p-4">
                                <h5 class="card-title fw-bold text-dark mb-3">{{ $listing->name }}</h5>
                                
                                <p class="card-text text-muted mb-3" style="flex-grow: 1;">
                                    {{ Str::limit($listing->description, 80) }}
                                </p>

                                <!-- Enhanced Listing Details -->
                                <div class="mb-3">
                                    @if ($listing->isDog())
                                        <div class="d-flex gap-2 flex-wrap mb-2">
                                            <span class="badge bg-gradient-primary text-white small-tag">
                                                🏷️ {{ $listing->breed }}
                                            </span>
                                            <span class="badge bg-gradient-success text-white small-tag">
                                                🎂 {{ $listing->age_display }}
                                            </span>
                                            <span class="badge bg-gradient-info text-white small-tag">
                                                📏 {{ $listing->size }}
                                            </span>
                                        </div>
                                    @else
                                        <div class="d-flex gap-2 flex-wrap mb-2">
                                            <span class="badge bg-gradient-primary text-white small-tag">
                                                📋 {{ $listing->category }}
                                            </span>
                                            @if ($listing->brand)
                                                <span class="badge bg-gradient-success text-white small-tag">
                                                    🏢 {{ $listing->brand }}
                                                </span>
                                            @endif
                                            <span class="badge bg-gradient-info text-white small-tag">
                                                📦 {{ $listing->stock_quantity }} in stock
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Price and Location Section -->
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="price-display">
                                        <span class="h4 text-success fw-bold mb-0">
                                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                                <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                                            </svg>
                                            KES {{ number_format($listing->price, 2) }}
                                        </span>
                                    </div>
                                </div>

                                @if ($listing->location)
                                    <div class="mb-3">
                                        <small class="text-muted fw-semibold">
                                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                            </svg>
                                            {{ $listing->location }}
                                        </small>
                                    </div>
                                @endif

                                <!-- View Details Button -->
                                <div class="mt-auto">
                                    <span class="btn btn-primary w-100 fw-semibold">
                                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="me-2">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg>
                                        View Details
                                    </span>
                                </div>
                            </div>
                        </article>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <div class="bg-gradient-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                            <svg width="48" height="48" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-primary mb-3 fw-bold">No Listings Found</h3>
                        @if (request()->hasAny(['search', 'type', 'category', 'size', 'min_price', 'max_price']))
                            <p class="text-muted mb-4 fs-5">No listings match your current search criteria.</p>
                            <a href="{{ route('shop.index') }}" class="btn btn-primary btn-lg fw-semibold">View All Listings</a>
                        @else
                            <p class="text-muted fs-5">Check back soon for amazing dogs and products!</p>
                        @endif
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Modern Pagination (same as blog) -->
        @if ($listings->hasPages())
            <div style="display: flex; justify-content: center; margin-top: 3rem;">
                <nav style="display: flex; gap: 4px; align-items: center;">
                    {{-- Previous Page Link --}}
                    @if ($listings->onFirstPage())
                        <span style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 8px; background: #f1f5f9; color: #94a3b8; font-size: 14px; cursor: not-allowed;">‹</span>
                    @else
                        <a href="{{ $listings->previousPageUrl() }}" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 8px; background: white; color: #64748b; font-size: 14px; text-decoration: none; border: 1px solid #e2e8f0; transition: all 0.2s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.1);" onmouseover="this.style.background='#667eea'; this.style.color='white'; this.style.transform='translateY(-1px)'" onmouseout="this.style.background='white'; this.style.color='#64748b'; this.style.transform='translateY(0)'">‹</a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($listings->getUrlRange(1, $listings->lastPage()) as $page => $url)
                        @if ($page == $listings->currentPage())
                            <span style="display: inline-flex; align-items: center; justify-content: center; min-width: 40px; height: 40px; padding: 0 12px; border-radius: 8px; background: linear-gradient(135deg, #667eea, #764ba2); color: white; font-size: 14px; font-weight: 600; box-shadow: 0 4px 12px rgba(102,126,234,0.4);">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" style="display: inline-flex; align-items: center; justify-content: center; min-width: 40px; height: 40px; padding: 0 12px; border-radius: 8px; background: white; color: #64748b; font-size: 14px; font-weight: 500; text-decoration: none; border: 1px solid #e2e8f0; transition: all 0.2s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.1);" onmouseover="this.style.background='#f8fafc'; this.style.borderColor='#cbd5e1'; this.style.transform='translateY(-1px)'" onmouseout="this.style.background='white'; this.style.borderColor='#e2e8f0'; this.style.transform='translateY(0)'">{{ $page }}</a>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($listings->hasMorePages())
                        <a href="{{ $listings->nextPageUrl() }}" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 8px; background: white; color: #64748b; font-size: 14px; text-decoration: none; border: 1px solid #e2e8f0; transition: all 0.2s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.1);" onmouseover="this.style.background='#667eea'; this.style.color='white'; this.style.transform='translateY(-1px)'" onmouseout="this.style.background='white'; this.style.color='#64748b'; this.style.transform='translateY(0)'">›</a>
                    @else
                        <span style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 8px; background: #f1f5f9; color: #94a3b8; font-size: 14px; cursor: not-allowed;">›</span>
                    @endif
                </nav>
            </div>
        @endif
    </div>
</section>

<!-- Enhanced CSS with Blog-style Design -->
<style>
    /* Bright Modern Colors (same as blog) */
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        --info-gradient: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
        --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --danger-gradient: linear-gradient(135deg, #ff6b6b 0%, #feca57 100%);
    }

    .bg-gradient-primary {
        background: var(--primary-gradient) !important;
    }

    .bg-gradient-success {
        background: var(--success-gradient) !important;
    }

    .bg-gradient-info {
        background: var(--info-gradient) !important;
    }

    .bg-gradient-warning {
        background: var(--warning-gradient) !important;
    }

    .bg-gradient-danger {
        background: var(--danger-gradient) !important;
    }

    /* Enhanced Card Styles */
    .listing-card {
        transition: all 0.3s ease;
        border-radius: 15px;
        overflow: hidden;
        border-left: 5px solid #667eea;
    }

    .listing-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2) !important;
    }

    .card-title {
        transition: color 0.3s ease;
    }

    .listing-card:hover .card-title {
        color: #667eea !important;
    }

    /* Enhanced Badge Styles */
    .badge {
        font-size: 0.8rem;
        padding: 8px 12px;
        border-radius: 20px;
        font-weight: 600;
    }

    .small-tag {
        font-size: 0.65rem !important;
        padding: 3px 8px !important;
        border-radius: 10px;
        font-weight: 500;
    }

    /* Enhanced Button Styles */
    .btn {
        border-radius: 25px;
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
        background: var(--primary-gradient);
        border: none;
        color: white;
    }

    .btn-outline-primary {
        border: 2px solid #667eea;
        color: #667eea;
    }

    .btn-outline-primary:hover {
        background: var(--primary-gradient);
        border-color: #667eea;
    }

    .btn-outline-danger {
        border: 2px solid #ff6b6b;
        color: #ff6b6b;
    }

    .btn-outline-danger:hover {
        background: var(--danger-gradient);
        border-color: #ff6b6b;
    }

    /* Enhanced Form Styles */
    .form-control,
    .form-select {
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        transform: translateY(-1px);
    }

    /* Enhanced Image Styles */
    .card-img-top {
        border-radius: 15px 15px 0 0;
        transition: transform 0.3s ease;
    }

    .listing-card:hover .card-img-top {
        transform: scale(1.05);
    }

    /* Enhanced Shadows */
    .shadow-lg {
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
    }

    /* Color Theme */
    .text-primary {
        color: #667eea !important;
    }

    .text-success {
        color: #11998e !important;
    }

    .text-info {
        color: #3b82f6 !important;
    }

    .text-warning {
        color: #f093fb !important;
    }

    .text-danger {
        color: #ff6b6b !important;
    }

    .border-primary {
        border-color: #667eea !important;
    }

    .border-info {
        border-color: #3b82f6 !important;
    }

    .border-success {
        border-color: #11998e !important;
    }

    .border-warning {
        border-color: #f093fb !important;
    }

    .border-danger {
        border-color: #ff6b6b !important;
    }

    /* Fun animations */
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-10px);
        }
        60% {
            transform: translateY(-5px);
        }
    }

    .btn:hover {
        animation: bounce 0.6s ease;
    }

    /* Enhanced Card Header */
    .card-header {
        border-bottom: none;
    }

    /* Price Badge Enhancement */
    .listing-card .position-absolute.top-0.end-0 {
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    /* Enhanced Filter Section */
    .card-body .form-label {
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    /* Responsive Enhancements */
    @media (max-width: 768px) {
        .listing-card {
            margin-bottom: 1.5rem;
        }
        
        .card-body {
            padding: 1rem;
        }
        
        .badge {
            font-size: 0.7rem;
            padding: 6px 10px;
        }
        
        .small-tag {
            font-size: 0.6rem !important;
            padding: 2px 6px !important;
        }
    }

    /* Enhanced Typography */
    .fw-bold {
        font-weight: 700 !important;
    }

    .fw-semibold {
        font-weight: 600 !important;
    }

    /* Enhanced spacing */
    .gap-4 > * {
        margin-bottom: 0 !important;
    }
</style>

<!-- JavaScript for dynamic filters (enhanced) -->
<script>
    function toggleFilters() {
        const type = document.getElementById('type').value;
        const categoryFilter = document.getElementById('category-filter');
        const sizeFilter = document.getElementById('size-filter');

        // Add smooth transitions
        categoryFilter.style.transition = 'all 0.3s ease';
        sizeFilter.style.transition = 'all 0.3s ease';

        if (type === 'product') {
            categoryFilter.style.display = 'block';
            sizeFilter.style.display = 'none';
            setTimeout(() => {
                categoryFilter.style.opacity = '1';
                categoryFilter.style.transform = 'translateY(0)';
            }, 50);
        } else if (type === 'dog') {
            categoryFilter.style.display = 'none';
            sizeFilter.style.display = 'block';
            setTimeout(() => {
                sizeFilter.style.opacity = '1';
                sizeFilter.style.transform = 'translateY(0)';
            }, 50);
        } else {
            categoryFilter.style.display = 'none';
            sizeFilter.style.display = 'none';
        }
    }

    // Initialize on page load with enhanced effects
    document.addEventListener('DOMContentLoaded', function() {
        toggleFilters();
        
        // Add enhanced hover effects to cards
        const cards = document.querySelectorAll('.listing-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.borderLeftColor = '#764ba2';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.borderLeftColor = '#667eea';
            });
        });

        // Add loading animation to filter form
        const filterForm = document.querySelector('form');
        filterForm.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = `
                <div class="spinner-border spinner-border-sm me-2" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                Filtering...
            `;
            submitBtn.disabled = true;
        });
    });
</script>

    <!-- STATISTICS_NEWSLETTER COMBO SECTION -->
    @include('footer')
    <!-- Latest compiled JavaScript -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="../../unpkg.com/aos%402.3.1/dist/aos.js"></script>
    <script src="assets/js/owl.carousel.js"></script>
    <script src="assets/js/carousel.js"></script>
    <script src="assets/js/counter.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/video-popup.js"></script>
    <script src="assets/js/video-section.js"></script>
    <script src="assets/js/remove-product.js"></script>
</body>

</html>
