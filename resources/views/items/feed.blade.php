{{-- resources/views/feed.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feed') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($items as $item)
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        @if ($item->getFirstMedia('item_image'))
                        <a href="{{ route('items.show', $item->id) }}" class="block overflow-hidden rounded-lg mb-4">
                            <img src="{{ $item->getFirstMediaUrl('item_image') }}" alt="{{ $item->item_name }}"
                                class="w-full h-auto object-cover">
                        </a>
                    @endif
                    <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $item->item_name }}</h2>
                    <p class="text-gray-600 mb-4">{{ $item->description }}</p>
                    <p class="text-sm text-gray-500 mb-4">Status: <span
                            class="font-semibold text-gray-700">{{ $item->status }}</span></p>
                            @auth
                            <a href="{{ route('requests.create', ['item' => $item->id]) }}"
                                class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition-colors duration-300">
                                Request/Lewech
                            </a>
                        @else
                            {{-- <a href="{{ route('login') }}?redirect={{ route('items.show', $item) }}"
                                class="inline-block px-6 py-2 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition-colors duration-300">
                                Login to Request
                            </a> --}}
                            <a href="{{ route('register') }}?redirect={{ route('items.show', $item) }}"
                                class="inline-block px-6 py-2 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition-colors duration-300">
                                Login/Register to Request
                            </a>
                        @endauth

                    </div>
                </div>
            @endforeach
        </div>
        {{ $items->links() }}
    </div>
</x-app-layout>
