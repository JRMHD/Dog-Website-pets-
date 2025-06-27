@extends('layouts.app')

@section('content')
    <div
        style="background: linear-gradient(135deg, #F0F5F4 0%, #ffffff 50%, #5260DE 100%); min-height: 100vh; position: relative; overflow: hidden;">
        <!-- Floating Elements -->
        <div
            style="position: absolute; width: 120px; height: 120px; border-radius: 50%; background: linear-gradient(135deg, rgba(82, 96, 222, 0.1), rgba(255, 215, 0, 0.1)); top: 15%; left: 8%; animation: float 6s ease-in-out infinite;">
        </div>
        <div
            style="position: absolute; width: 180px; height: 180px; border-radius: 50%; background: linear-gradient(135deg, rgba(82, 96, 222, 0.1), rgba(255, 215, 0, 0.1)); top: 60%; right: 5%; animation: float 6s ease-in-out infinite; animation-delay: 2s;">
        </div>
        <div
            style="position: absolute; width: 90px; height: 90px; border-radius: 50%; background: linear-gradient(135deg, rgba(82, 96, 222, 0.1), rgba(255, 215, 0, 0.1)); bottom: 25%; left: 12%; animation: float 6s ease-in-out infinite; animation-delay: 4s;">
        </div>

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
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Blog Posts Management
                            </h2>
                            <p style="color: #6B7280; font-size: 1rem;">Create and manage your blog content with style</p>
                        </div>
                        <a href="{{ route('admin.blog-posts.create') }}"
                            style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white; padding: 14px 28px; border-radius: 12px; font-weight: 600; font-size: 16px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(82, 96, 222, 0.3);"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(82, 96, 222, 0.4)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(82, 96, 222, 0.3)'">
                            <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Create New Post
                        </a>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="grid grid-cols-2 lg:grid-cols-6 gap-4 mb-6">
                    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 20px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 32px 64px rgba(82, 96, 222, 0.25)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h3 style="font-size: 1.5rem; font-weight: 700; color: #374151; margin: 0;">
                                    {{ $totalPosts }}</h3>
                                <p style="color: #6B7280; font-size: 0.875rem; margin: 0;">Total Posts</p>
                            </div>
                            <div
                                style="width: 40px; height: 40px; border-radius: 12px; background: linear-gradient(135deg, #3B82F6, #60A5FA); display: flex; align-items: center; justify-content: center; color: white;">
                                <svg style="width: 20px; height: 20px;" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 20px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 32px 64px rgba(16, 185, 129, 0.25)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h3 style="font-size: 1.5rem; font-weight: 700; color: #374151; margin: 0;">
                                    {{ $publishedPosts }}</h3>
                                <p style="color: #6B7280; font-size: 0.875rem; margin: 0;">Published</p>
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

                    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 20px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 32px 64px rgba(245, 158, 11, 0.25)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h3 style="font-size: 1.5rem; font-weight: 700; color: #374151; margin: 0;">
                                    {{ $draftPosts }}</h3>
                                <p style="color: #6B7280; font-size: 0.875rem; margin: 0;">Drafts</p>
                            </div>
                            <div
                                style="width: 40px; height: 40px; border-radius: 12px; background: linear-gradient(135deg, #F59E0B, #FBBF24); display: flex; align-items: center; justify-content: center; color: white;">
                                <svg style="width: 20px; height: 20px;" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zm.5-5v1.5a.5.5 0 0 1-1 0V11a.5.5 0 0 1 1 0zm0 3a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 20px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 32px 64px rgba(59, 130, 246, 0.25)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h3 style="font-size: 1.5rem; font-weight: 700; color: #374151; margin: 0;">
                                    {{ number_format($totalViews) }}</h3>
                                <p style="color: #6B7280; font-size: 0.875rem; margin: 0;">Total Views</p>
                            </div>
                            <div
                                style="width: 40px; height: 40px; border-radius: 12px; background: linear-gradient(135deg, #3B82F6, #60A5FA); display: flex; align-items: center; justify-content: center; color: white;">
                                <svg style="width: 20px; height: 20px;" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 20px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 32px 64px rgba(107, 114, 128, 0.25)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h3 style="font-size: 1.5rem; font-weight: 700; color: #374151; margin: 0;">
                                    {{ number_format($averageViews) }}</h3>
                                <p style="color: #6B7280; font-size: 0.875rem; margin: 0;">Avg Views</p>
                            </div>
                            <div
                                style="width: 40px; height: 40px; border-radius: 12px; background: linear-gradient(135deg, #6B7280, #9CA3AF); display: flex; align-items: center; justify-content: center; color: white;">
                                <svg style="width: 20px; height: 20px;" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 20px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 32px 64px rgba(55, 65, 81, 0.25)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h3 style="font-size: 1.5rem; font-weight: 700; color: #374151; margin: 0;">
                                    {{ $posts->total() }}</h3>
                                <p style="color: #6B7280; font-size: 0.875rem; margin: 0;">Filtered</p>
                            </div>
                            <div
                                style="width: 40px; height: 40px; border-radius: 12px; background: linear-gradient(135deg, #374151, #6B7280); display: flex; align-items: center; justify-content: center; color: white;">
                                <svg style="width: 20px; height: 20px;" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </div>
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

                @if (session('error'))
                    <div
                        style="background: linear-gradient(135deg, #EF4444, #F87171); color: white; padding: 16px 20px; border-radius: 12px; margin-bottom: 24px; display: flex; align-items: center; gap: 12px; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);">
                        <svg style="width: 24px; height: 24px; flex-shrink: 0;" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Search and Filter Section -->
                <div
                    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px; margin-bottom: 24px;">
                    <form method="GET" action="{{ route('admin.blog-posts.index') }}">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-4">
                            <div class="lg:col-span-1">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Search by title, content, author..."
                                    style="width: 100%; background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                    onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                    onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <select name="category"
                                    style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                    onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                    onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                    <option value="all">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category }}"
                                            {{ request('category') == $category ? 'selected' : '' }}>
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>

                                <select name="status"
                                    style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                    onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                    onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                    <option value="">All Status</option>
                                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>
                                        Published</option>
                                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft
                                    </option>
                                </select>
                            </div>

                            <div class="flex gap-4">
                                <button type="submit"
                                    style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white; padding: 12px 24px; border-radius: 12px; font-weight: 600; border: none; cursor: pointer; transition: all 0.3s ease; flex: 1;"
                                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 20px rgba(82, 96, 222, 0.3)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                    Search
                                </button>

                                <a href="{{ route('admin.blog-posts.index') }}"
                                    style="background-color: #F0F5F4; color: #374151; padding: 12px 24px; border-radius: 12px; font-weight: 600; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center; justify-content: center; border: 2px solid #e5e7eb; flex: 1;"
                                    onmouseover="this.style.backgroundColor='white'; this.style.borderColor='#5260DE'; this.style.color='#5260DE'; this.style.transform='translateY(-1px)'"
                                    onmouseout="this.style.backgroundColor='#F0F5F4'; this.style.borderColor='#e5e7eb'; this.style.color='#374151'; this.style.transform='translateY(0)'">
                                    Clear
                                </a>
                            </div>
                        </div>

                        <!-- Additional Filters -->
                        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
                            <select name="author"
                                style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                <option value="all">All Authors</option>
                                @foreach ($authors as $author)
                                    <option value="{{ $author }}"
                                        {{ request('author') == $author ? 'selected' : '' }}>
                                        {{ $author }}
                                    </option>
                                @endforeach
                            </select>

                            <input type="date" name="date_from" value="{{ request('date_from') }}"
                                style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">

                            <input type="date" name="date_to" value="{{ request('date_to') }}"
                                style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">

                            <select name="per_page" onchange="this.form.submit()"
                                style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                                <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                            </select>
                        </div>
                    </form>
                </div>

                <!-- Bulk Actions Bar -->
                <div
                    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 20px; margin-bottom: 24px;">
                    <form id="bulkActionForm" method="POST" action="{{ route('admin.blog-posts.bulk-action') }}">
                        @csrf
                        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                                <select name="action"
                                    style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease; min-width: 160px;"
                                    onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                    onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                    <option value="">Bulk Actions</option>
                                    <option value="publish">Publish Selected</option>
                                    <option value="unpublish">Unpublish Selected</option>
                                    <option value="delete">Delete Selected</option>
                                </select>
                                <button type="submit"
                                    style="background: linear-gradient(135deg, #F59E0B, #FBBF24); color: white; padding: 12px 24px; border-radius: 12px; font-weight: 600; border: none; cursor: pointer; transition: all 0.3s ease;"
                                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 20px rgba(245, 158, 11, 0.3)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                    onclick="return confirmBulkAction()">
                                    Apply
                                </button>
                            </div>

                            <!-- Sort Options -->
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                                <span style="color: #6B7280; font-weight: 500;">Sort by:</span>
                                <form method="GET" action="{{ route('admin.blog-posts.index') }}" class="flex gap-2">
                                    @foreach (request()->except(['sort_by', 'sort_order']) as $key => $value)
                                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                    @endforeach
                                    <select name="sort_by" onchange="this.form.submit()"
                                        style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 8px 12px; font-size: 14px; transition: all 0.3s ease;"
                                        onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'"
                                        onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'">
                                        <option value="created_at"
                                            {{ request('sort_by', 'created_at') == 'created_at' ? 'selected' : '' }}>Date
                                            Created</option>
                                        <option value="updated_at"
                                            {{ request('sort_by') == 'updated_at' ? 'selected' : '' }}>Date Updated
                                        </option>
                                        <option value="title" {{ request('sort_by') == 'title' ? 'selected' : '' }}>Title
                                        </option>
                                        <option value="author" {{ request('sort_by') == 'author' ? 'selected' : '' }}>
                                            Author</option>
                                        <option value="views" {{ request('sort_by') == 'views' ? 'selected' : '' }}>Views
                                        </option>
                                    </select>
                                    <select name="sort_order" onchange="this.form.submit()"
                                        style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 8px 12px; font-size: 14px; transition: all 0.3s ease;"
                                        onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'"
                                        onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'">
                                        <option value="desc"
                                            {{ request('sort_order', 'desc') == 'desc' ? 'selected' : '' }}>Descending
                                        </option>
                                        <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>
                                            Ascending</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Posts Table -->
                <div
                    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; overflow: hidden;">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white;">
                                <tr>
                                    <th
                                        style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;">
                                        <input type="checkbox" id="selectAll"
                                            style="width: 16px; height: 16px; border-radius: 4px; border: 2px solid rgba(255,255,255,0.3); background-color: transparent;"
                                            onchange="toggleAllCheckboxes(this)">
                                    </th>
                                    <th
                                        style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;">
                                        Title</th>
                                    <th
                                        style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;">
                                        Category</th>
                                    <th
                                        style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;">
                                        Author</th>
                                    <th
                                        style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;">
                                        Views</th>
                                    <th
                                        style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;">
                                        Status</th>
                                    <th style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em; display: none;"
                                        class="hidden lg:table-cell">Created</th>
                                    <th
                                        style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody style="background: white;">
                                @forelse($posts as $post)
                                    <tr style="border-bottom: 1px solid #f3f4f6; transition: all 0.3s ease;"
                                        onmouseover="this.style.backgroundColor='#f9fafb'; this.style.transform='scale(1.01)'"
                                        onmouseout="this.style.backgroundColor='white'; this.style.transform='scale(1)'">
                                        <td style="padding: 16px;">
                                            <input type="checkbox" name="selected_posts[]" value="{{ $post->id }}"
                                                class="post-checkbox"
                                                style="width: 16px; height: 16px; border-radius: 4px; border: 2px solid #e5e7eb; accent-color: #5260DE;">
                                        </td>
                                        <td style="padding: 16px;">
                                            <div>
                                                <div
                                                    style="font-weight: 600; color: #374151; font-size: 14px; margin-bottom: 4px;">
                                                    {{ $post->title }}
                                                </div>
                                                <div style="color: #9CA3AF; font-size: 12px;">{{ $post->slug }}</div>
                                            </div>
                                        </td>
                                        <td style="padding: 16px;">
                                            <span
                                                style="padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: linear-gradient(135deg, #3B82F6, #60A5FA); color: white;">
                                                {{ $post->category }}
                                            </span>
                                        </td>
                                        <td style="padding: 16px; color: #6B7280; font-size: 14px;">{{ $post->author }}
                                        </td>
                                        <td style="padding: 16px;">
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
                                                    style="font-weight: 600; color: #374151;">{{ number_format($post->views) }}</span>
                                            </div>
                                        </td>
                                        <td style="padding: 16px;">
                                            @if ($post->is_published)
                                                <span
                                                    style="padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: linear-gradient(135deg, #10B981, #34D399); color: white;">
                                                    Published
                                                </span>
                                                @if ($post->published_at)
                                                    <div style="color: #9CA3AF; font-size: 11px; margin-top: 4px;">
                                                        {{ $post->published_at->format('M d, Y') }}</div>
                                                @endif
                                            @else
                                                <span
                                                    style="padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: linear-gradient(135deg, #F59E0B, #FBBF24); color: white;">
                                                    Draft
                                                </span>
                                            @endif
                                        </td>
                                        <td style="padding: 16px; color: #6B7280; font-size: 14px; display: none;"
                                            class="hidden lg:table-cell">
                                            {{ $post->created_at->format('M d, Y') }}
                                            @if ($post->created_at != $post->updated_at)
                                                <div style="color: #9CA3AF; font-size: 11px; margin-top: 4px;">Updated:
                                                    {{ $post->updated_at->format('M d, Y') }}</div>
                                            @endif
                                        </td>
                                        <td style="padding: 16px;">
                                            <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                                                <a href="{{ route('admin.blog-posts.show', $post) }}"
                                                    style="padding: 6px 12px; background: linear-gradient(135deg, #3B82F6, #60A5FA); color: white; border-radius: 8px; font-size: 12px; font-weight: 500; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 4px;"
                                                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(59, 130, 246, 0.3)'"
                                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                                    <svg style="width: 14px; height: 14px;" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                        </path>
                                                    </svg>
                                                    View
                                                </a>

                                                <a href="{{ route('admin.blog-posts.edit', $post) }}"
                                                    style="padding: 6px 12px; background: linear-gradient(135deg, #F59E0B, #FBBF24); color: white; border-radius: 8px; font-size: 12px; font-weight: 500; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 4px;"
                                                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(245, 158, 11, 0.3)'"
                                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                                    <svg style="width: 14px; height: 14px;" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                                    Edit
                                                </a>

                                                <form action="{{ route('admin.blog-posts.destroy', $post) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        style="padding: 6px 12px; background: linear-gradient(135deg, #EF4444, #F87171); color: white; border-radius: 8px; font-size: 12px; font-weight: 500; border: none; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 4px;"
                                                        onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(239, 68, 68, 0.3)'"
                                                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                                        onclick="return confirm('Are you sure you want to delete this blog post? This action cannot be undone.')">
                                                        <svg style="width: 14px; height: 14px;" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" style="padding: 48px; text-align: center; color: #6B7280;">
                                            <div
                                                style="display: flex; flex-direction: column; align-items: center; gap: 16px;">
                                                <svg style="width: 64px; height: 64px; color: #D1D5DB;" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                                <div>
                                                    @if (request()->hasAny(['search', 'category', 'status', 'author', 'date_from', 'date_to']))
                                                        <p
                                                            style="font-size: 18px; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                                            No blog posts found matching your criteria</p>
                                                        <p style="color: #6B7280; margin-bottom: 16px;">Try adjusting your
                                                            search filters or create a new post.</p>
                                                        <a href="{{ route('admin.blog-posts.index') }}"
                                                            style="background: linear-gradient(135deg, #6B7280, #9CA3AF); color: white; padding: 12px 24px; border-radius: 12px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; margin-right: 12px; transition: all 0.3s ease;"
                                                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(107, 114, 128, 0.4)'"
                                                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                                            Clear Filters
                                                        </a>
                                                    @else
                                                        <p
                                                            style="font-size: 18px; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                                            No blog posts found</p>
                                                        <p style="color: #6B7280; margin-bottom: 16px;">Get started by
                                                            creating your first blog post.</p>
                                                    @endif
                                                    <a href="{{ route('admin.blog-posts.create') }}"
                                                        style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white; padding: 12px 24px; border-radius: 12px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease;"
                                                        onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(82, 96, 222, 0.4)'"
                                                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                                        <svg style="width: 20px; height: 20px;" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                        </svg>
                                                        Create Your First Post
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($posts->hasPages())
                        <div style="padding: 24px; border-top: 1px solid #f3f4f6; background: #f9fafb;">
                            <div style="display: flex; justify-content: between; align-items: center;">
                                <div style="color: #6B7280; font-size: 14px;">
                                    Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of
                                    {{ $posts->total() }} results
                                </div>
                                <div>
                                    {{ $posts->links() }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
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

        .gap-4 {
            gap: 1rem;
        }

        @media (min-width: 1024px) {
            .lg\:grid-cols-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .lg\:grid-cols-4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .lg\:grid-cols-6 {
                grid-template-columns: repeat(6, minmax(0, 1fr));
            }

            .lg\:col-span-1 {
                grid-column: span 1 / span 1;
            }
        }

        /* Flexbox utilities */
        .flex {
            display: flex;
        }

        .flex-col {
            flex-direction: column;
        }

        .flex-wrap {
            flex-wrap: wrap;
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

        /* Table utilities */
        .min-w-full {
            min-width: 100%;
        }

        .overflow-x-auto {
            overflow-x: auto;
        }

        .table-cell {
            display: table-cell;
        }

        @media (min-width: 1024px) {
            .lg\:table-cell {
                display: table-cell;
            }
        }

        /* Hide/show utilities */
        .hidden {
            display: none;
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
        // Select all functionality
        function toggleAllCheckboxes(selectAllCheckbox) {
            const checkboxes = document.querySelectorAll('.post-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        }

        // Update select all when individual checkboxes change
        document.querySelectorAll('.post-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const allCheckboxes = document.querySelectorAll('.post-checkbox');
                const checkedCheckboxes = document.querySelectorAll('.post-checkbox:checked');
                const selectAllCheckbox = document.getElementById('selectAll');

                if (checkedCheckboxes.length === 0) {
                    selectAllCheckbox.checked = false;
                    selectAllCheckbox.indeterminate = false;
                } else if (checkedCheckboxes.length === allCheckboxes.length) {
                    selectAllCheckbox.checked = true;
                    selectAllCheckbox.indeterminate = false;
                } else {
                    selectAllCheckbox.checked = false;
                    selectAllCheckbox.indeterminate = true;
                }
            });
        });

        // Bulk action confirmation
        function confirmBulkAction() {
            const checkedBoxes = document.querySelectorAll('.post-checkbox:checked');
            const action = document.querySelector('select[name="action"]').value;

            if (checkedBoxes.length === 0) {
                alert('Please select at least one post.');
                return false;
            }

            if (action === '') {
                alert('Please select an action.');
                return false;
            }

            let message = '';
            switch (action) {
                case 'delete':
                    message =
                        `Are you sure you want to delete ${checkedBoxes.length} selected post(s)? This action cannot be undone.`;
                    break;
                case 'publish':
                    message = `Are you sure you want to publish ${checkedBoxes.length} selected post(s)?`;
                    break;
                case 'unpublish':
                    message = `Are you sure you want to unpublish ${checkedBoxes.length} selected post(s)?`;
                    break;
            }

            return confirm(message);
        }

        // Auto-submit search form on input change (with debounce)
        let searchTimeout;
        const searchInput = document.querySelector('input[name="search"]');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    if (this.value.length >= 3 || this.value.length === 0) {
                        this.form.submit();
                    }
                }, 500);
            });
        }
    </script>
@endsection
