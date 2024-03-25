<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
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
                        <div class="flex-none mt-4">
                            @if ($item->getFirstMedia('item_image'))
                                <img src="{{ $item->getFirstMediaUrl('item_image') }}" alt="{{ $item->item_name }}"
                                    class="w-48 h-auto">
                            @endif
                        </div>
                        <div class="flex-grow space-y-2 ml-4">
                            <h3 class="text-xl font-bold">{{ $item->item_name }}
                                <p class="text-lg text-gray-600">{{ $item->description }}</p>
                                <p class="text-lg">Status: {{ $item->status }}
                                <div class="flex space-x-2 mt-4">
                                    <form method="POST" action="{{ route('item-status.close', $item) }}">
                                        @csrf
                                        <button type="submit"
                                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                            Close status </button>
                                    </form>
                                    <form method="POST" action="{{ route('item-status.reopen', $item) }}">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 border border-green-800 text-green-800 bg-green-200 font-bold rounded hover:bg-green-300 transition" style="background-color: rgb(2, 147, 2)">
                                            Re-open
                                        </button>
                                    </form>
                                </div>
                                <br>
                        </div>
                        <br>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
