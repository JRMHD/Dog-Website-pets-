<!DOCTYPE html>
<html lang="zxx">


<head>
    <title>{{ $listing->name }}</title>
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




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Site Styles -->
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/mediaqueries.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/owl.theme.default.min.css" rel="stylesheet" type="text/css">

    <!-- AOS (Animate on Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
</head>

<body>
    <div class="sub-banner-section-outer">
        @include('header')
        <!-- SUB BANNER SECTION -->
        {{-- <section class="banner-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-12 col-sm-12 col-12 d-lg-block d-none"></div>
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 text-center">
                        <div class="banner-section-content">
                            <h1 data-aos="fade-up">Our Dogs, Puppies & Pet Products</h1>
                            <p data-aos="fade-right">Discover premium quality dogs and adorable puppies from Gibmarnel's
                                carefully selected breeding program. Plus explore our range of high-quality pet food,
                                toys, accessories, and training equipment. Find your perfect four-legged family member
                                and everything they need today.
                            </p>
                            <div class="btn_wrapper" data-aos="fade-up">
                                <span>Home </span><span class="slash">/</span><span class="sub_span"> Shop</span>
                            </div>
                            <figure class="sub_banner_content_top_shape mb-0 position-absolute left_right_shape">
                                <img src="assets/images/sub_banner_content_top_shape.png" alt=""
                                    class="img-fluid">
                            </figure>
                            <figure class="sub_banner_pink_foot_shape mb-0 position-absolute top_bottom_shape">
                                <img src="assets/images/sub_banner_pink_foot.png" alt="" class="img-fluid">
                            </figure>
                            <figure class="sub_banner_green_foot_shape mb-0 position-absolute top_bottom_shape">
                                <img src="assets/images/sub_banner_green_foot.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 col-12 d-lg-block d-none"></div>
                </div>
                <figure class="sub_banner_left_shape mb-0 position-absolute top_bottom_shape">
                    <img src="assets/images/sub_banner_left_shape.png" alt="" class="img-fluid">
                </figure>
                <figure class="sub_banner_right_shape mb-0 position-absolute top_bottom_shape">
                    <img src="assets/images/sub_banner_right_shape.png" alt="" class="img-fluid">
                </figure>
            </div>
        </section> --}}
    </div>
    <!-- Shop Details Section -->
    <section class="py-5">
        <div class="container">
            <!-- Enhanced Back Button -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb bg-gradient-light rounded-3 p-3 shadow-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ route('shop.index') }}" class="text-decoration-none text-primary fw-semibold">
                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                <path
                                    d="M0 2.5A1.5 1.5 0 0 1 1.5 1h1A1.5 1.5 0 0 1 4 2.5v2.764c.234.018.46.058.673.118l.262.073.537.151a7.036 7.036 0 0 1 2.649 1.832c.14.14.263.291.369.451.413.625.554 1.406.385 2.158a2.45 2.45 0 0 1-.79 1.378 2.45 2.45 0 0 1-1.378.79c-.752.169-1.533.028-2.158-.385a7.036 7.036 0 0 1-1.832-2.649l-.151-.537-.073-.262A4.978 4.978 0 0 0 1.5 7.236V4.5zm1 0v2.764a3.978 3.978 0 0 1 .094.155l.073.262.151.537a6.037 6.037 0 0 0 1.573 2.274 1.45 1.45 0 0 0 1.277.453 1.45 1.45 0 0 0 .817-.468 1.45 1.45 0 0 0 .468-.817 1.45 1.45 0 0 0-.453-1.277 6.037 6.037 0 0 0-2.274-1.573l-.537-.151-.262-.073A3.978 3.978 0 0 1 1.5 5.264V2.5z" />
                            </svg>
                            Shop
                        </a>
                    </li>
                    <li class="breadcrumb-item active fw-bold">{{ Str::limit($listing->name, 30) }}</li>
                </ol>
            </nav>

            <div class="row">
                <!-- Images Section -->
                <div class="col-lg-6 mb-4">
                    <div class="product-gallery">
                        @if ($listing->images && count($listing->images) > 0)
                            <!-- Main Image -->
                            <div class="main-image mb-4">
                                <div class="image-container rounded-4 overflow-hidden shadow-lg position-relative">
                                    <img id="mainImage" src="{{ asset('storage/' . $listing->images[0]) }}"
                                        alt="{{ $listing->name }}" class="img-fluid w-100"
                                        style="height: 400px; object-fit: cover;">
                                    <div
                                        class="image-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center opacity-0">
                                        <svg width="48" height="48" fill="white" viewBox="0 0 16 16">
                                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                            <path
                                                d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Thumbnail Images -->
                            @if (count($listing->images) > 1)
                                <div class="thumbnails">
                                    <h6 class="mb-3 text-primary fw-bold">
                                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16"
                                            class="me-2">
                                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                            <path
                                                d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                                        </svg>
                                        Gallery
                                    </h6>
                                    <div class="row">
                                        @foreach ($listing->images as $index => $image)
                                            <div class="col-3 mb-2">
                                                <div class="thumbnail-wrapper">
                                                    <img src="{{ asset('storage/' . $image) }}"
                                                        alt="{{ $listing->name }}"
                                                        class="img-fluid rounded-3 shadow-sm thumbnail-img {{ $index === 0 ? 'active' : '' }}"
                                                        style="height: 80px; object-fit: cover; cursor: pointer; width: 100%;"
                                                        onclick="changeMainImage('{{ asset('storage/' . $image) }}', this)">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="bg-gradient-light d-flex align-items-center justify-content-center rounded-4 shadow-lg"
                                style="height: 400px;">
                                <div class="text-center text-muted">
                                    <svg width="64" height="64" fill="currentColor" viewBox="0 0 16 16"
                                        class="mb-3">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                        <path
                                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                                    </svg>
                                    <p class="fw-semibold">No Image Available</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Details Section -->
                <div class="col-lg-6">
                    <!-- Header -->
                    <div class="mb-4">
                        <span
                            class="badge bg-gradient-{{ $listing->isDog() ? 'info' : 'success' }} text-white fs-6 px-3 py-2 mb-3">
                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                <path
                                    d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                            </svg>
                            {{ ucfirst($listing->type) }}
                        </span>
                        <h1 class="display-5 fw-bold mb-3 text-dark">{{ $listing->name }}</h1>
                        <h3 class="text-success mb-3 fw-bold fs-1">KES {{ number_format($listing->price, 2) }}</h3>

                        @if ($listing->location)
                            <div class="d-flex align-items-center text-muted mb-3">
                                <div class="bg-gradient-warning rounded-circle p-2 me-2">
                                    <svg width="16" height="16" fill="white" viewBox="0 0 16 16">
                                        <path
                                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                    </svg>
                                </div>
                                <span class="fw-semibold">{{ $listing->location }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <h5 class="text-primary fw-bold mb-3">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16"
                                class="me-2">
                                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5z" />
                                <path d="M9.5 3A1.5 1.5 0 0 0 8 4.5h2.5V3H9.5z" />
                            </svg>
                            Description
                        </h5>
                        <div class="description-content bg-gradient-light rounded-4 p-4 shadow-sm">
                            <p class="text-dark fs-5 lh-lg mb-0">{{ $listing->description }}</p>
                        </div>
                    </div>

                    <!-- Dog-specific Details -->
                    @if ($listing->isDog())
                        <div class="mb-4">
                            <h5 class="text-primary fw-bold mb-3">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16"
                                    class="me-2">
                                    <path
                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zM4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z" />
                                </svg>
                                Dog Information
                            </h5>
                            <div class="dog-info-grid bg-white rounded-4 p-4 shadow-lg">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="info-card bg-gradient-light rounded-3 p-3 mb-3">
                                            <table class="table table-borderless table-sm mb-0">
                                                <tr class="info-item">
                                                    <td><strong class="text-dark">Breed:</strong></td>
                                                    <td class="text-muted">{{ $listing->breed }}</td>
                                                </tr>
                                                <tr class="info-item">
                                                    <td><strong class="text-dark">Age:</strong></td>
                                                    <td class="text-muted">{{ $listing->age_display }}</td>
                                                </tr>
                                                <tr class="info-item">
                                                    <td><strong class="text-dark">Gender:</strong></td>
                                                    <td class="text-muted">{{ $listing->gender }}</td>
                                                </tr>
                                                <tr class="info-item">
                                                    <td><strong class="text-dark">Size:</strong></td>
                                                    <td class="text-muted">{{ $listing->size }}</td>
                                                </tr>
                                                <tr class="info-item">
                                                    <td><strong class="text-dark">Color:</strong></td>
                                                    <td class="text-muted">{{ $listing->color }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="info-card bg-gradient-light rounded-3 p-3 mb-3">
                                            <table class="table table-borderless table-sm mb-0">
                                                <tr class="info-item">
                                                    <td><strong class="text-dark">Vaccinated:</strong></td>
                                                    <td>
                                                        <span
                                                            class="badge bg-{{ $listing->vaccinated ? 'success' : 'danger' }}">
                                                            {{ $listing->vaccinated ? 'Yes' : 'No' }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr class="info-item">
                                                    <td><strong class="text-dark">Microchipped:</strong></td>
                                                    <td>
                                                        <span
                                                            class="badge bg-{{ $listing->microchipped ? 'success' : 'danger' }}">
                                                            {{ $listing->microchipped ? 'Yes' : 'No' }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr class="info-item">
                                                    <td><strong class="text-dark">Health:</strong></td>
                                                    <td class="text-muted">{{ $listing->health_status }}</td>
                                                </tr>
                                                @if ($listing->available_from)
                                                    <tr class="info-item">
                                                        <td><strong class="text-dark">Available:</strong></td>
                                                        <td class="text-muted">
                                                            {{ $listing->available_from->format('M d, Y') }}</td>
                                                    </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                @if ($listing->temperament)
                                    <div class="mt-3">
                                        <h6 class="text-primary fw-bold mb-3">Temperament</h6>
                                        <div class="temperament-card bg-gradient-info text-white rounded-3 p-3">
                                            <p class="mb-0 fw-semibold">{{ $listing->temperament }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Product-specific Details -->
                    @if ($listing->isProduct())
                        <div class="mb-4">
                            <h5 class="text-primary fw-bold mb-3">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16"
                                    class="me-2">
                                    <path
                                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                </svg>
                                Product Information
                            </h5>
                            <div class="product-info-grid bg-white rounded-4 p-4 shadow-lg">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="info-card bg-gradient-light rounded-3 p-3 mb-3">
                                            <table class="table table-borderless table-sm mb-0">
                                                <tr class="info-item">
                                                    <td><strong class="text-dark">Category:</strong></td>
                                                    <td class="text-muted">{{ $listing->category }}</td>
                                                </tr>
                                                @if ($listing->subcategory)
                                                    <tr class="info-item">
                                                        <td><strong class="text-dark">Subcategory:</strong></td>
                                                        <td class="text-muted">{{ $listing->subcategory }}</td>
                                                    </tr>
                                                @endif
                                                @if ($listing->brand)
                                                    <tr class="info-item">
                                                        <td><strong class="text-dark">Brand:</strong></td>
                                                        <td class="text-muted">{{ $listing->brand }}</td>
                                                    </tr>
                                                @endif
                                                @if ($listing->suitable_for)
                                                    <tr class="info-item">
                                                        <td><strong class="text-dark">Suitable For:</strong></td>
                                                        <td class="text-muted">{{ $listing->suitable_for }}</td>
                                                    </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="info-card bg-gradient-light rounded-3 p-3 mb-3">
                                            <table class="table table-borderless table-sm mb-0">
                                                <tr class="info-item">
                                                    <td><strong class="text-dark">Stock:</strong></td>
                                                    <td>
                                                        <span
                                                            class="badge bg-{{ $listing->stock_quantity > 0 ? 'success' : 'danger' }}">
                                                            {{ $listing->stock_quantity }} available
                                                        </span>
                                                    </td>
                                                </tr>
                                                @if ($listing->weight_or_size)
                                                    <tr class="info-item">
                                                        <td><strong class="text-dark">Weight/Size:</strong></td>
                                                        <td class="text-muted">{{ $listing->weight_or_size }}</td>
                                                    </tr>
                                                @endif
                                                @if ($listing->expiry_date)
                                                    <tr class="info-item">
                                                        <td><strong class="text-dark">Expiry Date:</strong></td>
                                                        <td class="text-muted">
                                                            {{ $listing->expiry_date->format('M d, Y') }}</td>
                                                    </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                @if ($listing->ingredients)
                                    <div class="mt-3">
                                        <h6 class="text-primary fw-bold mb-3">Ingredients</h6>
                                        <div class="ingredients-card bg-gradient-success text-white rounded-3 p-3">
                                            <p class="mb-0 fw-semibold">{{ $listing->ingredients }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Enhanced Contact Information -->
                    <div class="mb-4">
                        <h5 class="text-primary fw-bold mb-4">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16"
                                class="me-2">
                                <path
                                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122L9.98 10.72a.678.678 0 0 1-.122-.58L8.064 7.834a.678.678 0 0 0-1.015-.063z" />
                            </svg>
                            Contact Information
                        </h5>

                        <div class="contact-section bg-gradient-light rounded-4 p-4 shadow-lg border border-primary"
                            style="border-width: 2px !important; border-color: rgba(102, 126, 234, 0.2) !important;">
                            <div class="mb-4">
                                <h6 class="text-primary fw-bold mb-3">
                                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16"
                                        class="me-2">
                                        <path
                                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                    </svg>
                                    🛒 Interested in this {{ $listing->type }}?
                                </h6>
                                <p class="mb-4 text-muted fw-semibold">Please contact us for more information or to
                                    arrange a viewing.</p>
                            </div>

                            <!-- Order via WhatsApp -->
                            <div class="order-option bg-white rounded-3 p-3 mb-3 shadow-sm border-start border-success"
                                style="border-width: 4px !important;">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-gradient-success rounded-circle p-2 me-3">
                                            <svg width="20" height="20" fill="white" viewBox="0 0 16 16">
                                                <path
                                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.336-.445-.342-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-bold text-success">📱 Order via WhatsApp</h6>
                                            <small class="text-muted fw-semibold">Quick and easy ordering</small>
                                        </div>
                                    </div>
                                    <a href="https://wa.me/254743136920?text=Hi!%20I'm%20interested%20in%20ordering%20{{ urlencode($listing->name) }}%20-%20{{ urlencode($listing->type) }}%0A%0APrice:%20KES%20{{ number_format($listing->price, 2) }}%0ALocation:%20{{ urlencode($listing->location ?? 'N/A') }}%0A%0ACould%20you%20please%20provide%20more%20details%20about%20availability%20and%20delivery?"
                                        target="_blank" class="btn btn-gradient-success btn-sm fw-semibold px-4">
                                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                                            class="me-1">
                                            <path
                                                d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.336-.445-.342-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                        </svg>
                                        WhatsApp
                                    </a>
                                </div>
                            </div>

                            <!-- Order via Email -->
                            <div class="order-option bg-white rounded-3 p-3 mb-3 shadow-sm border-start border-primary"
                                style="border-width: 4px !important;">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-gradient-primary rounded-circle p-2 me-3">
                                            <svg width="20" height="20" fill="white" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-bold text-primary">📧 Order via Email</h6>
                                            <small class="text-muted fw-semibold">Detailed order inquiries</small>
                                        </div>
                                    </div>
                                    <a href="mailto:gibmarnel@gmail.com?subject=Inquiry%20about%20{{ urlencode($listing->name) }}&body=Hi!%0A%0AI%20am%20interested%20in%20{{ urlencode($listing->name) }}%20-%20{{ urlencode($listing->type) }}%0A%0APrice:%20KES%20{{ number_format($listing->price, 2) }}%0ALocation:%20{{ urlencode($listing->location ?? 'N/A') }}%0A%0APlease%20provide%20more%20details%20about%20availability%20and%20delivery.%0A%0AThank%20you!"
                                        class="btn btn-gradient-primary btn-sm fw-semibold px-4">
                                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                                            class="me-1">
                                            <path
                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                        </svg>
                                        Email
                                    </a>
                                </div>
                            </div>

                            <!-- Call Direct -->
                            <div class="order-option bg-white rounded-3 p-3 shadow-sm border-start border-warning"
                                style="border-width: 4px !important;">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-gradient-warning rounded-circle p-2 me-3">
                                            <svg width="20" height="20" fill="white" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122L9.98 10.72a.678.678 0 0 1-.122-.58L8.064 7.834a.678.678 0 0 0-1.015-.063z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-bold text-warning">📞 Call Us Direct</h6>
                                            <small class="text-muted fw-semibold">Speak to us directly</small>
                                        </div>
                                    </div>
                                    <a href="tel:+254743136920"
                                        class="btn btn-gradient-warning btn-sm fw-semibold px-4">
                                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                                            class="me-1">
                                            <path
                                                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122L9.98 10.72a.678.678 0 0 1-.122-.58L8.064 7.834a.678.678 0 0 0-1.015-.063z" />
                                        </svg>
                                        Call Now
                                    </a>
                                </div>
                            </div>

                            <!-- Contact Number Display -->
                            <div class="mt-4 text-center">
                                <div class="bg-white rounded-3 p-3 shadow-sm">
                                    <h6 class="mb-2 text-primary fw-bold">
                                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16"
                                            class="me-2">
                                            <path
                                                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122L9.98 10.72a.678.678 0 0 1-.122-.58L8.064 7.834a.678.678 0 0 0-1.015-.063z" />
                                        </svg>
                                        📱 Contact Number
                                    </h6>
                                    <p class="mb-0 fw-bold text-dark fs-5">+254 743 136920</p>
                                    <small class="text-muted">Available for calls, WhatsApp, and SMS</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Listings Section -->
    @if ($relatedListings->count() > 0)
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12">
                        <h3 class="text-center text-primary fw-bold">
                            <svg width="28" height="28" fill="currentColor" viewBox="0 0 16 16"
                                class="me-2">
                                <path
                                    d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z" />
                            </svg>
                            Related {{ ucfirst($listing->type) }}s
                        </h3>
                    </div>
                </div>

                <div class="row">
                    @foreach ($relatedListings as $related)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card h-100 shadow-lg border-0 product-card">
                                <div class="position-relative overflow-hidden" style="height: 200px;">
                                    @if ($related->first_image)
                                        <img src="{{ asset('storage/' . $related->first_image) }}"
                                            alt="{{ $related->name }}" class="card-img-top h-100 w-100"
                                            style="object-fit: cover;">
                                    @else
                                        <div
                                            class="bg-gradient-primary d-flex align-items-center justify-content-center h-100">
                                            <div class="text-center text-white">
                                                <svg width="48" height="48" fill="currentColor"
                                                    viewBox="0 0 16 16">
                                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                    <path
                                                        d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                                                </svg>
                                                <p class="mt-2 fw-bold fs-6">{{ ucfirst($related->type) }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="card-body">
                                    <h6 class="card-title fw-bold text-dark mb-3">{{ $related->name }}</h6>
                                    <p class="card-text text-muted small mb-3">
                                        {{ Str::limit($related->description, 60) }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-success fw-bold">KES
                                            {{ number_format($related->price, 2) }}</span>
                                        <a href="{{ route('shop.show', $related->slug) }}"
                                            class="btn btn-sm btn-gradient-primary fw-semibold">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Enhanced CSS Styles -->
    <style>
        /* Bright Modern Colors - Same as blog design */
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

        .btn-gradient-success {
            background: var(--success-gradient);
            border: none;
            color: white;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn-gradient-warning {
            background: var(--warning-gradient);
            border: none;
            color: white;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .product-card {
            transition: all 0.3s ease;
            border-radius: 15px;
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2) !important;
        }

        .card-title {
            transition: color 0.3s ease;
        }

        .product-card:hover .card-title {
            color: #667eea !important;
        }

        .thumbnail-img {
            border: 3px solid transparent;
            transition: all 0.3s ease;
        }

        .thumbnail-img.active,
        .thumbnail-img:hover {
            border-color: #667eea;
            transform: scale(1.05);
        }

        .image-container {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .image-container:hover {
            transform: scale(1.02);
        }

        .image-overlay {
            background: rgba(102, 126, 234, 0.3);
            transition: opacity 0.3s ease;
        }

        .image-container:hover .image-overlay {
            opacity: 1 !important;
        }

        .contact-section {
            border: 2px solid rgba(102, 126, 234, 0.1);
            transition: all 0.3s ease;
        }

        .contact-section:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15) !important;
        }

        .order-option {
            transition: all 0.3s ease;
        }

        .order-option:hover {
            transform: translateX(5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .info-card {
            transition: all 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .description-content {
            transition: all 0.3s ease;
        }

        .description-content:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
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

        .text-warning {
            color: #f093fb !important;
        }

        .rounded-4 {
            border-radius: 15px !important;
        }

        .rounded-3 {
            border-radius: 12px !important;
        }

        .shadow-lg {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
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

        /* Special button effects */
        .btn-gradient-success:hover {
            background: linear-gradient(135deg, #38ef7d 0%, #11998e 100%);
            transform: scale(1.05) translateY(-2px);
        }

        .btn-gradient-primary:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            transform: scale(1.05) translateY(-2px);
        }

        .btn-gradient-warning:hover {
            background: linear-gradient(135deg, #f5576c 0%, #f093fb 100%);
            transform: scale(1.05) translateY(-2px);
        }

        .card-img-top {
            transition: transform 0.3s ease;
        }

        .product-card:hover .card-img-top {
            transform: scale(1.05);
        }

        .info-item {
            transition: all 0.3s ease;
            padding: 5px;
            margin: -5px;
            border-radius: 8px;
        }

        .info-item:hover {
            background: rgba(102, 126, 234, 0.1);
            transform: translateX(3px);
        }

        .temperament-card,
        .ingredients-card {
            transition: all 0.3s ease;
        }

        .temperament-card:hover,
        .ingredients-card:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2) !important;
        }

        .thumbnail-wrapper {
            transition: all 0.3s ease;
        }

        .thumbnail-wrapper:hover {
            transform: translateY(-2px);
        }

        /* Mobile-specific styles */
        @media (max-width: 767.98px) {

            /* Adjust typography */
            h1.display-5 {
                font-size: 2rem !important;
            }

            h3.text-success {
                font-size: 1.5rem !important;
            }

            /* Image gallery adjustments */
            .main-image img {
                height: 300px !important;
            }

            .thumbnail-img {
                height: 60px !important;
            }

            /* Contact section adjustments */
            .contact-section {
                padding: 1.5rem !important;
            }

            .order-option {
                flex-direction: column !important;
                align-items: flex-start !important;
            }

            .order-option .btn {
                margin-top: 1rem;
                width: 100%;
            }

            /* Dog/Product info grids */
            .dog-info-grid .row>div,
            .product-info-grid .row>div {
                width: 100% !important;
                flex: 0 0 100% !important;
                max-width: 100% !important;
            }

            /* Reduce padding in cards */
            .info-card {
                padding: 1rem !important;
            }

            /* Related listings */
            .related-listings .col-lg-3 {
                flex: 0 0 100% !important;
                max-width: 100% !important;
            }
        }

        /* Tablet-specific adjustments */
        @media (min-width: 768px) and (max-width: 991.98px) {
            .main-image img {
                height: 350px !important;
            }

            .thumbnail-img {
                height: 70px !important;
            }

            /* Adjust info grids for tablet */
            .dog-info-grid .row>div,
            .product-info-grid .row>div {
                flex: 0 0 50% !important;
                max-width: 50% !important;
            }
        }
    </style>

    <!-- JavaScript for image gallery -->
    <script>
        function changeMainImage(imageSrc, thumbnail) {
            document.getElementById('mainImage').src = imageSrc;

            // Remove active class from all thumbnails
            document.querySelectorAll('.thumbnail-img').forEach(img => {
                img.classList.remove('active');
            });

            // Add active class to clicked thumbnail
            thumbnail.classList.add('active');
        }
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
