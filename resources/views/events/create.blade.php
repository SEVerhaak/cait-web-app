<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up for {{ $event->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
<div class="max-w-md w-full bg-white rounded-lg shadow p-6">
    <h1 class="text-xl font-semibold mb-4">Sign up for {{ $event->title }}</h1>

    {{-- Flash messages --}}
    @if(session('error'))
        <div class="mb-4 p-3 text-sm text-red-700 bg-red-100 rounded">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="mb-4 p-3 text-sm text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('events.store', $event) }}" method="POST" class="space-y-4">
        @csrf

        <p class="text-gray-700"><strong>Date:</strong> {{ $event->start_time->format('M j, Y g:ia') }}</p>
        @if($event->location)
            <p class="text-gray-700"><strong>Location:</strong> {{ $event->location }}</p>
        @endif
        <p class="text-gray-700"><strong>Price:</strong>
            @if((float)$event->price > 0)
                €{{ number_format($event->price, 2) }}
            @else
                Free
            @endif
        </p>

        <button type="submit"
                class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded">
            Confirm Sign up
        </button>
    </form>

    <div class="mt-4 text-center">
        <a href="{{ route('events.index') }}" class="text-sm text-gray-500 hover:text-gray-700">Back to events</a>
    </div>
</div>
</body>
</html>
