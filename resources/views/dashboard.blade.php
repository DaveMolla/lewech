<x-app-layout>
    <x-slot name="header">
        <div class="flex space-x-4">
            <a href="{{ route('items.create') }}"
                class="px-4 py-2 bg-blue-500 text-black rounded hover:bg-blue-700 transition">
                Item Item
            </a>

            <a href="{{ route('requests.index') }}"
                class="px-4 py-2 bg-green-500 text-black rounded hover:bg-green-700 transition">
                My Requests
            </a>

            <a href="{{ route('notifications.index') }}"
                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700 transition">
                Notifications
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
                    My Items
                </h2>
                {{-- <ul>
                    @forelse ($items as $item)
                        <li class="mb-4 p-4 shadow rounded">

                            @if ($item->getFirstMedia('item_image'))
                                <img src="{{ $item->getFirstMediaUrl('item_image') }}" alt="{{ $item->item_name }}"
                                    class="mb-3">
                            @endif
                            <h2 class="text-lg font-bold">{{ $item->item_name }}</h2>
                            <p>{{ $item->description }}</p>
                            <p>Status: {{ $item->status }}</p>
                        </li>
                    @empty
                        <li>You haven't itemed any items yet.</li>
                    @endforelse
                </ul> --}}
                @foreach ($items as $item)
                    <div class="flex mb-4 shadow rounded">
                        <div class="flex-none">
                            @if ($item->getFirstMedia('item_image'))
                                <img src="{{ $item->getFirstMediaUrl('item_image') }}" alt="{{ $item->item_name }}"
                                    class="w-48 h-auto">
                            @endif
                        </div>
                        <div class="flex-grow space-y-2 ml-4">
                            <h3 class="text-xl font-bold">{{ $item->item_name }}
                            <p class="text-lg text-gray-600">{{ $item->description }}</p>
                            <p class="text-lg">Status: {{ $item->status }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
