<!-- resources/views/items/create.blade.php -->
<x-app-layout>
    {{-- <x-slot name="header">
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
    </x-slot> --}}
    {{-- <x-slot name="header">
        Create Item
    </x-slot> --}}

    <div>
        <!-- Display errors if there are any -->
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- The form for creating a new item -->
        <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="status" value="open">
            <input type="text" name="item_name" placeholder="Item Name" required>
            <textarea name="description" placeholder="Description" required></textarea>
            {{-- <select name="status" required>
                <option value="open">Open</option>
                <option value="closed">Closed</option>
            </select> --}}
            <input type="file" name="item_image" required>
            <button type="submit">Create</button>
        </form>
    </div>
</x-app-layout>
