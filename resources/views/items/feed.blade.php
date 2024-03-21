{{-- resources/views/feed.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feed') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Loop through the items and display them -->
            @foreach ($items as $item)
                <div class="mb-4 p-4 bg-white rounded-lg shadow">
                    @if ($item->getFirstMedia('item_image'))
                        <img src="{{ $item->getFirstMediaUrl('item_image') }}" alt="{{ $item->item_name }}" class="mb-3">
                    @endif
                    <h2 class="text-lg font-bold">{{ $item->item_name }}</h2>
                    <p>{{ $item->description }}</p>
                    <p>Status: {{ $item->status }}</p>
                    <!-- Request Button -->
                    <form action="{{ route('items.request', $item) }}" method="POST">
                        @csrf
                        @auth
                            <a href="{{ route('requests.create', ['item' => $item->id]) }}" class="button">Request/Lewech</a>
                        @endauth
                    </form>
                </div>
            @endforeach
        </div>
        {{ $items->links() }}
    </div>
</x-app-layout>
