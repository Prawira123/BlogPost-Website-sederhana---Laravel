<header class="mb-4 lg:mb-6 not-format">
<address class="flex items-center mb-6 not-italic">
    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
        <img class="mr-4 w-16 h-16 rounded-full" src="{{ $imageProfile }}" alt="{{ $username }}">
        <div>
            <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $username }}</a>
            <p class="text-base text-gray-500 dark:text-gray-400">{{ $email }}</p>
            <p class="text-base text-gray-500 dark:text-gray-400">{{ $date->format('d F Y') }}</p>
        </div>
    </div>
</address>
<h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $title }}</h1>
</header>