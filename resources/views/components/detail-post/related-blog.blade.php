<article class="max-w-xs">
    <a href="#">
        <img src="{{ $thumbnail }}" class="mb-5 rounded-lg w-full h-[200px]" alt="Image 1">
    </a>
    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
        <a href="{{ route('membership.detailPost',$id) }}">{{ $title }}</a>
    </h2>
    <p class="mb-4 text-gray-500 dark:text-gray-400">{{ $content }}</p>
    <a href="{{ route('membership.detailPost',$id) }}" class="inline-flex items-center font-medium underline underline-offset-4 text-white dark:text-primary-500 hover:no-underline">
        Read the blog
    </a>
</article>