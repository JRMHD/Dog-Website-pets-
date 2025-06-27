@extends('layouts.app')

@section('content')
    <div
        style="background: linear-gradient(135deg, #F0F5F4 0%, #ffffff 50%, #5260DE 100%); min-height: 100vh; position: relative; overflow: hidden;">
        <!-- Floating Elements -->
        <div
            style="position: absolute; width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(135deg, rgba(82, 96, 222, 0.1), rgba(255, 215, 0, 0.1)); top: 10%; left: 10%; animation: float 6s ease-in-out infinite;">
        </div>
        <div
            style="position: absolute; width: 150px; height: 150px; border-radius: 50%; background: linear-gradient(135deg, rgba(82, 96, 222, 0.1), rgba(255, 215, 0, 0.1)); top: 60%; right: 10%; animation: float 6s ease-in-out infinite; animation-delay: 2s;">
        </div>
        <div
            style="position: absolute; width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, rgba(82, 96, 222, 0.1), rgba(255, 215, 0, 0.1)); bottom: 20%; left: 15%; animation: float 6s ease-in-out infinite; animation-delay: 4s;">
        </div>

        <div class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <!-- Header Section -->
                <div
                    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 32px; margin-bottom: 24px;">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-4">
                                <svg style="width: 32px; height: 32px; color: #5260DE;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                <h1
                                    style="font-size: 1.875rem; font-weight: 700; color: #374151; margin: 0; line-height: 1.2;">
                                    {{ $blogPost->title }}
                                </h1>
                            </div>
                            <p style="color: #6B7280; font-size: 1rem; margin: 0;">View and manage blog post details</p>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-3">
                            @if ($blogPost->is_published)
                                <span
                                    style="padding: 8px 16px; border-radius: 20px; font-size: 14px; font-weight: 600; background: linear-gradient(135deg, #10B981, #34D399); color: white; display: inline-flex; align-items: center; gap: 6px;">
                                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Published
                                </span>
                            @else
                                <span
                                    style="padding: 8px 16px; border-radius: 20px; font-size: 14px; font-weight: 600; background: linear-gradient(135deg, #F59E0B, #FBBF24); color: white; display: inline-flex; align-items: center; gap: 6px;">
                                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Draft
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Post Details Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Left Column - Main Details -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Basic Information -->
                        <div
                            style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px;">
                            <h3
                                style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
                                <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Basic Information
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label
                                        style="font-weight: 600; color: #374151; font-size: 14px; display: block; margin-bottom: 6px;">Category</label>
                                    <span
                                        style="padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: linear-gradient(135deg, #3B82F6, #60A5FA); color: white;">
                                        {{ $blogPost->category }}
                                    </span>
                                </div>
                                <div>
                                    <label
                                        style="font-weight: 600; color: #374151; font-size: 14px; display: block; margin-bottom: 8px;">Author</label>
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <div
                                            style="width: 32px; height: 32px; border-radius: 50%; background: linear-gradient(135deg, #5260DE, #FFD700); display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 14px;">
                                            {{ strtoupper(substr($blogPost->author, 0, 1)) }}
                                        </div>
                                        <span style="color: #374151; font-weight: 500;">{{ $blogPost->author }}</span>
                                    </div>
                                </div>
                                <div>
                                    <label
                                        style="font-weight: 600; color: #374151; font-size: 14px; display: block; margin-bottom: 8px;">Slug</label>
                                    <code
                                        style="background-color: #f3f4f6; padding: 4px 8px; border-radius: 6px; font-size: 13px; color: #1f2937;">
                                        {{ $blogPost->slug }}
                                    </code>
                                </div>
                                <div>
                                    <label
                                        style="font-weight: 600; color: #374151; font-size: 14px; display: block; margin-bottom: 8px;">Created
                                        Date</label>
                                    <div style="display: flex; align-items: center; gap: 6px; color: #6B7280;">
                                        <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        {{ $blogPost->created_at->format('M d, Y H:i') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tags Section -->
                        @if ($blogPost->tags && count($blogPost->tags) > 0)
                            <div
                                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px;">
                                <h3
                                    style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                                    <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                        </path>
                                    </svg>
                                    Tags
                                </h3>
                                <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                                    @foreach ($blogPost->tags as $tag)
                                        <span
                                            style="padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: linear-gradient(135deg, #6B7280, #9CA3AF); color: white;">
                                            #{{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Meta Description -->
                        <div
                            style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px;">
                            <h3
                                style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                                <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Meta Description
                            </h3>
                            <p style="color: #6B7280; line-height: 1.6; margin: 0; font-size: 15px;">
                                {{ $blogPost->meta_description ?: 'No meta description provided.' }}
                            </p>
                        </div>

                        <!-- Content -->
                        <div
                            style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px;">
                            <h3
                                style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                                <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                                Content
                            </h3>
                            <div
                                style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); border: 2px solid #e9ecef; border-radius: 12px; padding: 20px; font-size: 15px; line-height: 1.7; color: #374151;">
                                {!! nl2br(e($blogPost->description)) !!}
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Sidebar -->
                    <div class="space-y-6">
                        <!-- Images Gallery -->
                        @if ($blogPost->images && count($blogPost->images) > 0)
                            <div
                                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px;">
                                <h3
                                    style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                                    <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Images ({{ count($blogPost->images) }})
                                </h3>
                                <div class="grid grid-cols-1 gap-4">
                                    @foreach ($blogPost->images as $index => $image)
                                        <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); transition: all 0.3s ease; cursor: pointer;"
                                            onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 25px rgba(0, 0, 0, 0.15)'"
                                            onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.1)'"
                                            onclick="openImageModal('{{ asset('storage/' . $image) }}', {{ $index }})">
                                            <img src="{{ asset('storage/' . $image) }}"
                                                alt="Blog Image {{ $index + 1 }}"
                                                style="width: 100%; height: auto; display: block;">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Statistics -->
                        <div
                            style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px;">
                            <h3
                                style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                                <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                    </path>
                                </svg>
                                Statistics
                            </h3>
                            <div class="space-y-4">
                                <div
                                    style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); border-radius: 8px;">
                                    <span style="color: #6B7280; font-weight: 500;">Views</span>
                                    <span
                                        style="color: #374151; font-weight: 600; font-size: 16px;">{{ number_format($blogPost->views ?? 0) }}</span>
                                </div>
                                <div
                                    style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); border-radius: 8px;">
                                    <span style="color: #6B7280; font-weight: 500;">Last Updated</span>
                                    <span
                                        style="color: #374151; font-weight: 600; font-size: 14px;">{{ $blogPost->updated_at->format('M d, Y') }}</span>
                                </div>
                                @if ($blogPost->published_at)
                                    <div
                                        style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); border-radius: 8px;">
                                        <span style="color: #6B7280; font-weight: 500;">Published</span>
                                        <span
                                            style="color: #374151; font-weight: 600; font-size: 14px;">{{ $blogPost->published_at->format('M d, Y') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div
                            style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px;">
                            <h3
                                style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                                <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Quick Actions
                            </h3>
                            <div class="space-y-3">
                                <a href="{{ route('admin.blog-posts.edit', $blogPost) }}"
                                    style="background: linear-gradient(135deg, #F59E0B, #FBBF24); color: white; padding: 12px 16px; border-radius: 12px; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 8px; transition: all 0.3s ease; width: 100%; justify-content: center;"
                                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(245, 158, 11, 0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                    Edit Post
                                </a>

                                @if (!$blogPost->is_published)
                                    <button
                                        style="background: linear-gradient(135deg, #10B981, #34D399); color: white; padding: 12px 16px; border-radius: 12px; font-weight: 600; border: none; cursor: pointer; display: flex; align-items: center; gap: 8px; transition: all 0.3s ease; width: 100%; justify-content: center;"
                                        onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(16, 185, 129, 0.4)'"
                                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                        <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                        </svg>
                                        Publish Post
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div
                    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px;">
                    <div class="flex flex-col sm:flex-row sm:justify-between gap-4">
                        <a href="{{ route('admin.blog-posts.index') }}"
                            style="background-color: #F0F5F4; color: #374151; padding: 14px 28px; border-radius: 12px; font-weight: 600; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center; justify-content: center; gap: 8px; border: 2px solid #e5e7eb;"
                            onmouseover="this.style.backgroundColor='white'; this.style.borderColor='#5260DE'; this.style.color='#5260DE'; this.style.transform='translateY(-2px)'"
                            onmouseout="this.style.backgroundColor='#F0F5F4'; this.style.borderColor='#e5e7eb'; this.style.color='#374151'; this.style.transform='translateY(0)'">
                            <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to List
                        </a>
                        <div class="flex flex-col sm:flex-row gap-3">
                            <a href="{{ route('admin.blog-posts.edit', $blogPost) }}"
                                style="background: linear-gradient(135deg, #F59E0B, #FBBF24); color: white; padding: 14px 28px; border-radius: 12px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; justify-content: center;"
                                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(245, 158, 11, 0.4)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                                Edit Post
                            </a>
                            <form action="{{ route('admin.blog-posts.destroy', $blogPost) }}" method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Are you sure you want to delete this post? This action cannot be undone.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    style="background: linear-gradient(135deg, #EF4444, #F87171); color: white; padding: 14px 28px; border-radius: 12px; font-weight: 600; border: none; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 8px; justify-content: center;"
                                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(239, 68, 68, 0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                    <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                    Delete Post
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.9); z-index: 1000; backdrop-filter: blur(10px);"
        onclick="closeImageModal()">
        <div
            style="position: relative; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; padding: 20px;">
            <button onclick="closeImageModal()"
                style="position: absolute; top: 20px; right: 20px; background: rgba(255, 255, 255, 0.2); border: none; color: white; font-size: 24px; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(10px);">
                ×
            </button>
            <img id="modalImage"
                style="max-width: 90%; max-height: 90%; object-fit: contain; border-radius: 12px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);"
                onclick="event.stopPropagation()">
        </div>
    </div>

    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        @media (max-width: 640px) {
            .floating-element {
                display: none;
            }
        }

        /* Grid utilities */
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

        .flex-1 {
            flex: 1 1 0%;
        }

        .items-center {
            align-items: center;
        }

        .items-start {
            align-items: flex-start;
        }

        .justify-between {
            justify-content: space-between;
        }

        .justify-center {
            justify-content: center;
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

            .sm\:items-start {
                align-items: flex-start;
            }
        }

        /* Spacing utilities */
        .space-y-3>*+* {
            margin-top: 0.75rem;
        }

        .space-y-4>*+* {
            margin-top: 1rem;
        }

        .space-y-6>*+* {
            margin-top: 1.5rem;
        }

        /* Container utilities */
        .max-w-6xl {
            max-width: 72rem;
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

        /* Image hover effects */
        .image-container {
            transition: all 0.3s ease;
        }

        .image-container:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        /* Responsive text */
        @media (max-width: 640px) {
            h1 {
                font-size: 1.5rem !important;
            }

            .action-buttons {
                flex-direction: column;
            }

            .action-buttons>* {
                width: 100%;
                text-align: center;
            }
        }
    </style>

    <script>
        function openImageModal(imageSrc, index) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');

            modalImage.src = imageSrc;
            modalImage.alt = `Blog Image ${index + 1}`;
            modal.style.display = 'block';

            // Prevent body scroll when modal is open
            document.body.style.overflow = 'hidden';
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.style.display = 'none';

            // Restore body scroll
            document.body.style.overflow = 'auto';
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeImageModal();
            }
        });

        // Smooth scroll to sections (if needed)
        document.addEventListener('DOMContentLoaded', function() {
            // Add any initialization code here
            console.log('Blog post view loaded');
        });
    </script>
@endsection
