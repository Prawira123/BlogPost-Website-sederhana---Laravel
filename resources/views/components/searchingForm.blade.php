<h1 class="flex items-center justify-center w-full text-5xl text-gray-900 font-bold text-center my-6">Searching The Blog</h1>
<form action="{{ route('searchingPost') }}" method="GET" class="flex items-center w-full ">
    @csrf
    <div class="flex items-center justify-center w-full h-auto gap-5">
    <input type="text" name="search" value="{{ request('search') }}" class="bg-black/5 px-3 py-1.5 text-base text-gray-800 outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 rounded-lg w-[500px] h-[50px] placeholder:font-medium placeholder:italic" placeholder="Search...">
    <button type="submit" class="bg-gray-800 text-white hover:bg-gray-900 hover:border-2 hover:border-gray-400 font-bold py-3 px-4 rounded-lg cursor-pointer transition-all duration-300">Search</button>
    </div>
</form>
