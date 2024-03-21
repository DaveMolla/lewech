<x-app-layout>
    <x-slot name="header">
        Request Item
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

        <!-- The form for creating a new item request -->
        <form method="POST" action="{{ route('requests.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <input type="hidden" name="receiver_user_id" value="{{ $receiver_user_id }}">
            <input type="hidden" name="status" value="pending"> <!-- Assuming 'pending' is the initial status -->
            <textarea name="message" placeholder="Message" required></textarea>
            <input type="file" name="image" required> <!-- Name adjusted to match validation rule -->
            <button type="submit">Create</button>
        </form>
    </div>
</x-app-layout>
