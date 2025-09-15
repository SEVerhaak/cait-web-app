<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
<div class="max-w-lg w-full bg-white rounded-lg shadow p-6">
    <h1 class="text-xl font-semibold mb-4">Create Event</h1>

    <form action="{{ route('create-events.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="w-full mt-1 border-gray-300 rounded shadow-sm" required>
            @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" rows="3"
                      class="w-full mt-1 border-gray-300 rounded shadow-sm">{{ old('description') }}</textarea>
            @error('description') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Start Time</label>
                <input type="datetime-local" name="start_time" value="{{ old('start_time') }}"
                       class="w-full mt-1 border-gray-300 rounded shadow-sm" required>
                @error('start_time') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">End Time</label>
                <input type="datetime-local" name="end_time" value="{{ old('end_time') }}"
                       class="w-full mt-1 border-gray-300 rounded shadow-sm">
                @error('end_time') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Max People</label>
                <input type="number" name="max_people" value="{{ old('max_people') }}"
                       class="w-full mt-1 border-gray-300 rounded shadow-sm">
                @error('max_people') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Price (€)</label>
                <input type="number" step="0.01" name="price" value="{{ old('price', 0) }}"
                       class="w-full mt-1 border-gray-300 rounded shadow-sm">
                @error('price') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" name="location" value="{{ old('location') }}"
                   class="w-full mt-1 border-gray-300 rounded shadow-sm">
            @error('location') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Image URL</label>
            <input type="url" name="image_path" value="{{ old('image_path') }}"
                   class="w-full mt-1 border-gray-300 rounded shadow-sm">
            @error('image_path') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center gap-6">
            <label class="flex items-center">
                <input type="checkbox" name="is_public" value="1" {{ old('is_public') ? 'checked' : '' }}
                class="rounded border-gray-300">
                <span class="ml-2 text-sm text-gray-700">Public</span>
            </label>

            <label class="flex items-center">
                <input type="checkbox" name="requires_verification" value="1" {{ old('requires_verification') ? 'checked' : '' }}
                class="rounded border-gray-300">
                <span class="ml-2 text-sm text-gray-700">Requires Verification</span>
            </label>
        </div>

        <button type="submit"
                class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded">
            Save Event
        </button>
    </form>

    <div class="mt-4 text-center">
        <a href="{{ route('events.index') }}" class="text-sm text-gray-500 hover:text-gray-700">Back to events</a>
    </div>
</div>
</body>
</html>
