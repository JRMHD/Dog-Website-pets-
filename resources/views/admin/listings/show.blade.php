@extends('layouts.app')

@section('content')
    <div
        style="background: linear-gradient(135deg, #F0F5F4 0%, #ffffff 50%, #5260DE 100%); min-height: 100vh; position: relative; overflow: hidden;">

        <div class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <!-- Header Section -->
                <div
                    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 32px; margin-bottom: 24px;">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                        <div>
                            <h2 style="font-size: 2rem; font-weight: 700; color: #374151; margin-bottom: 8px;">
                                <svg style="width: 32px; height: 32px; display: inline-block; margin-right: 12px; color: #5260DE;"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                                {{ $listing->name }}
                            </h2>
                            <p style="color: #6B7280; font-size: 1rem;">Listing Details & Information</p>
                        </div>
                        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                            <a href="{{ route('admin.listings.index') }}"
                                style="background-color: #F0F5F4; color: #374151; padding: 14px 28px; border-radius: 12px; font-weight: 600; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 8px; border: 2px solid #e5e7eb;"
                                onmouseover="this.style.backgroundColor='white'; this.style.borderColor='#5260DE'; this.style.color='#5260DE'; this.style.transform='translateY(-2px)'"
                                onmouseout="this.style.backgroundColor='#F0F5F4'; this.style.borderColor='#e5e7eb'; this.style.color='#374151'; this.style.transform='translateY(0)'">
                                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Back to Listings
                            </a>
                            <a href="{{ route('admin.listings.edit', $listing) }}"
                                style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white; padding: 14px 28px; border-radius: 12px; font-weight: 600; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(82, 96, 222, 0.3);"
                                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(82, 96, 222, 0.4)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(82, 96, 222, 0.3)'">
                                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                                Edit
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Messages -->
                @if (session('success'))
                    <div
                        style="background: linear-gradient(135deg, #10B981, #34D399); color: white; padding: 16px 20px; border-radius: 12px; margin-bottom: 24px; display: flex; align-items: center; gap: 12px; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);">
                        <svg style="width: 24px; height: 24px; flex-shrink: 0;" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Main Content -->
                    <div class="lg:col-span-2">
                        <!-- Images -->
                        @if ($listing->images && count($listing->images) > 0)
                            <div
                                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px; margin-bottom: 24px;">
                                <h3
                                    style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                                    <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Images
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    @foreach ($listing->images as $image)
                                        <div style="position: relative; overflow: hidden; border-radius: 12px; transition: all 0.3s ease;"
                                            onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.15)'"
                                            onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none'">
                                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $listing->name }}"
                                                style="width: 100%; height: 200px; object-fit: cover; border-radius: 12px; border: 2px solid #e5e7eb;">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Description -->
                        <div
                            style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px; margin-bottom: 24px;">
                            <h3
                                style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                                <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Description
                            </h3>
                            <p style="color: #6B7280; line-height: 1.6; margin: 0;">{{ $listing->description }}</p>
                        </div>

                        <!-- Dog-specific Information -->
                        @if ($listing->isDog())
                            <div
                                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; overflow: hidden; margin-bottom: 24px;">
                                <div
                                    style="background: linear-gradient(135deg, #06B6D4, #67E8F9); color: white; padding: 16px;">
                                    <h3
                                        style="font-size: 1.25rem; font-weight: 600; margin: 0; display: flex; align-items: center; gap: 8px;">
                                        <svg style="width: 20px; height: 20px;" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z" />
                                        </svg>
                                        Dog Information
                                    </h3>
                                </div>
                                <div style="padding: 24px;">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <div style="margin-bottom: 16px;">
                                                <span
                                                    style="font-weight: 600; color: #374151; display: inline-block; width: 120px;">Breed:</span>
                                                <span style="color: #6B7280;">{{ $listing->breed }}</span>
                                            </div>
                                            <div style="margin-bottom: 16px;">
                                                <span
                                                    style="font-weight: 600; color: #374151; display: inline-block; width: 120px;">Age:</span>
                                                <span style="color: #6B7280;">{{ $listing->age_display }}</span>
                                            </div>
                                            <div style="margin-bottom: 16px;">
                                                <span
                                                    style="font-weight: 600; color: #374151; display: inline-block; width: 120px;">Gender:</span>
                                                <span style="color: #6B7280;">{{ $listing->gender }}</span>
                                            </div>
                                            <div style="margin-bottom: 16px;">
                                                <span
                                                    style="font-weight: 600; color: #374151; display: inline-block; width: 120px;">Size:</span>
                                                <span style="color: #6B7280;">{{ $listing->size }}</span>
                                            </div>
                                            <div style="margin-bottom: 16px;">
                                                <span
                                                    style="font-weight: 600; color: #374151; display: inline-block; width: 120px;">Color:</span>
                                                <span style="color: #6B7280;">{{ $listing->color }}</span>
                                            </div>
                                        </div>
                                        <div>
                                            <div style="margin-bottom: 16px;">
                                                <span
                                                    style="font-weight: 600; color: #374151; display: inline-block; width: 120px;">Vaccinated:</span>
                                                <span
                                                    style="padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: linear-gradient(135deg, {{ $listing->vaccinated ? '#10B981, #34D399' : '#EF4444, #F87171' }}); color: white;">
                                                    {{ $listing->vaccinated ? 'Yes' : 'No' }}
                                                </span>
                                            </div>
                                            <div style="margin-bottom: 16px;">
                                                <span
                                                    style="font-weight: 600; color: #374151; display: inline-block; width: 120px;">Microchipped:</span>
                                                <span
                                                    style="padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: linear-gradient(135deg, {{ $listing->microchipped ? '#10B981, #34D399' : '#EF4444, #F87171' }}); color: white;">
                                                    {{ $listing->microchipped ? 'Yes' : 'No' }}
                                                </span>
                                            </div>
                                            <div style="margin-bottom: 16px;">
                                                <span
                                                    style="font-weight: 600; color: #374151; display: inline-block; width: 120px;">Health
                                                    Status:</span>
                                                <span style="color: #6B7280;">{{ $listing->health_status }}</span>
                                            </div>
                                            @if ($listing->available_from)
                                                <div style="margin-bottom: 16px;">
                                                    <span
                                                        style="font-weight: 600; color: #374151; display: inline-block; width: 120px;">Available
                                                        From:</span>
                                                    <span
                                                        style="color: #6B7280;">{{ $listing->available_from->format('F d, Y') }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    @if ($listing->temperament)
                                        <div style="border-top: 1px solid #e5e7eb; padding-top: 16px; margin-top: 16px;">
                                            <h4
                                                style="font-size: 1rem; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                                Temperament</h4>
                                            <p style="color: #6B7280; line-height: 1.6; margin: 0;">
                                                {{ $listing->temperament }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <!-- Product-specific Information -->
                        @if ($listing->isProduct())
                            <div
                                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; overflow: hidden; margin-bottom: 24px;">
                                <div
                                    style="background: linear-gradient(135deg, #10B981, #34D399); color: white; padding: 16px;">
                                    <h3
                                        style="font-size: 1.25rem; font-weight: 600; margin: 0; display: flex; align-items: center; gap: 8px;">
                                        <svg style="width: 20px; height: 20px;" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z" />
                                        </svg>
                                        Product Information
                                    </h3>
                                </div>
                                <div style="padding: 24px;">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <div style="margin-bottom: 16px;">
                                                <span
                                                    style="font-weight: 600; color: #374151; display: inline-block; width: 120px;">Category:</span>
                                                <span style="color: #6B7280;">{{ $listing->category }}</span>
                                            </div>
                                            @if ($listing->subcategory)
                                                <div style="margin-bottom: 16px;">
                                                    <span
                                                        style="font-weight: 600; color: #374151; display: inline-block; width: 120px;">Subcategory:</span>
                                                    <span style="color: #6B7280;">{{ $listing->subcategory }}</span>
                                                </div>
                                            @endif
                                            @if ($listing->brand)
                                                <div style="margin-bottom: 16px;">
                                                    <span
                                                        style="font-weight: 600; color: #374151; display: inline-block; width: 120px;">Brand:</span>
                                                    <span style="color: #6B7280;">{{ $listing->brand }}</span>
                                                </div>
                                            @endif
                                            @if ($listing->suitable_for)
                                                <div style="margin-bottom: 16px;">
                                                    <span
                                                        style="font-weight: 600; color: #374151; display: inline-block; width: 120px;">Suitable
                                                        For:</span>
                                                    <span style="color: #6B7280;">{{ $listing->suitable_for }}</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <div style="margin-bottom: 16px;">
                                                <span
                                                    style="font-weight: 600; color: #374151; display: inline-block; width: 120px;">Stock:</span>
                                                <span
                                                    style="padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: linear-gradient(135deg, {{ $listing->stock_quantity > 0 ? '#10B981, #34D399' : '#EF4444, #F87171' }}); color: white;">
                                                    {{ $listing->stock_quantity }}
                                                </span>
                                            </div>
                                            @if ($listing->weight_or_size)
                                                <div style="margin-bottom: 16px;">
                                                    <span
                                                        style="font-weight: 600; color: #374151; display: inline-block; width: 120px;">Weight/Size:</span>
                                                    <span style="color: #6B7280;">{{ $listing->weight_or_size }}</span>
                                                </div>
                                            @endif
                                            @if ($listing->expiry_date)
                                                <div style="margin-bottom: 16px;">
                                                    <span
                                                        style="font-weight: 600; color: #374151; display: inline-block; width: 120px;">Expiry
                                                        Date:</span>
                                                    <span
                                                        style="color: #6B7280;">{{ $listing->expiry_date->format('F d, Y') }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    @if ($listing->ingredients)
                                        <div style="border-top: 1px solid #e5e7eb; padding-top: 16px; margin-top: 16px;">
                                            <h4
                                                style="font-size: 1rem; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                                Ingredients</h4>
                                            <p style="color: #6B7280; line-height: 1.6; margin: 0;">
                                                {{ $listing->ingredients }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Sidebar -->
                    <div class="lg:col-span-1">
                        <!-- Status Card -->
                        <div
                            style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; overflow: hidden; margin-bottom: 24px;">
                            <div
                                style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white; padding: 16px;">
                                <h3
                                    style="font-size: 1.25rem; font-weight: 600; margin: 0; display: flex; align-items: center; gap: 8px;">
                                    <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Listing Status
                                </h3>
                            </div>
                            <div style="padding: 24px;">
                                <div
                                    style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                                    <span style="font-weight: 600; color: #374151;">Status:</span>
                                    <span
                                        style="padding: 6px 16px; border-radius: 20px; font-size: 14px; font-weight: 600; background: linear-gradient(135deg, {{ $listing->is_active ? '#10B981, #34D399' : '#EF4444, #F87171' }}); color: white;">
                                        {{ $listing->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>
                                <div
                                    style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                                    <span style="font-weight: 600; color: #374151;">Type:</span>
                                    <span
                                        style="padding: 6px 16px; border-radius: 20px; font-size: 14px; font-weight: 600; background: linear-gradient(135deg, {{ $listing->isDog() ? '#06B6D4, #67E8F9' : '#3B82F6, #60A5FA' }}); color: white;">
                                        {{ ucfirst($listing->type) }}
                                    </span>
                                </div>
                                <div
                                    style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                                    <span style="font-weight: 600; color: #374151;">Price:</span>
                                    <span style="font-weight: 700; color: #374151; font-size: 18px;">KES
                                        {{ number_format($listing->price, 2) }}</span>
                                </div>
                                @if ($listing->location)
                                    <div
                                        style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                                        <span style="font-weight: 600; color: #374151;">Location:</span>
                                        <span style="color: #6B7280;">{{ $listing->location }}</span>
                                    </div>
                                @endif
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span style="font-weight: 600; color: #374151;">Slug:</span>
                                    <span style="color: #9CA3AF; font-size: 14px;">{{ $listing->slug }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Meta Information -->
                        <div
                            style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; overflow: hidden; margin-bottom: 24px;">
                            <div
                                style="background: linear-gradient(135deg, #6B7280, #9CA3AF); color: white; padding: 16px;">
                                <h3
                                    style="font-size: 1.25rem; font-weight: 600; margin: 0; display: flex; align-items: center; gap: 8px;">
                                    <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Meta Information
                                </h3>
                            </div>
                            <div style="padding: 24px;">
                                <div
                                    style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                                    <span style="font-weight: 600; color: #374151;">Created:</span>
                                    <span
                                        style="color: #6B7280; font-size: 14px;">{{ $listing->created_at->format('F d, Y g:i A') }}</span>
                                </div>
                                <div
                                    style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                                    <span style="font-weight: 600; color: #374151;">Updated:</span>
                                    <span
                                        style="color: #6B7280; font-size: 14px;">{{ $listing->updated_at->format('F d, Y g:i A') }}</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span style="font-weight: 600; color: #374151;">Created by:</span>
                                    <span style="color: #6B7280; font-size: 14px;">{{ $listing->user->name }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div
                            style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; overflow: hidden;">
                            <div
                                style="background: linear-gradient(135deg, #F59E0B, #FBBF24); color: white; padding: 16px;">
                                <h3
                                    style="font-size: 1.25rem; font-weight: 600; margin: 0; display: flex; align-items: center; gap: 8px;">
                                    <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4">
                                        </path>
                                    </svg>
                                    Actions
                                </h3>
                            </div>
                            <div style="padding: 24px;">
                                <div style="display: flex; flex-direction: column; gap: 12px;">
                                    <a href="{{ route('admin.listings.edit', $listing) }}"
                                        style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white; padding: 12px 20px; border-radius: 12px; font-weight: 600; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center; justify-content: center; gap: 8px;"
                                        onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(82, 96, 222, 0.4)'"
                                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                        <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                        Edit Listing
                                    </a>
                                    <button type="button" onclick="showDeleteModal()"
                                        style="background: linear-gradient(135deg, #EF4444, #F87171); color: white; padding: 12px 20px; border-radius: 12px; font-weight: 600; border: none; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; justify-content: center; gap: 8px;"
                                        onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(239, 68, 68, 0.4)'"
                                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                        <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                        Delete Listing
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1050; align-items: center; justify-content: center;">
        <div
            style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; max-width: 500px; width: 90%; margin: 20px;">
            <div
                style="background: linear-gradient(135deg, #EF4444, #F87171); color: white; padding: 20px; border-radius: 16px 16px 0 0;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3
                        style="font-size: 1.25rem; font-weight: 600; margin: 0; display: flex; align-items: center; gap: 8px;">
                        <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z">
                            </path>
                        </svg>
                        Confirm Delete
                    </h3>
                    <button onclick="hideDeleteModal()"
                        style="background: none; border: none; color: white; font-size: 24px; cursor: pointer; padding: 0; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; border-radius: 50%; transition: all 0.3s ease;"
                        onmouseover="this.style.backgroundColor='rgba(255,255,255,0.2)'"
                        onmouseout="this.style.backgroundColor='transparent'">
                        ×
                    </button>
                </div>
            </div>
            <div style="padding: 24px;">
                <p style="color: #374151; font-size: 16px; margin-bottom: 8px;">Are you sure you want to delete this
                    listing?</p>
                <p style="color: #374151; font-weight: 600; font-size: 18px; margin-bottom: 8px;">{{ $listing->name }}</p>
                <p style="color: #9CA3AF; font-size: 14px; margin-bottom: 24px;">This action cannot be undone.</p>

                <div style="display: flex; gap: 12px; justify-content: flex-end;">
                    <button onclick="hideDeleteModal()"
                        style="background-color: #F0F5F4; color: #374151; padding: 12px 24px; border-radius: 12px; font-weight: 600; border: 2px solid #e5e7eb; cursor: pointer; transition: all 0.3s ease;"
                        onmouseover="this.style.backgroundColor='white'; this.style.borderColor='#5260DE'; this.style.color='#5260DE'"
                        onmouseout="this.style.backgroundColor='#F0F5F4'; this.style.borderColor='#e5e7eb'; this.style.color='#374151'">
                        Cancel
                    </button>
                    <form action="{{ route('admin.listings.destroy', $listing) }}" method="POST"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            style="background: linear-gradient(135deg, #EF4444, #F87171); color: white; padding: 12px 24px; border-radius: 12px; font-weight: 600; border: none; cursor: pointer; transition: all 0.3s ease;"
                            onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 20px rgba(239, 68, 68, 0.3)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Responsive grid classes */
        .grid {
            display: grid;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .gap-4 {
            gap: 1rem;
        }

        .gap-6 {
            gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1024px) {
            .lg\:grid-cols-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .lg\:col-span-1 {
                grid-column: span 1 / span 1;
            }

            .lg\:col-span-2 {
                grid-column: span 2 / span 2;
            }
        }

        /* Flexbox utilities */
        .flex {
            display: flex;
        }

        .flex-col {
            flex-direction: column;
        }

        .items-center {
            align-items: center;
        }

        .justify-between {
            justify-content: space-between;
        }

        @media (min-width: 640px) {
            .sm\:flex-row {
                flex-direction: row;
            }

            .sm\:justify-between {
                justify-content: space-between;
            }

            .sm\:items-center {
                align-items: center;
            }
        }

        /* Container utilities */
        .max-w-7xl {
            max-width: 80rem;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .py-12 {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        @media (min-width: 640px) {
            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
        }

        @media (min-width: 1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }
    </style>

    <script>
        function showDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function hideDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                hideDeleteModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                hideDeleteModal();
            }
        });
    </script>
@endsection
