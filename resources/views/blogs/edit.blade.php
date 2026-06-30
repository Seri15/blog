<x-guest-layout>
    <div class="p-4 mt-4">
        <form action="{{ route('blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full">
                @if($blog->image)
                    <p class="mt-2 text-sm text-gray-500">Current image: {{ $blog->image }}</p>
                    image: <img src="{{ asset('images/' . $blog->image) }}" alt="{{$blog->title}}" class="w-64 h-48 object-cover object-center mt-2">
                @endif
            </div>

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" class="mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" id="content" class="mt-1 block w-full">{{ old('content', $blog->content) }}</textarea>
            </div>

            <x-primary-button>Update Blog</x-primary-button>
        </form>
    </div>
</x-guest-layout>
