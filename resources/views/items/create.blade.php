<!-- resources/views/items/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        Create Item
    </x-slot>

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
            <input type="text" name="item_name" placeholder="Item Name" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <select name="status" required>
                <option value="open">Open</option>
                <option value="closed">Closed</option>
            </select>
            <input type="file" name="item_image" required>
            <button type="submit">Create</button>
        </form>
    </div>
</x-app-layout>
