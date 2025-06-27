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
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                                Edit Listing: {{ $listing->name }}
                            </h2>
                            <p style="color: #6B7280; font-size: 1rem;">Update your listing information</p>
                        </div>
                        <a href="{{ route('admin.listings.show', $listing) }}"
                            style="background-color: #F0F5F4; color: #374151; padding: 14px 28px; border-radius: 12px; font-weight: 600; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 8px; border: 2px solid #e5e7eb;"
                            onmouseover="this.style.backgroundColor='white'; this.style.borderColor='#5260DE'; this.style.color='#5260DE'; this.style.transform='translateY(-2px)'"
                            onmouseout="this.style.backgroundColor='#F0F5F4'; this.style.borderColor='#e5e7eb'; this.style.color='#374151'; this.style.transform='translateY(0)'">
                            <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to Listing
                        </a>
                    </div>
                </div>

                <!-- Form Card -->
                <div
                    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 32px;">
                    <form action="{{ route('admin.listings.update', $listing) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Listing Type & Status -->
                        <div style="margin-bottom: 32px;">
                            <h3
                                style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                                <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                    </path>
                                </svg>
                                Listing Type & Status
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="type"
                                        style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                        Listing Type <span style="color: #EF4444;">*</span>
                                    </label>
                                    <select id="type" name="type" required onchange="toggleFields()"
                                        style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('type') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                        onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                        onblur="this.style.borderColor='{{ $errors->has('type') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                        <option value="">Select listing type</option>
                                        <option value="dog"
                                            {{ old('type', $listing->type) === 'dog' ? 'selected' : '' }}>Dog for Sale
                                        </option>
                                        <option value="product"
                                            {{ old('type', $listing->type) === 'product' ? 'selected' : '' }}>Dog Product
                                        </option>
                                    </select>
                                    @error('type')
                                        <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="is_active"
                                        style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                        Status
                                    </label>
                                    <select id="is_active" name="is_active"
                                        style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('is_active') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                        onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                        onblur="this.style.borderColor='{{ $errors->has('is_active') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                        <option value="1"
                                            {{ old('is_active', $listing->is_active) ? 'selected' : '' }}>Active</option>
                                        <option value="0"
                                            {{ old('is_active', $listing->is_active) === false ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    @error('is_active')
                                        <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Basic Information -->
                        <div style="margin-bottom: 32px;">
                            <h3
                                style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                                <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                                Basic Information
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="name"
                                        style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                        Name <span style="color: #EF4444;">*</span>
                                    </label>
                                    <input type="text" id="name" name="name"
                                        value="{{ old('name', $listing->name) }}" required
                                        style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('name') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                        onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                        onblur="this.style.borderColor='{{ $errors->has('name') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                    @error('name')
                                        <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="price"
                                        style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                        Price (KES) <span style="color: #EF4444;">*</span>
                                    </label>
                                    <input type="number" step="0.01" min="0" id="price" name="price"
                                        value="{{ old('price', $listing->price) }}" required
                                        style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('price') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                        onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                        onblur="this.style.borderColor='{{ $errors->has('price') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                    @error('price')
                                        <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div style="margin-bottom: 16px;">
                                <label for="description"
                                    style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                    Description <span style="color: #EF4444;">*</span>
                                </label>
                                <textarea id="description" name="description" rows="4" required
                                    style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('description') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease; resize: vertical;"
                                    onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                    onblur="this.style.borderColor='{{ $errors->has('description') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">{{ old('description', $listing->description) }}</textarea>
                                @error('description')
                                    <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="location"
                                        style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                        Location
                                    </label>
                                    <input type="text" id="location" name="location"
                                        value="{{ old('location', $listing->location) }}"
                                        style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('location') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                        onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                        onblur="this.style.borderColor='{{ $errors->has('location') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                    @error('location')
                                        <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="images"
                                        style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                        New Images
                                    </label>
                                    <input type="file" id="images" name="images[]" multiple accept="image/*"
                                        style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('images.*') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                        onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                        onblur="this.style.borderColor='{{ $errors->has('images.*') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                    <div style="color: #6B7280; font-size: 14px; margin-top: 4px;">Upload new images to
                                        replace existing ones. Max 2MB per image.</div>
                                    @error('images.*')
                                        <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Current Images -->
                        @if ($listing->images && count($listing->images) > 0)
                            <div style="margin-bottom: 32px;">
                                <h3
                                    style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                                    <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Current Images
                                </h3>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                    @foreach ($listing->images as $image)
                                        <div style="position: relative; overflow: hidden; border-radius: 12px; transition: all 0.3s ease;"
                                            onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.15)'"
                                            onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none'">
                                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $listing->name }}"
                                                style="width: 100%; height: 120px; object-fit: cover; border-radius: 12px; border: 2px solid #e5e7eb;">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Dog-specific Fields -->
                        <div id="dog-fields" style="display: none; margin-bottom: 32px;">
                            <div style="border-top: 2px solid #e5e7eb; padding-top: 32px;">
                                <h3
                                    style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                                    <svg style="width: 20px; height: 20px; color: #06B6D4;" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z" />
                                    </svg>
                                    Dog Information
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label for="breed"
                                            style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                            Breed <span style="color: #EF4444;">*</span>
                                        </label>
                                        <input type="text" id="breed" name="breed"
                                            value="{{ old('breed', $listing->breed) }}"
                                            style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('breed') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                            onblur="this.style.borderColor='{{ $errors->has('breed') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                        @error('breed')
                                            <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="age_months"
                                            style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                            Age (months) <span style="color: #EF4444;">*</span>
                                        </label>
                                        <input type="number" min="1" id="age_months" name="age_months"
                                            value="{{ old('age_months', $listing->age_months) }}"
                                            style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('age_months') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                            onblur="this.style.borderColor='{{ $errors->has('age_months') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                        @error('age_months')
                                            <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                    <div>
                                        <label for="gender"
                                            style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                            Gender <span style="color: #EF4444;">*</span>
                                        </label>
                                        <select id="gender" name="gender"
                                            style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('gender') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                            onblur="this.style.borderColor='{{ $errors->has('gender') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                            <option value="">Select gender</option>
                                            <option value="Male"
                                                {{ old('gender', $listing->gender) === 'Male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="Female"
                                                {{ old('gender', $listing->gender) === 'Female' ? 'selected' : '' }}>Female
                                            </option>
                                        </select>
                                        @error('gender')
                                            <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="size"
                                            style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                            Size <span style="color: #EF4444;">*</span>
                                        </label>
                                        <select id="size" name="size"
                                            style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('size') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                            onblur="this.style.borderColor='{{ $errors->has('size') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                            <option value="">Select size</option>
                                            <option value="Small"
                                                {{ old('size', $listing->size) === 'Small' ? 'selected' : '' }}>Small
                                            </option>
                                            <option value="Medium"
                                                {{ old('size', $listing->size) === 'Medium' ? 'selected' : '' }}>Medium
                                            </option>
                                            <option value="Large"
                                                {{ old('size', $listing->size) === 'Large' ? 'selected' : '' }}>Large
                                            </option>
                                        </select>
                                        @error('size')
                                            <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="color"
                                            style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                            Color <span style="color: #EF4444;">*</span>
                                        </label>
                                        <input type="text" id="color" name="color"
                                            value="{{ old('color', $listing->color) }}"
                                            style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('color') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                            onblur="this.style.borderColor='{{ $errors->has('color') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                        @error('color')
                                            <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label for="health_status"
                                            style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                            Health Status <span style="color: #EF4444;">*</span>
                                        </label>
                                        <input type="text" id="health_status" name="health_status"
                                            value="{{ old('health_status', $listing->health_status) }}"
                                            placeholder="e.g., Healthy, Special Needs"
                                            style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('health_status') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                            onblur="this.style.borderColor='{{ $errors->has('health_status') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                        @error('health_status')
                                            <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="available_from"
                                            style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                            Available From
                                        </label>
                                        <input type="date" id="available_from" name="available_from"
                                            value="{{ old('available_from', $listing->available_from?->format('Y-m-d')) }}"
                                            style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('available_from') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                            onblur="this.style.borderColor='{{ $errors->has('available_from') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                        @error('available_from')
                                            <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div
                                        style="display: flex; align-items: center; gap: 12px; padding: 16px; background-color: #f9fafb; border-radius: 12px; border: 2px solid #e5e7eb;">
                                        <input type="checkbox" id="vaccinated" name="vaccinated" value="1"
                                            {{ old('vaccinated', $listing->vaccinated) ? 'checked' : '' }}
                                            style="width: 20px; height: 20px; accent-color: #5260DE; border-radius: 4px;">
                                        <label for="vaccinated"
                                            style="font-weight: 600; color: #374151; cursor: pointer;">
                                            Vaccinated
                                        </label>
                                        @error('vaccinated')
                                            <div style="color: #EF4444; font-size: 14px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div
                                        style="display: flex; align-items: center; gap: 12px; padding: 16px; background-color: #f9fafb; border-radius: 12px; border: 2px solid #e5e7eb;">
                                        <input type="checkbox" id="microchipped" name="microchipped" value="1"
                                            {{ old('microchipped', $listing->microchipped) ? 'checked' : '' }}
                                            style="width: 20px; height: 20px; accent-color: #5260DE; border-radius: 4px;">
                                        <label for="microchipped"
                                            style="font-weight: 600; color: #374151; cursor: pointer;">
                                            Microchipped
                                        </label>
                                        @error('microchipped')
                                            <div style="color: #EF4444; font-size: 14px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="temperament"
                                        style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                        Temperament
                                    </label>
                                    <textarea id="temperament" name="temperament" rows="3"
                                        placeholder="Describe the dog's behavior and personality"
                                        style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('temperament') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease; resize: vertical;"
                                        onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                        onblur="this.style.borderColor='{{ $errors->has('temperament') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">{{ old('temperament', $listing->temperament) }}</textarea>
                                    @error('temperament')
                                        <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Product-specific Fields -->
                        <div id="product-fields" style="display: none; margin-bottom: 32px;">
                            <div style="border-top: 2px solid #e5e7eb; padding-top: 32px;">
                                <h3
                                    style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                                    <svg style="width: 20px; height: 20px; color: #10B981;" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z" />
                                    </svg>
                                    Product Information
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label for="category"
                                            style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                            Category <span style="color: #EF4444;">*</span>
                                        </label>
                                        <select id="category" name="category"
                                            style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('category') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                            onblur="this.style.borderColor='{{ $errors->has('category') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                            <option value="">Select category</option>
                                            <option value="Food"
                                                {{ old('category', $listing->category) === 'Food' ? 'selected' : '' }}>Food
                                            </option>
                                            <option value="Toy"
                                                {{ old('category', $listing->category) === 'Toy' ? 'selected' : '' }}>Toy
                                            </option>
                                            <option value="Accessory"
                                                {{ old('category', $listing->category) === 'Accessory' ? 'selected' : '' }}>
                                                Accessory</option>
                                            <option value="Health"
                                                {{ old('category', $listing->category) === 'Health' ? 'selected' : '' }}>
                                                Health</option>
                                            <option value="Training"
                                                {{ old('category', $listing->category) === 'Training' ? 'selected' : '' }}>
                                                Training</option>
                                            <option value="Grooming"
                                                {{ old('category', $listing->category) === 'Grooming' ? 'selected' : '' }}>
                                                Grooming</option>
                                        </select>
                                        @error('category')
                                            <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="subcategory"
                                            style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                            Subcategory
                                        </label>
                                        <input type="text" id="subcategory" name="subcategory"
                                            value="{{ old('subcategory', $listing->subcategory) }}"
                                            placeholder="e.g., Puppy Food, Chew Toy"
                                            style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('subcategory') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                            onblur="this.style.borderColor='{{ $errors->has('subcategory') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                        @error('subcategory')
                                            <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label for="brand"
                                            style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                            Brand
                                        </label>
                                        <input type="text" id="brand" name="brand"
                                            value="{{ old('brand', $listing->brand) }}"
                                            style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('brand') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                            onblur="this.style.borderColor='{{ $errors->has('brand') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                        @error('brand')
                                            <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="suitable_for"
                                            style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                            Suitable For
                                        </label>
                                        <select id="suitable_for" name="suitable_for"
                                            style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('suitable_for') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                            onblur="this.style.borderColor='{{ $errors->has('suitable_for') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                            <option value="">Select age group</option>
                                            <option value="Puppy"
                                                {{ old('suitable_for', $listing->suitable_for) === 'Puppy' ? 'selected' : '' }}>
                                                Puppy</option>
                                            <option value="Adult Dog"
                                                {{ old('suitable_for', $listing->suitable_for) === 'Adult Dog' ? 'selected' : '' }}>
                                                Adult Dog</option>
                                            <option value="Senior Dog"
                                                {{ old('suitable_for', $listing->suitable_for) === 'Senior Dog' ? 'selected' : '' }}>
                                                Senior Dog</option>
                                            <option value="All Ages"
                                                {{ old('suitable_for', $listing->suitable_for) === 'All Ages' ? 'selected' : '' }}>
                                                All Ages</option>
                                        </select>
                                        @error('suitable_for')
                                            <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label for="stock_quantity"
                                            style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                            Stock Quantity <span style="color: #EF4444;">*</span>
                                        </label>
                                        <input type="number" min="0" id="stock_quantity" name="stock_quantity"
                                            value="{{ old('stock_quantity', $listing->stock_quantity) }}"
                                            style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('stock_quantity') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                            onblur="this.style.borderColor='{{ $errors->has('stock_quantity') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                        @error('stock_quantity')
                                            <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="weight_or_size"
                                            style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                            Weight/Size
                                        </label>
                                        <input type="text" id="weight_or_size" name="weight_or_size"
                                            value="{{ old('weight_or_size', $listing->weight_or_size) }}"
                                            placeholder="e.g., 2kg, Medium, 30cm"
                                            style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('weight_or_size') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                            onblur="this.style.borderColor='{{ $errors->has('weight_or_size') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                        @error('weight_or_size')
                                            <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label for="expiry_date"
                                            style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                            Expiry Date
                                        </label>
                                        <input type="date" id="expiry_date" name="expiry_date"
                                            value="{{ old('expiry_date', $listing->expiry_date?->format('Y-m-d')) }}"
                                            style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('expiry_date') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                            onblur="this.style.borderColor='{{ $errors->has('expiry_date') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                        <div style="color: #6B7280; font-size: 14px; margin-top: 4px;">Only required for
                                            perishable items</div>
                                        @error('expiry_date')
                                            <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="ingredients"
                                        style="display: block; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                        Ingredients
                                    </label>
                                    <textarea id="ingredients" name="ingredients" rows="3"
                                        placeholder="List ingredients (mainly for food products)"
                                        style="width: 100%; background-color: #f9fafb; border: 2px solid {{ $errors->has('ingredients') ? '#EF4444' : '#e5e7eb' }}; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease; resize: vertical;"
                                        onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                        onblur="this.style.borderColor='{{ $errors->has('ingredients') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">{{ old('ingredients', $listing->ingredients) }}</textarea>
                                    @error('ingredients')
                                        <div style="color: #EF4444; font-size: 14px; margin-top: 4px;">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div style="border-top: 2px solid #e5e7eb; padding-top: 32px;">
                            <div style="display: flex; justify-content: flex-end; gap: 12px; flex-wrap: wrap;">
                                <a href="{{ route('admin.listings.show', $listing) }}"
                                    style="background-color: #F0F5F4; color: #374151; padding: 12px 24px; border-radius: 12px; font-weight: 600; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 8px; border: 2px solid #e5e7eb;"
                                    onmouseover="this.style.backgroundColor='white'; this.style.borderColor='#5260DE'; this.style.color='#5260DE'; this.style.transform='translateY(-1px)'"
                                    onmouseout="this.style.backgroundColor='#F0F5F4'; this.style.borderColor='#e5e7eb'; this.style.color='#374151'; this.style.transform='translateY(0)'">
                                    Cancel
                                </a>
                                <button type="submit"
                                    style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white; padding: 12px 24px; border-radius: 12px; font-weight: 600; border: none; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 8px;"
                                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(82, 96, 222, 0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                        </path>
                                    </svg>
                                    Update Listing
                                </button>
                            </div>
                        </div>
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

        .grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .gap-4 {
            gap: 1rem;
        }

        @media (min-width: 768px) {
            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .md\:grid-cols-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .md\:grid-cols-4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
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

        /* Form specific styles */
        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
        }

        /* Checkbox styling */
        input[type="checkbox"] {
            appearance: none;
            background-color: white;
            border: 2px solid #e5e7eb;
            border-radius: 4px;
            width: 20px;
            height: 20px;
            position: relative;
            cursor: pointer;
        }

        input[type="checkbox"]:checked {
            background-color: #5260DE;
            border-color: #5260DE;
        }

        input[type="checkbox"]:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 14px;
            font-weight: bold;
        }
    </style>

    <script>
        function toggleFields() {
            const type = document.getElementById('type').value;
            const dogFields = document.getElementById('dog-fields');
            const productFields = document.getElementById('product-fields');

            if (type === 'dog') {
                dogFields.style.display = 'block';
                productFields.style.display = 'none';

                // Make dog fields required
                document.getElementById('breed').required = true;
                document.getElementById('age_months').required = true;
                document.getElementById('gender').required = true;
                document.getElementById('size').required = true;
                document.getElementById('color').required = true;
                document.getElementById('health_status').required = true;

                // Remove product field requirements
                document.getElementById('category').required = false;
                document.getElementById('stock_quantity').required = false;

            } else if (type === 'product') {
                dogFields.style.display = 'none';
                productFields.style.display = 'block';

                // Make product fields required
                document.getElementById('category').required = true;
                document.getElementById('stock_quantity').required = true;

                // Remove dog field requirements
                document.getElementById('breed').required = false;
                document.getElementById('age_months').required = false;
                document.getElementById('gender').required = false;
                document.getElementById('size').required = false;
                document.getElementById('color').required = false;
                document.getElementById('health_status').required = false;

            } else {
                dogFields.style.display = 'none';
                productFields.style.display = 'none';

                // Remove all requirements
                document.getElementById('breed').required = false;
                document.getElementById('age_months').required = false;
                document.getElementById('gender').required = false;
                document.getElementById('size').required = false;
                document.getElementById('color').required = false;
                document.getElementById('health_status').required = false;
                document.getElementById('category').required = false;
                document.getElementById('stock_quantity').required = false;
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            toggleFields();
        });
    </script>
@endsection
