{{-- user/requests/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse ($requests as $request)
                <div class="mb-4 p-4 bg-white shadow-sm rounded-lg">
                    <div class="flex-none">
                        @if ($request->getFirstMedia('request-images'))
                            <img src="{{ $request->getFirstMediaUrl('request-images') }}" alt="Request Image"
                                class="w-48 h-auto">
                        @endif
                    </div>
                    <p><strong>My Item:</strong> {{ $request->request_item_name }}</p>
                    <p><strong>Requested Item :</strong> {{ $request->item->item_name }}</p>
                    <p><strong>Message:</strong> {{ $request->message }}</p>
                    <p><strong>Status:</strong> {{ $request->status }}</p>
                    @if ($request->status == 'approved')
                        <button onclick="openModal('{{ $request->id }}')" class="text-blue-600 hover:underline"
                            style="padding: 10px; background-color:rgb(28, 201, 28);">
                            Show Information
                        </button>
                    @endif

                    {{-- User Information Modal --}}
                    <div id="modal{{ $request->id }}"
                        class="hidden fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full">
                        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                            <div class="mt-3 text-center">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Item Owner Information</h3>
                                <div class="mt-2 px-7 py-3">
                                    {{-- <p class="">
                        Username: {{ $request->item->user->username ?? 'N/A' }}
                    </p>
                    <p class="">
                        Email: {{ $request->item->user->email ?? 'N/A' }}
                    </p>
                    <p class="">
                        Phone: {{ $request->item->user->phone ?? 'N/A' }}
                    </p> --}}
                                    <p><strong>Username:</strong> {{ $request->item->user->username ?? 'N/A' }}</p>
                                    <p><strong>Email:</strong> {{ $request->item->user->email ?? 'N/A' }}</p>
                                    <p><strong>Phone:</strong> {{ $request->item->user->phone ?? 'N/A' }}</p>
                                </div>
                                <div class="items-center px-4 py-3">
                                    <button onclick="closeModal('{{ $request->id }}')"
                                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>You have not made any requests.</p>
            @endforelse
        </div>
    </div>
    <script>
        function openModal(requestId) {
            document.getElementById('modal' + requestId).style.display = 'block';
        }

        function closeModal(requestId) {
            document.getElementById('modal' + requestId).style.display = 'none';
        }
    </script>


</x-app-layout>
