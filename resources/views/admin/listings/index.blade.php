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
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                                Listings Management
                            </h2>
                            <p style="color: #6B7280; font-size: 1rem;">Manage your dogs and products with style</p>
                        </div>
                        <a href="{{ route('admin.listings.create') }}"
                            style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white; padding: 14px 28px; border-radius: 12px; font-weight: 600; font-size: 16px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(82, 96, 222, 0.3);"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(82, 96, 222, 0.4)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(82, 96, 222, 0.3)'">
                            <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add New Listing
                        </a>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 20px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 32px 64px rgba(82, 96, 222, 0.25)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h3 style="font-size: 1.5rem; font-weight: 700; color: #374151; margin: 0;">
                                    {{ $listings->total() }}</h3>
                                <p style="color: #6B7280; font-size: 0.875rem; margin: 0;">Total Listings</p>
                            </div>
                            <div
                                style="width: 40px; height: 40px; border-radius: 12px; background: linear-gradient(135deg, #3B82F6, #60A5FA); display: flex; align-items: center; justify-content: center; color: white;">
                                <svg style="width: 20px; height: 20px;" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
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
                                    {{ $listings->where('type', 'dog')->count() }}</h3>
                                <p style="color: #6B7280; font-size: 0.875rem; margin: 0;">Dogs</p>
                            </div>
                            <div
                                style="width: 40px; height: 40px; border-radius: 12px; background: linear-gradient(135deg, #06B6D4, #67E8F9); display: flex; align-items: center; justify-content: center; color: white;">
                                <svg style="width: 20px; height: 20px;" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z" />
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
                                    {{ $listings->where('type', 'product')->count() }}</h3>
                                <p style="color: #6B7280; font-size: 0.875rem; margin: 0;">Products</p>
                            </div>
                            <div
                                style="width: 40px; height: 40px; border-radius: 12px; background: linear-gradient(135deg, #10B981, #34D399); display: flex; align-items: center; justify-content: center; color: white;">
                                <svg style="width: 20px; height: 20px;" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z" />
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
                                    {{ $listings->where('is_active', true)->count() }}</h3>
                                <p style="color: #6B7280; font-size: 0.875rem; margin: 0;">Active</p>
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

                <!-- Search and Filter Section -->
                <div
                    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px; margin-bottom: 24px;">
                    <form method="GET" action="{{ route('admin.listings.index') }}">
                        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
                            <div class="lg:col-span-2">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Search by name, breed, category..."
                                    style="width: 100%; background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                    onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                    onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                            </div>

                            <div>
                                <select name="type"
                                    style="width: 100%; background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                    onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                    onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                    <option value="">All Types</option>
                                    <option value="dog" {{ request('type') === 'dog' ? 'selected' : '' }}>Dogs</option>
                                    <option value="product" {{ request('type') === 'product' ? 'selected' : '' }}>Products
                                    </option>
                                </select>
                            </div>

                            <div class="flex gap-4">
                                <button type="submit"
                                    style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white; padding: 12px 24px; border-radius: 12px; font-weight: 600; border: none; cursor: pointer; transition: all 0.3s ease; flex: 1;"
                                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 20px rgba(82, 96, 222, 0.3)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                    Filter
                                </button>

                                <a href="{{ route('admin.listings.index') }}"
                                    style="background-color: #F0F5F4; color: #374151; padding: 12px 24px; border-radius: 12px; font-weight: 600; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center; justify-content: center; border: 2px solid #e5e7eb; flex: 1;"
                                    onmouseover="this.style.backgroundColor='white'; this.style.borderColor='#5260DE'; this.style.color='#5260DE'; this.style.transform='translateY(-1px)'"
                                    onmouseout="this.style.backgroundColor='#F0F5F4'; this.style.borderColor='#e5e7eb'; this.style.color='#374151'; this.style.transform='translateY(0)'">
                                    Clear
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Results Summary -->
                <div style="margin-bottom: 16px;">
                    <span style="color: #6B7280; font-size: 14px;">
                        Showing {{ $listings->firstItem() ?? 0 }}-{{ $listings->lastItem() ?? 0 }}
                        of {{ $listings->total() }} results
                    </span>
                </div>

                <!-- Listings Table -->
                <div
                    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; overflow: hidden;">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white;">
                                <tr>
                                    <th
                                        style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;">
                                        Image</th>
                                    <th
                                        style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;">
                                        Name</th>
                                    <th
                                        style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;">
                                        Type</th>
                                    <th
                                        style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;">
                                        Details</th>
                                    <th
                                        style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;">
                                        Price</th>
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
                                @forelse($listings as $listing)
                                    <tr style="border-bottom: 1px solid #f3f4f6; transition: all 0.3s ease;"
                                        onmouseover="this.style.backgroundColor='#f9fafb'; this.style.transform='scale(1.01)'"
                                        onmouseout="this.style.backgroundColor='white'; this.style.transform='scale(1)'">
                                        <td style="padding: 16px;">
                                            @if ($listing->first_image)
                                                <img src="{{ asset('storage/' . $listing->first_image) }}"
                                                    alt="{{ $listing->name }}"
                                                    style="width: 60px; height: 60px; object-fit: cover; border-radius: 12px; border: 2px solid #e5e7eb;">
                                            @else
                                                <div
                                                    style="width: 60px; height: 60px; background: linear-gradient(135deg, #F3F4F6, #E5E7EB); border-radius: 12px; display: flex; align-items: center; justify-content: center; border: 2px solid #e5e7eb;">
                                                    <svg style="width: 24px; height: 24px; color: #9CA3AF;" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            @endif
                                        </td>
                                        <td style="padding: 16px;">
                                            <div>
                                                <div
                                                    style="font-weight: 600; color: #374151; font-size: 14px; margin-bottom: 4px;">
                                                    {{ $listing->name }}
                                                </div>
                                                <div style="color: #9CA3AF; font-size: 12px;">
                                                    {{ Str::limit($listing->description, 50) }}</div>
                                            </div>
                                        </td>
                                        <td style="padding: 16px;">
                                            <span
                                                style="padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: linear-gradient(135deg, {{ $listing->isDog() ? '#06B6D4, #67E8F9' : '#10B981, #34D399' }}); color: white;">
                                                {{ ucfirst($listing->type) }}
                                            </span>
                                        </td>
                                        <td style="padding: 16px;">
                                            @if ($listing->isDog())
                                                <div style="font-size: 12px; color: #6B7280;">
                                                    <div style="margin-bottom: 2px;"><strong>Breed:</strong>
                                                        {{ $listing->breed }}</div>
                                                    <div style="margin-bottom: 2px;"><strong>Age:</strong>
                                                        {{ $listing->age_display }}</div>
                                                    <div><strong>Size:</strong> {{ $listing->size }}</div>
                                                </div>
                                            @else
                                                <div style="font-size: 12px; color: #6B7280;">
                                                    <div style="margin-bottom: 2px;"><strong>Category:</strong>
                                                        {{ $listing->category }}</div>
                                                    @if ($listing->brand)
                                                        <div style="margin-bottom: 2px;"><strong>Brand:</strong>
                                                            {{ $listing->brand }}</div>
                                                    @endif
                                                    <div><strong>Stock:</strong> {{ $listing->stock_quantity }}</div>
                                                </div>
                                            @endif
                                        </td>
                                        <td style="padding: 16px;">
                                            <div style="font-weight: 700; color: #374151; font-size: 16px;">
                                                KES {{ number_format($listing->price, 2) }}
                                            </div>
                                        </td>
                                        <td style="padding: 16px;">
                                            <span
                                                style="padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; background: linear-gradient(135deg, {{ $listing->is_active ? '#10B981, #34D399' : '#EF4444, #F87171' }}); color: white;">
                                                {{ $listing->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td style="padding: 16px; color: #6B7280; font-size: 14px; display: none;"
                                            class="hidden lg:table-cell">
                                            {{ $listing->created_at->format('M d, Y') }}
                                        </td>
                                        <td style="padding: 16px;">
                                            <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                                                <a href="{{ route('admin.listings.show', $listing) }}"
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

                                                <a href="{{ route('admin.listings.edit', $listing) }}"
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

                                                <form action="{{ route('admin.listings.destroy', $listing) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        style="padding: 6px 12px; background: linear-gradient(135deg, #EF4444, #F87171); color: white; border-radius: 8px; font-size: 12px; font-weight: 500; border: none; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 4px;"
                                                        onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(239, 68, 68, 0.3)'"
                                                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                                        onclick="return confirm('Are you sure you want to delete this listing? This action cannot be undone.')">
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
                                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                    </path>
                                                </svg>
                                                <div>
                                                    @if (request()->hasAny(['search', 'type']))
                                                        <p
                                                            style="font-size: 18px; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                                            No listings found matching your criteria</p>
                                                        <p style="color: #6B7280; margin-bottom: 16px;">Try adjusting your
                                                            search filters or create a new listing.</p>
                                                        <a href="{{ route('admin.listings.index') }}"
                                                            style="background: linear-gradient(135deg, #6B7280, #9CA3AF); color: white; padding: 12px 24px; border-radius: 12px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; margin-right: 12px; transition: all 0.3s ease;"
                                                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(107, 114, 128, 0.4)'"
                                                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                                            Clear Filters
                                                        </a>
                                                    @else
                                                        <p
                                                            style="font-size: 18px; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                                            No listings found</p>
                                                        <p style="color: #6B7280; margin-bottom: 16px;">Get started by
                                                            creating your first listing.</p>
                                                    @endif
                                                    <a href="{{ route('admin.listings.create') }}"
                                                        style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white; padding: 12px 24px; border-radius: 12px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease;"
                                                        onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(82, 96, 222, 0.4)'"
                                                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                                        <svg style="width: 20px; height: 20px;" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                        </svg>
                                                        Create Your First Listing
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
                    @if ($listings->hasPages())
                        <div style="padding: 24px; border-top: 1px solid #f3f4f6; background: #f9fafb;">
                            <div style="display: flex; justify-content: center; align-items: center;">
                                {{ $listings->links() }}
                            </div>
                        </div>
                    @endif
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

        .grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .gap-4 {
            gap: 1rem;
        }

        @media (min-width: 1024px) {
            .lg\:grid-cols-4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
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
@endsection
