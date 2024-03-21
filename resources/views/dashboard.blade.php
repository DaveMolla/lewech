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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
                {{-- make this fetch your posts --}}
            </div>
        </div>
    </div>
</x-app-layout>
