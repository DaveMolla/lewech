<!-- resources/views/requests/my-item-requests.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Item Requests
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($itemRequests as $request)
                <div class="mb-4 p-4 bg-white shadow-sm rounded-lg">
                    <div class="flex-none">
                        @if ($request->getFirstMedia('request-images'))
                            <img src="{{ $request->getFirstMediaUrl('request-images') }}"
                                alt="{{ $request->request_item_name }}" class="w-49 h-auto">
                        @endif
                    </div>

                    <p><strong>My Item Name:</strong> {{ $request->item->item_name }}</p>
                    <p><strong>Requested Item Name:</strong> {{ $request->request_item_name }}</p>
                    <p><strong>Message:</strong> {{ $request->message }}</p>
                    <p><strong>Status:</strong> {{ $request->status }}</p>
                    <p><strong>Request By:</strong> {{ $request->sender->username }}</p>
                    <div class="flex space-x-2 mt-4">
                        <form method="POST" action="{{ route('item-requests.accept', $request) }}">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 border border-green-800 text-green-800 bg-green-200 font-bold rounded hover:bg-green-300 transition"
                                style="background-color: rgb(2, 147, 2)">
                                Accept
                            </button>
                        </form>

                        <form method="POST" action="{{ route('item-requests.reject', $request) }}">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">Reject</button>
                        </form>
                    </div>
                    @if ($request->status == 'approved')
                        <button
                            onclick="document.getElementById('userInfoModal{{ $request->id }}').classList.remove('hidden')"
                            class="ml-4 mt-4 mb-4" style="background-color: rgb(87, 188, 87); padding:1%"> Show
                            Information</button>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    @foreach ($itemRequests as $request)
        <div id="userInfoModal{{ $request->id }}" class="hidden fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="bg-white p-4">
                        <h3 class="text-lg font-bold">Requester Information</h3>
                        <p><strong>Username:</strong> {{ $request->sender->username }}</p>
                        <p><strong>Phone:</strong> {{ $request->sender->phone }}</p>
                        <p><strong>Email:</strong> {{ $request->sender->email }}</p>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse">
                        <button
                            onclick="document.getElementById('userInfoModal{{ $request->id }}').classList.add('hidden')"
                            type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-app-layout>
