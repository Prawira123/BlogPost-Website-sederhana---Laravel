<article class="flex max-w-xl flex-col items-start justify-between">
<img src="{{ $thumbnail }}" alt="" class="w-full h-[200px] object-cover mb-4">
<div class="flex items-center gap-x-4 text-xs">
    <time datetime="2020-03-16" class="text-gray-400">{{ $date }}</time>
    <a href="#" class="relative z-10 rounded-full bg-gray-800/60 px-3 py-1.5 font-medium text-gray-300 hover:bg-gray-800">{{ $category }}</a>
</div>
<div class="group relative grow">
    <h3 class="mt-3 text-lg/6 font-semibold text-white group-hover:text-gray-300">
    <a href="{{ $slot }}">
        <span class="absolute inset-0"></span>
        {{ $title }}
    </a>
    </h3>
    <p class="mt-5 line-clamp-3 text-sm/6 text-gray-400">{{ $content }}</p>
</div>
<div class="relative mt-8 flex items-center gap-x-4 justify-self-end">
    <img src="{{ $img }}" alt="" class="size-10 rounded-full bg-gray-800" />
    <div class="text-sm/6">
    <p class="font-semibold text-white">
        <a href="{{ $link }}" class="hover:underline">
        <span class="absolute inset-0"></span>
        {{ $name }}
        </a>
    </p>
    <p class="text-gray-400">{{ $address }}</p>
    </div>
</div>
</article>
</a>