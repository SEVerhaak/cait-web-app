<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex">

<!-- Sidebar -->
<x-sidebar />

<!-- Main Content -->
<div class="flex-1 p-6 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-6">Dashboard Overview</h1>

    <!-- Upcoming Events -->
    <section class="mb-8">
        <h2 class="text-xl font-semibold mb-4">Upcoming Events</h2>
        @if($events->isEmpty())
            <p>No upcoming events.</p>
        @else
            <ul class="bg-white shadow rounded p-4">
                @foreach($events as $event)
                    <li class="border-b last:border-b-0 p-2">
                        @foreach($event->getAttributes() as $column => $value)
                            <div>
                                <strong>{{ ucfirst($column) }}:</strong>
                                {{ $value }}
                            </div>
                        @endforeach
                    </li>
                @endforeach
            </ul>
        @endif
    </section>

    <!-- Users Table -->
    <section>
        <h2 class="text-xl font-semibold mb-4">Users</h2>
        <div class="overflow-x-auto bg-white shadow rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    @if($users->isNotEmpty())
                        @foreach($users->first()->getAttributes() as $column => $value)
                            @unless($column === 'password' or $column === 'remember_token' ) <!-- Skip password -->
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ ucfirst($column) }}
                            </th>
                            @endunless
                        @endforeach
                    @endif
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr>
                        @foreach($user->getAttributes() as $column => $value)
                            @unless($column === 'password' or $column === 'remember_token') <!-- Skip password -->
                            <td class="px-6 py-4 whitespace-nowrap">{{ $value }}</td>
                            @endunless
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>

</body>
</html>
