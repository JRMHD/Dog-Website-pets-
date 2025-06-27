<!DOCTYPE html>
<html lang="zxx">


<head>
    <title>Blog - Dog Care Tips & Training Advice | Gibmarnel Kenya</title>
    <meta name="description"
        content="Read expert dog care tips, training advice, and breeding insights from Gibmarnel Kenya. Learn about puppy care, dog behavior, training techniques, and pet health. Contact +254 743 136920">
    <meta name="keywords"
        content="dog care tips Kenya, puppy training advice, dog blog, pet care articles, Gibmarnel blog">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta charset="utf-8">

    <link rel="canonical" href="https://gibmarnel.com/blog">
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/assets/images/ms-icon-144x144.png"> <!-- Adjust path if needed -->
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Custom Styles -->
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/mediaqueries.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/owl.theme.default.min.css" rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
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
                            <h1 data-aos="fade-up">Dog Care Blog</h1>
                            <p data-aos="fade-right" style="font-size: 16px;">Expert advice on training, breeding,
                                walking, and wellness for your furry friends</p>
                            <div class="btn_wrapper" data-aos="fade-up">
                                <span>Home </span><span class="slash">/</span><span class="sub_span"> Blogs</span>
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
    <div class="container py-5">
        <!-- Featured Posts -->
        @if ($featuredPosts->count() > 0 && !request('search') && !request('category'))
            <div class="mb-5">
                <h2 class="h3 mb-4 text-primary fw-bold">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16" class="me-2">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    Featured Posts
                </h2>
                <div class="row">
                    @foreach ($featuredPosts as $featured)
                        <div class="col-md-4 mb-4">
                            <a href="{{ route('blog.show', $featured->slug) }}" class="text-decoration-none">
                                <div class="card h-100 shadow-lg border-0 featured-post">
                                    @if ($featured->images && count($featured->images) > 0)
                                        <img src="{{ asset('storage/' . $featured->images[0]) }}" class="card-img-top"
                                            alt="{{ $featured->title }}" style="height: 240px; object-fit: cover;">
                                    @endif
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span
                                                class="badge bg-gradient-primary text-white">{{ $featured->category }}</span>
                                            <small class="text-muted fw-semibold">
                                                <svg width="12" height="12" fill="currentColor"
                                                    viewBox="0 0 16 16" class="me-1">
                                                    <path
                                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                    <path
                                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                </svg>
                                                {{ $featured->published_at->diffForHumans() }}
                                            </small>
                                        </div>
                                        <h5 class="card-title fw-bold text-dark">
                                            {{ $featured->title }}
                                        </h5>
                                        <p class="card-text text-muted">
                                            {{ Str::limit($featured->meta_description, 100) }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-primary fw-semibold">
                                                <svg width="14" height="14" fill="currentColor"
                                                    viewBox="0 0 16 16" class="me-1">
                                                    <path
                                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                                </svg>
                                                {{ $featured->author }}
                                            </small>
                                            <span class="btn btn-primary btn-sm fw-semibold">
                                                Read More
                                                <svg width="12" height="12" fill="currentColor"
                                                    viewBox="0 0 16 16" class="ms-1">
                                                    <path fill-rule="evenodd"
                                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <hr class="my-5 border-3 border-primary">
            </div>
        @endif

        <!-- Search and Filter Section -->
        <div class="row mb-4">
            <div class="col-lg-8">
                <form method="GET" action="{{ route('blog.index') }}" class="d-flex gap-3 flex-wrap">
                    <div class="flex-grow-1">
                        <input type="text" class="form-control form-control-lg border-2 border-primary"
                            name="search" value="{{ request('search') }}" placeholder="🔍 Search blog posts...">
                    </div>
                    <select class="form-select form-select-lg border-2 border-info" name="category"
                        style="width: auto;">
                        <option value="all">🏷️ All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category }}"
                                {{ request('category') == $category ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                    <select class="form-select form-select-lg border-2 border-success" name="sort"
                        style="width: auto;">
                        <option value="latest" {{ request('sort', 'latest') == 'latest' ? 'selected' : '' }}>📅 Latest
                        </option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>📆 Oldest</option>
                        <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>🔤 Title A-Z
                        </option>
                    </select>
                    <button type="submit" class="btn btn-primary btn-lg fw-semibold">Filter</button>
                    @if (request()->hasAny(['search', 'category', 'sort']))
                        <a href="{{ route('blog.index') }}" class="btn btn-outline-danger btn-lg">Clear</a>
                    @endif
                </form>
            </div>
        </div>

        <!-- Blog Posts Grid -->
        <div class="row">
            @forelse($posts as $post)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('blog.show', $post->slug) }}" class="text-decoration-none">
                        <article class="card h-100 shadow-lg border-0 blog-card">
                            @if ($post->images && count($post->images) > 0)
                                <img src="{{ asset('storage/' . $post->images[0]) }}" class="card-img-top"
                                    alt="{{ $post->title }}" style="height: 240px; object-fit: cover;">
                            @else
                                <div class="card-img-top bg-gradient-primary d-flex align-items-center justify-content-center"
                                    style="height: 240px;">
                                    <div class="text-center text-white">
                                        <svg width="48" height="48" fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0C3.58 0 0 3.58 0 8c0 1.42.37 2.75 1.02 3.91L8 16l6.98-4.09C15.63 10.75 16 9.42 16 8c0-4.42-3.58-8-8-8z" />
                                        </svg>
                                        <p class="mt-2 fw-bold fs-6">{{ $post->category }}</p>
                                    </div>
                                </div>
                            @endif

                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span
                                        class="badge bg-gradient-{{ $post->category == 'Training' ? 'success' : ($post->category == 'Breeding' ? 'info' : ($post->category == 'Dog Walking' ? 'warning' : 'primary')) }} text-white">
                                        {{ $post->category }}
                                    </span>
                                    <small class="text-muted fw-semibold">
                                        <svg width="12" height="12" fill="currentColor" viewBox="0 0 16 16"
                                            class="me-1">
                                            <path
                                                d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                            <path
                                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                        </svg>
                                        {{ $post->published_at->diffForHumans() }}
                                    </small>
                                </div>

                                <h5 class="card-title fw-bold text-dark mb-3">
                                    {{ $post->title }}
                                </h5>

                                <p class="card-text text-muted mb-3">
                                    {{ Str::limit(strip_tags($post->description), 100) }}
                                </p>

                                @if ($post->tags && count($post->tags) > 0)
                                    <div class="mb-3">
                                        <div class="d-flex gap-1 flex-wrap">
                                            @foreach (array_slice($post->tags, 0, 3) as $tag)
                                                <span
                                                    class="badge bg-gradient-info text-white small-tag">#{{ $tag }}</span>
                                            @endforeach
                                            @if (count($post->tags) > 3)
                                                <span
                                                    class="badge bg-secondary text-white small-tag">+{{ count($post->tags) - 3 }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-primary fw-semibold">
                                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16"
                                            class="me-1">
                                            <path
                                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                        </svg>
                                        {{ $post->author }}
                                    </small>
                                    <span class="btn btn-primary btn-sm fw-semibold">
                                        Read More
                                        <svg width="12" height="12" fill="currentColor" viewBox="0 0 16 16"
                                            class="ms-1">
                                            <path fill-rule="evenodd"
                                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </article>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <div class="bg-gradient-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                            style="width: 120px; height: 120px;">
                            <svg width="48" height="48" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </div>
                        <h3 class="text-primary mb-3 fw-bold">No Posts Found</h3>
                        @if (request()->hasAny(['search', 'category']))
                            <p class="text-muted mb-4 fs-5">No blog posts match your current search criteria.</p>
                            <a href="{{ route('blog.index') }}" class="btn btn-primary btn-lg fw-semibold">View All
                                Posts</a>
                        @else
                            <p class="text-muted fs-5">Check back soon for expert tips on dog care!</p>
                        @endif
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Modern Pagination -->
        @if ($posts->hasPages())
            <div style="display: flex; justify-content: center; margin-top: 3rem;">
                <nav style="display: flex; gap: 4px; align-items: center;">
                    {{-- Previous Page Link --}}
                    @if ($posts->onFirstPage())
                        <span
                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 8px; background: #f1f5f9; color: #94a3b8; font-size: 14px; cursor: not-allowed;">‹</span>
                    @else
                        <a href="{{ $posts->previousPageUrl() }}"
                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 8px; background: white; color: #64748b; font-size: 14px; text-decoration: none; border: 1px solid #e2e8f0; transition: all 0.2s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.1);"
                            onmouseover="this.style.background='#667eea'; this.style.color='white'; this.style.transform='translateY(-1px)'"
                            onmouseout="this.style.background='white'; this.style.color='#64748b'; this.style.transform='translateY(0)'">‹</a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                        @if ($page == $posts->currentPage())
                            <span
                                style="display: inline-flex; align-items: center; justify-content: center; min-width: 40px; height: 40px; padding: 0 12px; border-radius: 8px; background: linear-gradient(135deg, #667eea, #764ba2); color: white; font-size: 14px; font-weight: 600; box-shadow: 0 4px 12px rgba(102,126,234,0.4);">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}"
                                style="display: inline-flex; align-items: center; justify-content: center; min-width: 40px; height: 40px; padding: 0 12px; border-radius: 8px; background: white; color: #64748b; font-size: 14px; font-weight: 500; text-decoration: none; border: 1px solid #e2e8f0; transition: all 0.2s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.1);"
                                onmouseover="this.style.background='#f8fafc'; this.style.borderColor='#cbd5e1'; this.style.transform='translateY(-1px)'"
                                onmouseout="this.style.background='white'; this.style.borderColor='#e2e8f0'; this.style.transform='translateY(0)'">{{ $page }}</a>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($posts->hasMorePages())
                        <a href="{{ $posts->nextPageUrl() }}"
                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 8px; background: white; color: #64748b; font-size: 14px; text-decoration: none; border: 1px solid #e2e8f0; transition: all 0.2s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.1);"
                            onmouseover="this.style.background='#667eea'; this.style.color='white'; this.style.transform='translateY(-1px)'"
                            onmouseout="this.style.background='white'; this.style.color='#64748b'; this.style.transform='translateY(0)'">›</a>
                    @else
                        <span
                            style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 8px; background: #f1f5f9; color: #94a3b8; font-size: 14px; cursor: not-allowed;">›</span>
                    @endif
                </nav>
            </div>
        @endif
    </div>

    <style>
        /* Bright Modern Colors */
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

        .blog-card {
            transition: all 0.3s ease;
            border-radius: 15px;
            overflow: hidden;
        }

        .blog-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2) !important;
        }

        .featured-post {
            border-left: 5px solid #667eea;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .featured-post:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.3) !important;
        }

        .card-title {
            transition: color 0.3s ease;
        }

        .blog-card:hover .card-title,
        .featured-post:hover .card-title {
            color: #667eea !important;
        }

        .badge {
            font-size: 0.8rem;
            padding: 8px 12px;
            border-radius: 20px;
            font-weight: 600;
        }

        .small-tag {
            font-size: 0.65rem !important;
            padding: 3px 6px !important;
            border-radius: 10px;
            font-weight: 500;
        }

        .time-badge {
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .btn {
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

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

        .card-img-top {
            border-radius: 15px 15px 0 0;
            transition: transform 0.3s ease;
        }

        .blog-card:hover .card-img-top,
        .featured-post:hover .card-img-top {
            transform: scale(1.05);
        }

        /* Fun animations */
        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
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

        /* Enhanced shadows and gradients */
        .shadow-lg {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
        }

        .text-primary {
            color: #667eea !important;
        }

        .text-success {
            color: #11998e !important;
        }

        .text-info {
            color: #3b82f6 !important;
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
    </style>

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
