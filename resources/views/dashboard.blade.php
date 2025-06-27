@extends('layouts.app')

@section('content')
    <div
        style="background: linear-gradient(135deg, #F0F5F4 0%, #ffffff 50%, #5260DE 100%); min-height: 100vh; position: relative; overflow: hidden;">

        <div class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <!-- Header Section with Time Display -->
                <div
                    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 32px; margin-bottom: 24px;">
                    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">
                        <div>
                            <h1 style="font-size: 2.5rem; font-weight: 700; color: #374151; margin-bottom: 8px;">
                                <svg style="width: 40px; height: 40px; display: inline-block; margin-right: 12px; color: #5260DE;"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                    </path>
                                </svg>
                                Admin Dashboard
                            </h1>
                            <p style="color: #6B7280; font-size: 1.1rem;">Welcome back! Here's what's happening with your
                                platform</p>
                        </div>

                        <!-- Nairobi Time Display -->
                        <div
                            style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white; padding: 20px 24px; border-radius: 16px; text-align: center; box-shadow: 0 8px 25px rgba(82, 96, 222, 0.3);">
                            <div style="display: flex; align-items: center; gap: 12px; justify-content: center;">
                                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12,6 12,12 16,14"></polyline>
                                </svg>
                                <div>
                                    <div style="font-size: 14px; opacity: 0.9; margin-bottom: 4px;">Nairobi, Kenya</div>
                                    <div id="nairobi-time" style="font-size: 18px; font-weight: 700;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    <!-- Total Listings -->
                    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 32px 64px rgba(82, 96, 222, 0.25)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                            <div
                                style="width: 56px; height: 56px; border-radius: 16px; background: linear-gradient(135deg, #3B82F6, #60A5FA); display: flex; align-items: center; justify-content: center; color: white;">
                                <svg style="width: 28px; height: 28px;" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div style="text-align: right;">
                                <h3 style="font-size: 2.5rem; font-weight: 700; color: #374151; margin: 0; line-height: 1;">
                                    {{ $totalListings }}
                                </h3>
                                <p style="color: #6B7280; font-size: 0.875rem; margin: 4px 0 0 0; font-weight: 500;">Total
                                    Listings</p>
                            </div>
                        </div>
                        <div style="height: 2px; background: linear-gradient(90deg, #3B82F6, #60A5FA); border-radius: 1px;">
                        </div>
                    </div>

                    <!-- Active Listings -->
                    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 32px 64px rgba(16, 185, 129, 0.25)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                            <div
                                style="width: 56px; height: 56px; border-radius: 16px; background: linear-gradient(135deg, #10B981, #34D399); display: flex; align-items: center; justify-content: center; color: white;">
                                <svg style="width: 28px; height: 28px;" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg>
                            </div>
                            <div style="text-align: right;">
                                <h3 style="font-size: 2.5rem; font-weight: 700; color: #374151; margin: 0; line-height: 1;">
                                    {{ $activeListings }}
                                </h3>
                                <p style="color: #6B7280; font-size: 0.875rem; margin: 4px 0 0 0; font-weight: 500;">Active
                                    Listings</p>
                            </div>
                        </div>
                        <div style="height: 2px; background: linear-gradient(90deg, #10B981, #34D399); border-radius: 1px;">
                        </div>
                    </div>

                    <!-- Inactive Listings -->
                    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 32px 64px rgba(239, 68, 68, 0.25)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                            <div
                                style="width: 56px; height: 56px; border-radius: 16px; background: linear-gradient(135deg, #EF4444, #F87171); display: flex; align-items: center; justify-content: center; color: white;">
                                <svg style="width: 28px; height: 28px;" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.364 5.636L12 12.001l-6.364-6.365a9 9 0 1012.728 0z" />
                                </svg>
                            </div>
                            <div style="text-align: right;">
                                <h3 style="font-size: 2.5rem; font-weight: 700; color: #374151; margin: 0; line-height: 1;">
                                    {{ $inactiveListings }}
                                </h3>
                                <p style="color: #6B7280; font-size: 0.875rem; margin: 4px 0 0 0; font-weight: 500;">
                                    Inactive Listings</p>
                            </div>
                        </div>
                        <div style="height: 2px; background: linear-gradient(90deg, #EF4444, #F87171); border-radius: 1px;">
                        </div>
                    </div>
                </div>

                <!-- Secondary Statistics -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- Dog Listings -->
                    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 32px 64px rgba(6, 182, 212, 0.25)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                            <div
                                style="width: 56px; height: 56px; border-radius: 16px; background: linear-gradient(135deg, #06B6D4, #67E8F9); display: flex; align-items: center; justify-content: center; color: white;">
                                <svg style="width: 28px; height: 28px;" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z" />
                                </svg>
                            </div>
                            <div style="text-align: right;">
                                <h3 style="font-size: 2.5rem; font-weight: 700; color: #374151; margin: 0; line-height: 1;">
                                    {{ $dogListings }}
                                </h3>
                                <p style="color: #6B7280; font-size: 0.875rem; margin: 4px 0 0 0; font-weight: 500;">Dog
                                    Listings</p>
                            </div>
                        </div>
                        <div style="height: 2px; background: linear-gradient(90deg, #06B6D4, #67E8F9); border-radius: 1px;">
                        </div>
                    </div>

                    <!-- Product Listings -->
                    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 32px 64px rgba(139, 92, 246, 0.25)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                            <div
                                style="width: 56px; height: 56px; border-radius: 16px; background: linear-gradient(135deg, #8B5CF6, #A78BFA); display: flex; align-items: center; justify-content: center; color: white;">
                                <svg style="width: 28px; height: 28px;" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z" />
                                </svg>
                            </div>
                            <div style="text-align: right;">
                                <h3 style="font-size: 2.5rem; font-weight: 700; color: #374151; margin: 0; line-height: 1;">
                                    {{ $productListings }}
                                </h3>
                                <p style="color: #6B7280; font-size: 0.875rem; margin: 4px 0 0 0; font-weight: 500;">Product
                                    Listings</p>
                            </div>
                        </div>
                        <div style="height: 2px; background: linear-gradient(90deg, #8B5CF6, #A78BFA); border-radius: 1px;">
                        </div>
                    </div>
                </div>

                <!-- Blog Statistics -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
                    <!-- Total Posts -->
                    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 20px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 32px 64px rgba(59, 130, 246, 0.25)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h3 style="font-size: 1.75rem; font-weight: 700; color: #374151; margin: 0;">
                                    {{ $totalPosts }}
                                </h3>
                                <p style="color: #6B7280; font-size: 0.75rem; margin: 0; font-weight: 500;">Total Posts</p>
                            </div>
                            <div
                                style="width: 40px; height: 40px; border-radius: 12px; background: linear-gradient(135deg, #3B82F6, #60A5FA); display: flex; align-items: center; justify-content: center; color: white;">
                                <svg style="width: 20px; height: 20px;" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Published Posts -->
                    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 20px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 32px 64px rgba(16, 185, 129, 0.25)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h3 style="font-size: 1.75rem; font-weight: 700; color: #374151; margin: 0;">
                                    {{ $publishedPosts }}
                                </h3>
                                <p style="color: #6B7280; font-size: 0.75rem; margin: 0; font-weight: 500;">Published</p>
                            </div>
                            <div
                                style="width: 40px; height: 40px; border-radius: 12px; background: linear-gradient(135deg, #10B981, #34D399); display: flex; align-items: center; justify-content: center; color: white;">
                                <svg style="width: 20px; height: 20px;" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Draft Posts -->
                    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 20px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 32px 64px rgba(245, 158, 11, 0.25)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h3 style="font-size: 1.75rem; font-weight: 700; color: #374151; margin: 0;">
                                    {{ $draftPosts }}
                                </h3>
                                <p style="color: #6B7280; font-size: 0.75rem; margin: 0; font-weight: 500;">Drafts</p>
                            </div>
                            <div
                                style="width: 40px; height: 40px; border-radius: 12px; background: linear-gradient(135deg, #F59E0B, #FBBF24); display: flex; align-items: center; justify-content: center; color: white;">
                                <svg style="width: 20px; height: 20px;" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Total Views -->
                    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 20px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 32px 64px rgba(6, 182, 212, 0.25)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h3 style="font-size: 1.75rem; font-weight: 700; color: #374151; margin: 0;">
                                    {{ $totalViews }}
                                </h3>
                                <p style="color: #6B7280; font-size: 0.75rem; margin: 0; font-weight: 500;">Total Views</p>
                            </div>
                            <div
                                style="width: 40px; height: 40px; border-radius: 12px; background: linear-gradient(135deg, #06B6D4, #67E8F9); display: flex; align-items: center; justify-content: center; color: white;">
                                <svg style="width: 20px; height: 20px;" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Average Views -->
                    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 20px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 32px 64px rgba(139, 92, 246, 0.25)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h3 style="font-size: 1.75rem; font-weight: 700; color: #374151; margin: 0;">
                                    {{ $averageViews }}
                                </h3>
                                <p style="color: #6B7280; font-size: 0.75rem; margin: 0; font-weight: 500;">Avg Views</p>
                            </div>
                            <div
                                style="width: 40px; height: 40px; border-radius: 12px; background: linear-gradient(135deg, #8B5CF6, #A78BFA); display: flex; align-items: center; justify-content: center; color: white;">
                                <svg style="width: 20px; height: 20px;" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Featured Content -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    @if ($mostViewedPost)
                        <!-- Most Viewed Post -->
                        <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 28px; transition: all 0.3s ease;"
                            onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 32px 64px rgba(82, 96, 222, 0.25)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                            <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 20px;">
                                <div
                                    style="width: 48px; height: 48px; border-radius: 12px; background: linear-gradient(135deg, #5260DE, #FFD700); display: flex; align-items: center; justify-content: center; color: white;">
                                    <svg style="width: 24px; height: 24px;" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 style="font-size: 1.25rem; font-weight: 700; color: #374151; margin: 0;">Most
                                        Viewed Post</h3>
                                    <p style="color: #6B7280; font-size: 0.875rem; margin: 0;">Top performing content</p>
                                </div>
                            </div>
                            <div style="margin-bottom: 16px;">
                                <h4
                                    style="font-size: 1.1rem; font-weight: 600; color: #374151; margin: 0 0 8px 0; line-height: 1.4;">
                                    {{ $mostViewedPost->title }}
                                </h4>
                                <p style="color: #6B7280; font-size: 0.875rem; margin: 0 0 12px 0;">
                                    {{ Str::limit($mostViewedPost->excerpt, 120) }}
                                </p>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <svg style="width: 16px; height: 16px; color: #6B7280;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                    <span
                                        style="color: #6B7280; font-size: 0.875rem; font-weight: 500;">{{ $mostViewedPost->views }}
                                        views</span>
                                </div>
                                <a href="{{ url('/admin/blog-posts') }}"
                                    style="color: #5260DE; font-size: 0.875rem; font-weight: 600; text-decoration: none; transition: all 0.3s ease;"
                                    onmouseover="this.style.color='#3B82F6'" onmouseout="this.style.color='#5260DE'">
                                    View Post →
                                </a>
                            </div>
                        </div>
                    @endif

                    @if ($latestListing)
                        <!-- Latest Listing -->
                        <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 28px; transition: all 0.3s ease;"
                            onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 32px 64px rgba(82, 96, 222, 0.25)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                            <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 20px;">
                                <div
                                    style="width: 48px; height: 48px; border-radius: 12px; background: linear-gradient(135deg, #5260DE, #FFD700); display: flex; align-items: center; justify-content: center; color: white;">
                                    <svg style="width: 24px; height: 24px;" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.32c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 style="font-size: 1.25rem; font-weight: 700; color: #374151; margin: 0;">Latest
                                        Listing</h3>
                                    <p style="color: #6B7280; font-size: 0.875rem; margin: 0;">Most recently added item</p>
                                </div>
                            </div>
                            <div style="margin-bottom: 16px;">
                                <h4
                                    style="font-size: 1.1rem; font-weight: 600; color: #374151; margin: 0 0 8px 0; line-height: 1.4;">
                                    {{ $latestListing->name }}
                                </h4>
                                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
                                    <span
                                        style="padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: linear-gradient(135deg, {{ $latestListing->isDog() ? '#06B6D4, #67E8F9' : '#10B981, #34D399' }}); color: white;">
                                        {{ ucfirst($latestListing->type) }}
                                    </span>
                                    <span
                                        style="padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: linear-gradient(135deg, {{ $latestListing->is_active ? '#10B981, #34D399' : '#EF4444, #F87171' }}); color: white;">
                                        {{ $latestListing->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>
                                <p style="color: #6B7280; font-size: 0.875rem; margin: 0 0 12px 0;">
                                    {{ Str::limit($latestListing->description, 120) }}
                                </p>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <svg style="width: 16px; height: 16px; color: #6B7280;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span
                                        style="color: #6B7280; font-size: 0.875rem; font-weight: 500;">{{ $latestListing->created_at->format('M d, Y') }}</span>
                                </div>
                                <a href="{{ route('admin.listings.show', $latestListing) }}"
                                    style="color: #5260DE; font-size: 0.875rem; font-weight: 600; text-decoration: none; transition: all 0.3s ease;"
                                    onmouseover="this.style.color='#3B82F6'" onmouseout="this.style.color='#5260DE'">
                                    View Listing →
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        // Nairobi time display
        function updateNairobiTime() {
            const options = {
                timeZone: 'Africa/Nairobi',
                hour12: true,
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric',
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const nairobiTime = new Date().toLocaleString('en-US', options);
            document.getElementById('nairobi-time').textContent = nairobiTime;
        }

        // Update time immediately and then every second
        updateNairobiTime();
        setInterval(updateNairobiTime, 1000);
    </script>

    <style>
        /* Responsive grid classes */
        .grid {
            display: grid;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .grid-cols-5 {
            grid-template-columns: repeat(5, minmax(0, 1fr));
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
            .lg\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .lg\:grid-cols-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .lg\:grid-cols-5 {
                grid-template-columns: repeat(5, minmax(0, 1fr));
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

        @media (min-width: 1024px) {
            .lg\:flex-row {
                flex-direction: row;
            }

            .lg\:justify-between {
                justify-content: space-between;
            }

            .lg\:items-center {
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

        /* Margin utilities */
        .mb-8 {
            margin-bottom: 2rem;
        }
    </style>
@endsection
