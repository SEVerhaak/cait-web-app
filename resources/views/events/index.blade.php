@vite('resources/css/app.css')

@vite('resources/js/app.js')

<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Events</h1>
        <p class="text-sm text-gray-500">Browse upcoming events — click Sign up to register.</p>
    </div>

    @if($events->isEmpty())
        <div class="bg-white shadow rounded p-6 text-center">
            <p class="text-gray-600">No events found.</p>
        </div>
    @else
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($events as $event)
                @php
                    // choose an image: first event image (if relation exists) or image_path fallback
                    $image = $event->image_path ?? null;
                    // format start / end
                    $start = \Illuminate\Support\Carbon::parse($event->start_time)->format('M j, Y \a\t g:ia');
                    $timeRange = $start;
                    if (!empty($event->end_time)) {
                        $end = \Illuminate\Support\Carbon::parse($event->end_time)->format('g:ia');
                        $timeRange .= " — {$end}";
                    }
                @endphp

                <article class="bg-white shadow-sm rounded-lg overflow-hidden flex flex-col">
                    {{-- image --}}
                    @if($image)
                        <img src="{{ asset('storage/' . $image) }}" alt="{{ $event->title }}"
                             class="h-44 w-full object-cover">
                    @else
                        <div class="h-44 w-full bg-gray-100 flex items-center justify-center text-gray-400">
                            <span class="text-sm">No image</span>
                        </div>
                    @endif

                    <div class="p-4 flex-1 flex flex-col">
                        <h2 class="text-lg font-semibold mb-1">{{ $event->title }}</h2>

                        <p class="text-sm text-gray-600 mb-3">{{ \Illuminate\Support\Str::limit($event->description, 120) }}</p>

                        <div class="text-sm text-gray-700 mb-3">
                            <div><strong>Date & time:</strong> {{ $timeRange }}</div>
                            @if($event->location)
                                <div><strong>Location:</strong> {{ $event->location }}</div>
                            @endif
                            <div>
                                <strong>Price:</strong>
                                @if((float)$event->price > 0)
                                    €{{ number_format($event->price, 2) }}
                                @else
                                    Free
                                @endif
                            </div>
                            @if(!is_null($event->max_people))
                                <div><strong>Max people:</strong> {{ $event->max_people }}</div>
                            @endif
                        </div>

                        <div class="mt-auto flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                @if($event->is_public)
                                    <span class="px-2 py-0.5 text-xs font-medium bg-green-100 text-green-800 rounded">Public</span>
                                @else
                                    <span class="px-2 py-0.5 text-xs font-medium bg-yellow-100 text-yellow-800 rounded">Private</span>
                                @endif

                                @if($event->requires_verification)
                                    <span class="px-2 py-0.5 text-xs font-medium bg-red-100 text-red-800 rounded">Verification required</span>
                                @endif
                            </div>

                            {{-- Sign up button — routes to the create/signup page for the event --}}
                            <a href="{{ route('events.create', $event) }}"
                               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded shadow">
                                Sign up
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $events->links() }}
        </div>
    @endif
</div>
