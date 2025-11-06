@auth
        @if (Auth::id() == $iduser)
        <div class="flex w-full items-center justify-end gap-3">
            <a href="{{ route('membership.editBlog', $id) }}" class="py-2 px-4 bg-white text-gray-800 rounded-lg font-bold hover:bg-gray-200 cursor-pointer">Update</a>
            <form action="{{ route('post.delete', $id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="py-2 px-4 border-2 border-white text-white rounded-lg font-bold hover:bg-gray-200 hover:text-gray-800 cursor-pointer">Delete</button>
            </form>  
        </div>         
    @endif
@endauth
<header class="mb-2 lg:mb-6 not-format">
    <address class="flex items-center mb-6 not-italic w-full">
        <div class="flex items-center mr-3 text-sm text-gray-900 dark:text-white w-full">
            <img class="mr-4 w-16 h-16 rounded-full" src="{{ $imageProfile }}" alt="{{ $username }}">
            <div>
                <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $username }}</a>
                <p class="text-base text-gray-500 dark:text-gray-400">{{ $email }}</p>
                <p class="text-base text-gray-500 dark:text-gray-400">{{ $date->format('d F Y') }}</p>
            </div>
        </div>
</address>   
<h1 class="mb-2 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $title }}</h1>
</header>