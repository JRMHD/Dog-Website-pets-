<!DOCTYPE html>
<html lang="zxx">


<head>
    <title>{{ $post->title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="description"
        content="Read expert dog care tips, training advice, and breeding insights from Gibmarnel Kenya. Learn about puppy care, dog behavior, training techniques, and pet health. Contact +254 743 136920">
    <meta name="keywords"
        content="dog care tips Kenya, puppy training advice, dog blog, pet care articles, Gibmarnel blog">

    <link rel="canonical" href="https://gibmarnel.com/blog">
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/assets/images/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap CSS -->
    <link href="/assets/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Owl Carousel -->
    <link href="/assets/css/owl.carousel.min.css" rel="stylesheet">
    <link href="/assets/css/owl.theme.default.min.css" rel="stylesheet">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">

    <!-- Custom Styles -->
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/mediaqueries.css" rel="stylesheet" type="text/css">
</head>


<body>
    <div class="sub-banner-section-outer">
        @include('header')

    </div>
    <div class="container py-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-gradient-light rounded-3 p-3 shadow-sm">
                <li class="breadcrumb-item">
                    <a href="{{ route('blog.index') }}" class="text-decoration-none text-primary fw-semibold">
                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5z" />
                        </svg>
                        Blog
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('blog.category', $post->category) }}"
                        class="text-decoration-none text-primary fw-semibold">
                        {{ $post->category }}
                    </a>
                </li>
                <li class="breadcrumb-item active fw-bold">{{ Str::limit($post->title, 30) }}</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <article class="blog-post">
                    <!-- Post Header -->
                    <header class="mb-5">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <span
                                class="badge bg-gradient-{{ $post->category == 'Training' ? 'success' : ($post->category == 'Breeding' ? 'info' : ($post->category == 'Dog Walking' ? 'warning' : 'primary')) }} text-white fs-6 px-3 py-2">
                                <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16"
                                    class="me-1">
                                    <path
                                        d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                </svg>
                                {{ $post->category }}
                            </span>
                            @if ($post->tags && count($post->tags) > 0)
                                <div class="d-flex gap-1 flex-wrap">
                                    @foreach ($post->tags as $tag)
                                        <span class="badge bg-gradient-info text-white"># {{ $tag }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <h1 class="display-4 fw-bold mb-4 text-dark">{{ $post->title }}</h1>

                        <div class="d-flex align-items-center text-muted mb-4 flex-wrap gap-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-gradient-primary rounded-circle p-2 me-2">
                                    <svg width="16" height="16" fill="white" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    </svg>
                                </div>
                                <span class="fw-semibold">By <strong
                                        class="text-primary">{{ $post->author }}</strong></span>
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="bg-gradient-success rounded-circle p-2 me-2">
                                    <svg width="16" height="16" fill="white" viewBox="0 0 16 16">
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5 0zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                    </svg>
                                </div>
                                <span class="fw-semibold">{{ $post->published_at->format('F j, Y') }}</span>
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="bg-gradient-warning rounded-circle p-2 me-2">
                                    <svg width="16" height="16" fill="white" viewBox="0 0 16 16">
                                        <path
                                            d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z" />
                                    </svg>
                                </div>
                                <span
                                    class="fw-semibold">{{ ceil(str_word_count(strip_tags($post->description)) / 200) }}
                                    min read</span>
                            </div>
                        </div>
                    </header>

                    <!-- Featured Image -->
                    @if ($post->images && count($post->images) > 0)
                        <div class="mb-5">
                            <img src="{{ asset('storage/' . $post->images[0]) }}"
                                class="img-fluid rounded-4 shadow-lg w-100" alt="{{ $post->title }}"
                                style="max-height: 500px; object-fit: cover;">
                        </div>
                    @endif

                    <!-- Post Content -->
                    <div class="post-content mb-5">
                        <div class="fs-5 lh-lg text-dark">
                            {!! nl2br(e($post->description)) !!}
                        </div>
                    </div>

                    <!-- Additional Images -->
                    @if ($post->images && count($post->images) > 1)
                        <div class="mb-5">
                            <h4 class="mb-4 text-primary fw-bold">
                                <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16"
                                    class="me-2">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                    <path
                                        d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                                </svg>
                                Gallery
                            </h4>
                            <div class="row g-4">
                                @foreach (array_slice($post->images, 1) as $image)
                                    <div class="col-md-6">
                                        <div class="image-card">
                                            <img src="{{ asset('storage/' . $image) }}"
                                                class="img-fluid rounded-3 shadow-lg w-100" alt="{{ $post->title }}"
                                                style="height: 250px; object-fit: cover;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Share Section -->
                    <div class="share-section bg-gradient-light rounded-4 p-4 mb-5 shadow-sm">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                            <h5 class="mb-0 text-primary fw-bold">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16"
                                    class="me-2">
                                    <path
                                        d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z" />
                                </svg>
                                Share this post:
                            </h5>
                            <div class="d-flex gap-2">
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(request()->url()) }}"
                                    target="_blank" class="btn btn-gradient-primary btn-sm fw-semibold">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                                        class="me-1">
                                        <path
                                            d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                    </svg>
                                    Twitter
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                    target="_blank" class="btn btn-gradient-info btn-sm fw-semibold">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                                        class="me-1">
                                        <path
                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                    </svg>
                                    Facebook
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . request()->url()) }}"
                                    target="_blank" class="btn btn-gradient-success btn-sm fw-semibold">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                                        class="me-1">
                                        <path
                                            d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.336-.445-.342-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                    </svg>
                                    WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Recent Posts -->
                @if ($recentPosts->count() > 0)
                    <div class="card border-0 shadow-lg rounded-4 mb-4">
                        <div class="card-header bg-gradient-primary text-white rounded-top-4 border-0">
                            <h5 class="mb-0 fw-bold">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16"
                                    class="me-2">
                                    <path
                                        d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                                </svg>
                                Recent Posts
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            @foreach ($recentPosts as $recent)
                                <div
                                    class="d-flex mb-3 recent-post-item {{ !$loop->last ? 'border-bottom pb-3' : '' }}">
                                    @if ($recent->images && count($recent->images) > 0)
                                        <img src="{{ asset('storage/' . $recent->images[0]) }}"
                                            class="rounded-3 me-3 shadow-sm" alt="{{ $recent->title }}"
                                            style="width: 70px; height: 70px; object-fit: cover;">
                                    @endif
                                    <div class="flex-grow-1">
                                        <h6 class="mb-2">
                                            <a href="{{ route('blog.show', $recent->slug) }}"
                                                class="text-decoration-none text-dark fw-semibold">
                                                {{ Str::limit($recent->title, 50) }}
                                            </a>
                                        </h6>
                                        <small class="text-muted fw-semibold">
                                            <svg width="12" height="12" fill="currentColor"
                                                viewBox="0 0 16 16" class="me-1">
                                                <path
                                                    d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                <path
                                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                            </svg>
                                            {{ $recent->published_at->diffForHumans() }}
                                        </small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Categories -->
                <div class="card border-0 shadow-lg rounded-4 mb-4">
                    <div class="card-header bg-gradient-info text-white rounded-top-4 border-0">
                        <h5 class="mb-0 fw-bold">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16"
                                class="me-2">
                                <path
                                    d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                            </svg>
                            Categories
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        @foreach (App\Models\BlogPost::getCategories() as $category)
                            @php
                                $count = App\Models\BlogPost::published()->where('category', $category)->count();
                            @endphp
                            <div class="d-flex justify-content-between align-items-center mb-3 category-item">
                                <a href="{{ route('blog.category', $category) }}"
                                    class="text-decoration-none fw-semibold {{ $post->category == $category ? 'text-primary' : 'text-dark' }}">
                                    {{ $category }}
                                </a>
                                <span class="badge bg-gradient-primary text-white">{{ $count }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Posts -->
        @if ($relatedPosts->count() > 0)
            <div class="mt-5">
                <h3 class="mb-4 text-primary fw-bold">
                    <svg width="28" height="28" fill="currentColor" viewBox="0 0 16 16" class="me-2">
                        <path
                            d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z" />
                    </svg>
                    Related Posts in {{ $post->category }}
                </h3>
                <div class="row">
                    @foreach ($relatedPosts as $related)
                        <div class="col-md-4 mb-4">
                            <a href="{{ route('blog.show', $related->slug) }}" class="text-decoration-none">
                                <article class="card h-100 shadow-lg border-0 blog-card">
                                    @if ($related->images && count($related->images) > 0)
                                        <img src="{{ asset('storage/' . $related->images[0]) }}" class="card-img-top"
                                            alt="{{ $related->title }}" style="height: 240px; object-fit: cover;">
                                    @else
                                        <div class="card-img-top bg-gradient-primary d-flex align-items-center justify-content-center"
                                            style="height: 240px;">
                                            <div class="text-center text-white">
                                                <svg width="48" height="48" fill="currentColor"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0C3.58 0 0 3.58 0 8c0 1.42.37 2.75 1.02 3.91L8 16l6.98-4.09C15.63 10.75 16 9.42 16 8c0-4.42-3.58-8-8-8z" />
                                                </svg>
                                                <p class="mt-2 fw-bold fs-6">{{ $related->category }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span
                                                class="badge bg-gradient-{{ $related->category == 'Training' ? 'success' : ($related->category == 'Breeding' ? 'info' : ($related->category == 'Dog Walking' ? 'warning' : 'primary')) }} text-white">
                                                {{ $related->category }}
                                            </span>
                                            <small class="text-muted fw-semibold">
                                                <svg width="12" height="12" fill="currentColor"
                                                    viewBox="0 0 16 16" class="me-1">
                                                    <path
                                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                    <path
                                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                </svg>
                                                {{ $related->published_at->diffForHumans() }}
                                            </small>
                                        </div>

                                        <h5 class="card-title fw-bold text-dark mb-3">
                                            {{ $related->title }}
                                        </h5>

                                        <p class="card-text text-muted mb-3">
                                            {{ Str::limit($related->meta_description, 100) }}
                                        </p>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-primary fw-semibold">
                                                <svg width="14" height="14" fill="currentColor"
                                                    viewBox="0 0 16 16" class="me-1">
                                                    <path
                                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                                </svg>
                                                {{ $related->author }}
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
                                </article>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Navigation -->
        <div class="d-flex justify-content-between align-items-center mt-5 pt-4">
            <a href="{{ route('blog.index') }}" class="btn btn-gradient-primary btn-lg fw-semibold">
                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="me-2">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                </svg>
                Back to Blog
            </a>
            <a href="{{ route('blog.category', $post->category) }}" class="btn btn-gradient-info btn-lg fw-semibold">
                More {{ $post->category }} Posts
                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="ms-2">
                    <path fill-rule="evenodd"
                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                </svg>
            </a>
        </div>
    </div>

    <style>
        /* Bright Modern Colors */
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --info-gradient: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
            --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --danger-gradient: linear-gradient(135deg, #ff6b6b 0%, #feca57 100%);
            --light-gradient: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
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

        .bg-gradient-light {
            background: var(--light-gradient) !important;
        }

        .btn-gradient-primary {
            background: var(--primary-gradient);
            border: none;
            color: white;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn-gradient-info {
            background: var(--info-gradient);
            border: none;
            color: white;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn-gradient-success {
            background: var(--success-gradient);
            border: none;
            color: white;
            border-radius: 25px;
            transition: all 0.3s ease;
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

        .card-title {
            transition: color 0.3s ease;
        }

        .blog-card:hover .card-title {
            color: #667eea !important;
        }

        .recent-post-item {
            transition: all 0.3s ease;
            border-radius: 10px;
            padding: 8px;
            margin: -8px;
        }

        .recent-post-item:hover {
            background: var(--light-gradient);
            transform: translateX(5px);
        }

        .category-item {
            transition: all 0.3s ease;
            border-radius: 8px;
            padding: 5px;
            margin: -5px;
        }

        .category-item:hover {
            background: var(--light-gradient);
            transform: translateX(3px);
        }

        .image-card {
            transition: transform 0.3s ease;
            overflow: hidden;
            border-radius: 12px;
        }

        .image-card:hover {
            transform: scale(1.05);
        }

        .share-section {
            border: 2px solid rgba(102, 126, 234, 0.1);
        }

        .post-content {
            line-height: 1.8;
        }

        .post-content p {
            margin-bottom: 1.5rem;
        }

        .blog-post h1 {
            line-height: 1.2;
        }

        .badge {
            font-size: 0.8rem;
            padding: 8px 12px;
            border-radius: 20px;
            font-weight: 600;
        }

        .breadcrumb-item a {
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: #667eea !important;
        }

        .btn {
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            border-radius: 15px 15px 0 0;
            transition: transform 0.3s ease;
        }

        .blog-card:hover .card-img-top {
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

        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            color: white;
        }

        .rounded-4 {
            border-radius: 15px !important;
        }

        .rounded-top-4 {
            border-top-left-radius: 15px !important;
            border-top-right-radius: 15px !important;
        }
    </style>
    <!-- STATISTICS_NEWSLETTER COMBO SECTION -->
    @include('footer')
    <!-- Latest compiled JavaScript -->
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="../../unpkg.com/aos%402.3.1/dist/aos.js"></script>
    <script src="/assets/js/owl.carousel.js"></script>
    <script src="/assets/js/carousel.js"></script>
    <script src="/assets/js/counter.js"></script>
    <script src="/assets/js/animation.js"></script>
    <script src="/assets/js/video-popup.js"></script>
    <script src="/assets/js/video-section.js"></script>
    <script src="/assets/js/remove-product.js"></script>
</body>

</html>
