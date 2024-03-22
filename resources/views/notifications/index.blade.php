<x-app-layout>
    <x-slot name="header">
        <div class="flex space-x-4">
            <a href="{{ route('items.create') }}" class="px-4 py-2 bg-blue-500 text-black rounded hover:bg-blue-700 transition">
                Post Item
            </a>

            <a href="{{ route('requests.index') }}" class="px-4 py-2 bg-green-500 text-black rounded hover:bg-green-700 transition">
                My Requests
            </a>

            <a href="{{ route('notifications.index') }}" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700 transition">
                Notifications
            </a>
        </div>
    </x-slot>
    {{-- <x-slot name="header">
        Notifications
    </x-slot> --}}

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Item Requests
            </h3>
            <ul class="mt-5 space-y-4">
                @forelse ($notifications as $notification)
                    <li class="px-4 py-2 bg-gray-100 rounded-md">
                        {{ $notification->data['message'] }} from {{ $notification->data['sender_name'] }}
                    </li>
                @empty
                    <li>No new notifications.</li>
                @endforelse
            </ul>
        </div>
    </div>
</x-app-layout>
