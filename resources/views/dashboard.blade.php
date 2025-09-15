<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Info card --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                {{ __("You're logged in!") }}
            </div>

            {{-- Events user has signed up for --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Events You're Signed Up For</h3>

                @if($events->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400">You haven't signed up for any events yet.</p>
                @else
                    <ul class="space-y-4">
                        @foreach($events as $event)
                            <li class="border rounded p-4 flex flex-col sm:flex-row sm:justify-between items-start sm:items-center">
                                <div>
                                    <h4 class="font-semibold text-gray-800 dark:text-gray-200">{{ $event->title }}</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ \Illuminate\Support\Str::limit($event->description, 80) }}
                                    </p>
                                    <p class="text-sm text-gray-700 dark:text-gray-300 mt-1">
                                        <strong>Date:</strong> {{ $event->start_time->format('M j, Y g:ia') }}
                                    </p>
                                </div>

                                @if($event->image_path)
                                    <img src="{{ $event->image_path }}" alt="{{ $event->title }}"
                                         class="h-20 w-32 object-cover rounded mt-2 sm:mt-0">
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
