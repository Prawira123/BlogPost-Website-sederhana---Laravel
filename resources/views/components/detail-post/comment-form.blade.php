<section class="not-format">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">
            {{ $commentCount }} Discuss
        </h2>
    </div>

    @auth
        <form class="mb-6" action="{{ $action }}" method="POST">
            @csrf
            <div
                class="py-2 px-4 mb-4 bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <textarea name="content" id="comment" rows="6"
                    class="w-full text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:bg-gray-800"
                    placeholder="Write a comment..." required></textarea>
            </div>
            <button type="submit"
                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-gray-800 bg-white border border-gray-700 rounded-lg hover:bg-gray-200 dark:focus:ring-gray-900">
                Post comment
            </button>
        </form>
    @endauth

    @guest
        <div class="p-4 text-center bg-gray-100 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <p class="text-gray-700 dark:text-gray-300 mb-3">Login untuk menulis komentar</p>
            <a href="{{ $action }}"
                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-gray-800 bg-white border border-gray-700 rounded-lg hover:bg-gray-200">
                Login Sekarang
            </a>
        </div>
    @endguest
</section>
