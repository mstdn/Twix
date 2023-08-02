<template>
    <div>
        <div class="hidden md:block w-290 lg:w-350 h-screen">
            <div class="flex flex-col fixed overflow-y-auto w-290 lg:w-350 h-screen">
                <!-- Search -->
                <div class="relative m-2">
                    <div class="absolute text-gray-600 flex items-center pl-4 h-full cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="18"
                            height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                            </path>
                        </svg>
                    </div>
                    <input
                        class="w-full bg-gray-200 dark:bg-dim-400 border-gray-200 dark:border-dim-400 text-gray-100 focus:bg-gray-100 dark:focus:bg-dim-900 focus:outline-none focus:border focus:border-blue-200 font-normal h-9 flex items-center pl-12 text-sm rounded-full border shadow"
                        placeholder="Search meows" />
                </div>
                <!-- /Search -->

                <!-- What’s happening -->
                <div class="bg-gray-50 dark:bg-dim-700 rounded-2xl m-2">
                    <h1
                        class="text-gray-900 dark:text-white text-md font-bold p-3 border-b border-gray-200 dark:border-dim-200">
                        What’s happening
                    </h1>

                    <!-- Trending Topic -->
                    <div
                        class="text-blue-400 text-sm font-normal p-3 border-b border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out">
                        <h2 class="font-bold text-md text-gray-800 dark:text-white">
                            #Caturday
                        </h2>
                        <p class="text-xs text-gray-400">29.7K Cats</p>
                    </div>
                    <!-- /Trending Topic -->

                    <!-- Trending Topic -->
                    <div
                        class="text-blue-400 text-sm font-normal p-3 border-b border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out">
                        <h2 class="font-bold text-md text-gray-800 dark:text-white">
                            #Mastodon
                        </h2>
                        <p class="text-xs text-gray-400">351K Cats</p>
                    </div>
                    <!-- /Trending Topic -->

                    <!-- Trending Topic -->
                    <div
                        class="text-blue-400 text-sm font-normal p-3 border-b border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out">
                        <h2 class="font-bold text-md text-gray-800 dark:text-white">
                            #ElonSucks
                        </h2>
                        <p class="text-xs text-gray-400">52.7K Cats</p>
                    </div>
                    <!-- /Trending Topic -->

                    <div
                        class="text-blue-400 text-sm font-normal p-3 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out">
                        Show more
                    </div>
                </div>
                <!-- /What’s happening -->

                <!-- Who to follow -->
                <div class="bg-gray-50 dark:bg-dim-700 rounded-2xl m-2">
                    <h1
                        class="text-gray-900 dark:text-white text-md font-bold p-3 border-b border-gray-200 dark:border-dim-200">
                        Who to follow
                    </h1>

                    <!-- Twitter Account -->
                    <div
                        class="text-blue-400 text-sm font-normal p-3 border-b border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out">
                        <div class="flex flex-row justify-between p-2">
                            <div class="flex flex-row">
                                <img class="w-10 h-10 rounded-full"
                                    src="https://media.mstdn.social/accounts/avatars/000/005/168/original/c85be6683862c045.png"
                                    alt="Joe Biden" />
                                <div class="flex flex-col ml-2">
                                    <h1 class="text-gray-900 dark:text-white font-bold text-sm">
                                        Washington
                                    </h1>
                                    <p class="text-gray-400 text-sm">@Washy</p>
                                </div>
                            </div>
                            <div class="">
                                <div class="flex items-center h-full text-gray-800 dark:text-white">
                                    <a href="#"
                                        class="text-xs font-bold text-blue-400 px-4 py-1 rounded-full border-2 border-blue-400">Follow</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Twitter Account -->

                    <!-- Twitter Account -->
                    <div
                        class="text-blue-400 text-sm font-normal p-3 border-b border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out">
                        <div class="flex flex-row justify-between p-2">
                            <div class="flex flex-row">
                                <img class="w-10 h-10 rounded-full"
                                    src="https://media.mstdn.social/accounts/avatars/000/005/168/original/c85be6683862c045.png"
                                    alt="Joe Biden" />
                                <div class="flex flex-col ml-2">
                                    <h1 class="text-gray-900 dark:text-white font-bold text-sm">
                                        George
                                    </h1>
                                    <p class="text-gray-400 text-sm">@George</p>
                                </div>
                            </div>
                            <div class="">
                                <div class="flex items-center h-full text-gray-800 dark:text-white">
                                    <a href="#"
                                        class="text-xs font-bold text-blue-400 px-4 py-1 rounded-full border-2 border-blue-400">Follow</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Twitter Account -->

                    <!-- Loader -->
                    <div class="border-b border-gray-200 dark:border-dim-200 p-4 max-w-sm w-full mx-auto">
                        <div class="animate-pulse flex space-x-4">
                            <div class="rounded-full bg-gray-400 h-12 w-12"></div>
                            <div class="flex-1 space-y-4 py-1">
                                <div class="h-4 bg-gray-400 rounded w-3/4"></div>
                                <div class="space-y-2">
                                    <div class="h-4 bg-gray-400 rounded"></div>
                                    <div class="h-4 bg-gray-400 rounded w-5/6"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Loader -->

                    <div
                        class="text-blue-400 text-sm font-normal p-3 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out">
                        Show more
                    </div>
                </div>
                <!-- /Who to follow -->

                <footer>
                    <ul class="text-xs text-gray-500 my-4 mx-2">
                        <li class="inline-block mx-2">
                            <a class="hover:underline" href="#">Terms of Service</a>
                        </li>
                        <li class="inline-block mx-2">
                            <a class="hover:underline" href="#">Privacy Policy</a>
                        </li>
                        <li class="inline-block mx-2">
                            <a class="hover:underline" href="#">Cookie Policy</a>
                        </li>
                        <li class="inline-block mx-2">
                            <a class="hover:underline" href="#">Ads info</a>
                        </li>
                        <li class="inline-block mx-2">
                            <a class="hover:underline" href="#">More</a>
                        </li>
                        <li class="inline-block mx-2">© 2020 Twitter, Inc.</li>
                    </ul>
                </footer>
            </div>
        </div>
    </div>
</template>
<script>
export default {

}
</script>