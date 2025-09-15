<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Events</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

<div class="max-w-6xl mx-auto">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Events</h1>
        <a href="{{ route('create-events.create') }}"
           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow">
            + Create New Event
        </a>
    </div>

    {{-- Flash messages --}}
    @if(session('success'))
        <div class="mb-4 p-3 text-sm text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-4 p-3 text-sm text-red-700 bg-red-100 rounded">
            {{ session('error') }}
        </div>
    @endif

    {{-- Events list --}}
    @if($events->isEmpty())
        <div class="bg-white shadow rounded p-6 text-center">
            <p class="text-gray-600">No events yet. Click "Create New Event" above to add one.</p>
        </div>
    @else
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($events as $event)
                <div class="bg-white shadow rounded overflow-hidden flex flex-col">
                    @if($event->image_path)
                        <img src="{{ $event->image_path }}" class="h-40 w-full object-cover" alt="{{ $event->title }}">
                    @else
                        <div class="h-40 w-full bg-gray-200 flex items-center justify-center text-gray-400">
                            No image
                        </div>
                    @endif

                    <div class="p-4 flex-1 flex flex-col">
                        <h2 class="text-lg font-semibold mb-1">{{ $event->title }}</h2>
                        <p class="text-sm text-gray-600 mb-3">{{ \Illuminate\Support\Str::limit($event->description, 100) }}</p>
                        <p class="text-sm text-gray-700 mb-3">
                            <strong>Date:</strong> {{ \Carbon\Carbon::parse($event->start_time)->format('M j, Y g:ia') }}
                        </p>

                        <div class="mt-auto">
                            @if($event->is_public)
                                <span class="px-2 py-0.5 text-xs font-medium bg-green-100 text-green-800 rounded">Public</span>
                            @else
                                <span class="px-2 py-0.5 text-xs font-medium bg-yellow-100 text-yellow-800 rounded">Private</span>
                            @endif

                            @if($event->requires_verification)
                                <span class="px-2 py-0.5 text-xs font-medium bg-red-100 text-red-800 rounded ml-2">Verification required</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $events->links() }}
        </div>
    @endif
</div>
</body>
</html>
