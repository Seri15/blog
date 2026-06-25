<x-guest-layout>
    <div class="p-8">
        <div class="mb-6">
            <a href="{{route('blogs.create')}}" class="">Create Blog</a>
        </div>
    
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-body">
                <thead class="text-sm text-heading">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            Content
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                    <tr class="bg-neutral-primary">
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{ $blog->id }}
                        </th>
                        <td class="px-6 py-4 w-64 h-48" >
                            <img src="{{ asset('images/' . $blog->image) }}" alt="{{$blog->title}}" class="w-full h-full object-cover object-center">
                        </td>
                        <td class="px-6 py-4">
                            {{$blog->title}}
                        </td>
                        <td class="px-6 py-4">
                            {{$blog->content}}
                        </td>
                        <td class="px-6 py-4 flex gap-2">
                            <a href="{{route('blogs.edit', $blog->id)}}" class="border border-blue-600 p-2 rounded-lg bg-blue-600 text-white">Edit</a>
                            <form action="{{ route('blogs.destroy', $blog->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border border-red-600 p-2 rounde-lg bg-red-600 text-white">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</x-guest-layout>