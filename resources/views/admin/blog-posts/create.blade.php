@extends('layouts.app')

@section('content')
    <div style="background: linear-gradient(135deg, #F0F5F4 0%, #ffffff 50%, #5260DE 100%); min-height: 100vh;">
        <div class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <!-- Header Section -->
                <div
                    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 32px; margin-bottom: 24px;">
                    <div class="flex items-center gap-3">
                        <svg style="width: 32px; height: 32px; color: #5260DE;" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <div>
                            <h1 style="font-size: 2rem; font-weight: 700; color: #374151; margin: 0;">Create New Blog Post
                            </h1>
                            <p style="color: #6B7280; font-size: 1rem; margin: 0;">Share your thoughts with the world</p>
                        </div>
                    </div>
                </div>

                <!-- Form Section -->
                <form action="{{ route('admin.blog-posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Left Column - Main Content -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Title Section -->
                            <div
                                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px;">
                                <h3
                                    style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
                                    <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                        </path>
                                    </svg>
                                    Post Title
                                </h3>

                                <div>
                                    <label for="title"
                                        style="font-weight: 600; color: #374151; font-size: 14px; display: block; margin-bottom: 8px;">
                                        Title <span style="color: #EF4444;">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title') }}" required
                                        style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('title') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 14px 16px; font-size: 16px; transition: all 0.3s ease;"
                                        onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                        onblur="this.style.borderColor='{{ $errors->has('title') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'"
                                        placeholder="Enter your blog post title...">
                                    @error('title')
                                        <div
                                            style="color: #EF4444; font-size: 12px; margin-top: 6px; display: flex; align-items: center; gap: 4px;">
                                            <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <small style="color: #6B7280; font-size: 12px; margin-top: 6px; display: block;">
                                        The URL slug will be automatically generated from this title
                                    </small>
                                </div>
                            </div>

                            <!-- Content Section -->
                            <div
                                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px;">
                                <h3
                                    style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
                                    <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                    Content
                                </h3>

                                <div>
                                    <label for="description"
                                        style="font-weight: 600; color: #374151; font-size: 14px; display: block; margin-bottom: 8px;">
                                        Post Content <span style="color: #EF4444;">*</span>
                                    </label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        rows="12" required
                                        style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('description') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 14px 16px; font-size: 16px; transition: all 0.3s ease; resize: vertical; min-height: 300px;"
                                        onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                        onblur="this.style.borderColor='{{ $errors->has('description') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'"
                                        placeholder="Write your blog post content here...">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div
                                            style="color: #EF4444; font-size: 12px; margin-top: 6px; display: flex; align-items: center; gap: 4px;">
                                            <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Meta Description Section -->
                            <div
                                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px;">
                                <h3
                                    style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
                                    <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    SEO Settings
                                </h3>

                                <div>
                                    <label for="meta_description"
                                        style="font-weight: 600; color: #374151; font-size: 14px; display: block; margin-bottom: 8px;">
                                        Meta Description <span style="color: #EF4444;">*</span>
                                    </label>
                                    <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description"
                                        name="meta_description" rows="3" maxlength="300" required
                                        style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('meta_description') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 14px 16px; font-size: 16px; transition: all 0.3s ease; resize: vertical;"
                                        onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                        onblur="this.style.borderColor='{{ $errors->has('meta_description') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'"
                                        placeholder="Brief description of your post for search engines...">{{ old('meta_description') }}</textarea>
                                    @error('meta_description')
                                        <div
                                            style="color: #EF4444; font-size: 12px; margin-top: 6px; display: flex; align-items: center; gap: 4px;">
                                            <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div style="display: flex; justify-content: space-between; margin-top: 6px;">
                                        <small style="color: #6B7280; font-size: 12px;">
                                            160-300 characters for optimal SEO
                                        </small>
                                        <small id="metaCounter" style="color: #6B7280; font-size: 12px;">
                                            0/300
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Sidebar -->
                        <div class="space-y-6">
                            <!-- Category & Author -->
                            <div
                                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px;">
                                <h3
                                    style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
                                    <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                        </path>
                                    </svg>
                                    Classification
                                </h3>

                                <div class="space-y-4">
                                    <div>
                                        <label for="category"
                                            style="font-weight: 600; color: #374151; font-size: 14px; display: block; margin-bottom: 8px;">
                                            Category <span style="color: #EF4444;">*</span>
                                        </label>
                                        <select class="form-control @error('category') is-invalid @enderror"
                                            id="category" name="category" required
                                            style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('category') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 14px 16px; font-size: 16px; transition: all 0.3s ease;"
                                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                            onblur="this.style.borderColor='{{ $errors->has('category') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category }}"
                                                    {{ old('category') == $category ? 'selected' : '' }}>
                                                    {{ $category }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <div
                                                style="color: #EF4444; font-size: 12px; margin-top: 6px; display: flex; align-items: center; gap: 4px;">
                                                <svg style="width: 16px; height: 16px;" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                                </svg>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="author"
                                            style="font-weight: 600; color: #374151; font-size: 14px; display: block; margin-bottom: 8px;">
                                            Author <span style="color: #EF4444;">*</span>
                                        </label>
                                        <input type="text" class="form-control @error('author') is-invalid @enderror"
                                            id="author" name="author"
                                            value="{{ old('author', auth()->user()->name) }}" required
                                            style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('author') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 14px 16px; font-size: 16px; transition: all 0.3s ease;"
                                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                            onblur="this.style.borderColor='{{ $errors->has('author') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'"
                                            placeholder="Author name...">
                                        @error('author')
                                            <div
                                                style="color: #EF4444; font-size: 12px; margin-top: 6px; display: flex; align-items: center; gap: 4px;">
                                                <svg style="width: 16px; height: 16px;" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                                </svg>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Tags -->
                            <div
                                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px;">
                                <h3
                                    style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
                                    <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                        </path>
                                    </svg>
                                    Tags
                                </h3>

                                <div>
                                    <label for="tags"
                                        style="font-weight: 600; color: #374151; font-size: 14px; display: block; margin-bottom: 8px;">
                                        Tags (comma-separated)
                                    </label>
                                    <input type="text" class="form-control @error('tags') is-invalid @enderror"
                                        id="tags" name="tags" value="{{ old('tags') }}"
                                        style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('tags') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 14px 16px; font-size: 16px; transition: all 0.3s ease;"
                                        onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                        onblur="this.style.borderColor='{{ $errors->has('tags') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'"
                                        placeholder="puppy, training, leash">
                                    @error('tags')
                                        <div
                                            style="color: #EF4444; font-size: 12px; margin-top: 6px; display: flex; align-items: center; gap: 4px;">
                                            <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <small style="color: #6B7280; font-size: 12px; margin-top: 6px; display: block;">
                                        Separate tags with commas
                                    </small>
                                </div>
                            </div>

                            <!-- Images -->
                            <div
                                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px;">
                                <h3
                                    style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
                                    <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Images
                                </h3>

                                <div>
                                    <label for="images"
                                        style="font-weight: 600; color: #374151; font-size: 14px; display: block; margin-bottom: 8px;">
                                        Upload Images
                                    </label>
                                    <div style="border: 2px dashed {{ $errors->has('images.*') ? '#EF4444' : '#D1D5DB' }}; border-radius: 12px; padding: 24px; text-align: center; background-color: #f9fafb; transition: all 0.3s ease; cursor: pointer;"
                                        onclick="document.getElementById('images').click()"
                                        ondragover="event.preventDefault(); this.style.borderColor='#5260DE'; this.style.backgroundColor='rgba(82, 96, 222, 0.05)'"
                                        ondragleave="this.style.borderColor='{{ $errors->has('images.*') ? '#EF4444' : '#D1D5DB' }}'; this.style.backgroundColor='#f9fafb'"
                                        ondrop="event.preventDefault(); handleDrop(event)">
                                        <svg style="width: 48px; height: 48px; color: #9CA3AF; margin: 0 auto 12px;"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p style="color: #6B7280; margin: 0 0 8px;">Click to upload or drag and drop</p>
                                        <p style="color: #9CA3AF; font-size: 12px; margin: 0;">PNG, JPG, GIF up to 10MB
                                            each</p>
                                    </div>
                                    <input type="file" class="form-control @error('images.*') is-invalid @enderror"
                                        id="images" name="images[]" multiple accept="image/*" style="display: none;"
                                        onchange="previewImages(this)">
                                    @error('images.*')
                                        <div
                                            style="color: #EF4444; font-size: 12px; margin-top: 6px; display: flex; align-items: center; gap: 4px;">
                                            <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div id="imagePreview" style="margin-top: 16px; display: none;">
                                        <p style="font-weight: 600; color: #374151; font-size: 14px; margin-bottom: 8px;">
                                            Selected Images:</p>
                                        <div id="previewContainer"
                                            style="display: grid; grid-template-columns: repeat(auto-fill, minmax(80px, 1fr)); gap: 8px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Publish Settings -->
                            <div
                                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px;">
                                <h3
                                    style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
                                    <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Publish Settings
                                </h3>

                                <div>
                                    <label
                                        style="display: flex; align-items: center; gap: 12px; cursor: pointer; padding: 16px; background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); border-radius: 12px; border: 2px solid #e5e7eb; transition: all 0.3s ease;"
                                        onmouseover="this.style.borderColor='#5260DE'; this.style.backgroundColor='rgba(82, 96, 222, 0.05)'"
                                        onmouseout="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='white'">
                                        <input type="checkbox" id="is_published" name="is_published" value="1"
                                            {{ old('is_published') ? 'checked' : '' }}
                                            style="width: 20px; height: 20px; accent-color: #5260DE; cursor: pointer;">
                                        <div>
                                            <div style="font-weight: 600; color: #374151; font-size: 14px;">Publish
                                                immediately</div>
                                            <div style="color: #6B7280; font-size: 12px;">Make this post visible to the
                                                public right away</div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div
                        style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px; margin-top: 24px;">
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

                                <button type="submit"
                                    style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white; padding: 14px 28px; border-radius: 12px; font-weight: 600; border: none; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 8px; justify-content: center;"
                                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(82, 96, 222, 0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                    <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Create Post
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Grid utilities */
        .grid {
            display: grid;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .gap-6 {
            gap: 1.5rem;
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
        }

        /* Spacing utilities */
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

        /* Image preview styles */
        .image-preview-item {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            border: 2px solid #e5e7eb;
        }

        .image-preview-item img {
            width: 100%;
            height: 80px;
            object-fit: cover;
        }

        .image-preview-remove {
            position: absolute;
            top: 4px;
            right: 4px;
            background: rgba(239, 68, 68, 0.9);
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <script>
        // Meta description character counter
        document.addEventListener('DOMContentLoaded', function() {
            const metaTextarea = document.getElementById('meta_description');
            const counter = document.getElementById('metaCounter');

            if (metaTextarea && counter) {
                function updateCounter() {
                    const length = metaTextarea.value.length;
                    counter.textContent = `${length}/300`;

                    if (length > 300) {
                        counter.style.color = '#EF4444';
                    } else if (length > 250) {
                        counter.style.color = '#F59E0B';
                    } else {
                        counter.style.color = '#6B7280';
                    }
                }

                metaTextarea.addEventListener('input', updateCounter);
                updateCounter(); // Initial count
            }
        });

        // Image preview functionality
        function previewImages(input) {
            const previewDiv = document.getElementById('imagePreview');
            const container = document.getElementById('previewContainer');

            if (input.files && input.files.length > 0) {
                previewDiv.style.display = 'block';
                container.innerHTML = '';

                Array.from(input.files).forEach((file, index) => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const div = document.createElement('div');
                            div.className = 'image-preview-item';
                            div.innerHTML = `
                                <img src="${e.target.result}" alt="Preview ${index + 1}">
                                <button type="button" class="image-preview-remove" onclick="removeImage(${index})" title="Remove image">×</button>
                            `;
                            container.appendChild(div);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            } else {
                previewDiv.style.display = 'none';
            }
        }

        // Remove image from preview
        function removeImage(index) {
            const input = document.getElementById('images');
            const dt = new DataTransfer();

            Array.from(input.files).forEach((file, i) => {
                if (i !== index) {
                    dt.items.add(file);
                }
            });

            input.files = dt.files;
            previewImages(input);
        }

        // Drag and drop functionality
        function handleDrop(event) {
            event.preventDefault();
            const files = event.dataTransfer.files;
            const input = document.getElementById('images');
            input.files = files;
            previewImages(input);

            // Reset border color
            event.target.style.borderColor = '#D1D5DB';
            event.target.style.backgroundColor = '#f9fafb';
        }

        // Save as draft functionality
        function saveDraft() {
            const publishCheckbox = document.getElementById('is_published');
            publishCheckbox.checked = false;
            document.querySelector('form').submit();
        }
    </script>
@endsection
