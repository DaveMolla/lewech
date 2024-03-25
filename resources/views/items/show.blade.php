<x-app-layout>
    <x-slot name="header">
        {{ $item->item_name }}
    </x-slot>

    <div>
        {{-- <div class="mb-4">
            @if ($item->getFirstMedia('item_image'))
                <img src="{{ $item->getFirstMediaUrl('item_image') }}" alt="{{ $item->item_name }}" class="w-full h-auto">
            @endif
            <div>
                <h3>{{ $item->item_name }}</h3>
                <p>{{ $item->description }}</p>
            </div>
        </div> --}}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="mb-4">
                    @if ($item->getFirstMedia('item_image'))
                        <img src="{{ $item->getFirstMediaUrl('item_image') }}" alt="{{ $item->item_name }}" class="w-full h-auto">
                    @endif
                    <div>
                        <h3>{{ $item->item_name }}</h3>
                        <p>{{ $item->description }}</p>
                        <div class="my-8">
                            <h2>Requests for this Item:</h2>
                            @forelse ($item->itemRequests as $request)
                                <div class="mb-4 p-4 bg-white shadow-sm rounded-lg flex justify-between">
                                    <div class="flex">
                                        @if ($request->getFirstMedia('request-images'))
                                            <img src="{{ $request->getFirstMediaUrl('request-images') }}" alt="Request Image"
                                                class="w-32 h-32 mr-4">
                                        @endif
                                        <div>
                                            {{-- @if ($request->getFirstMedia('request-images'))
                                    <img src="{{ $request->getFirstMediaUrl('request-images') }}" alt="Request Image" class="w-32 h-32 mr-4">
                                @endif --}}
                                            <p><strong>Requested By:</strong> {{ $request->sender->username }}</p>
                                            <p><strong>Message:</strong> {{ $request->message }}</p>
                                            <p><strong>Status:</strong> {{ $request->status }}</p>
                                        </div>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                            @empty
                                <p>No requests for this item.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
