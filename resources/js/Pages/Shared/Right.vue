<template>
    <div>
        <div class="hidden md:block w-290 lg:w-350 h-screen">
            <div class="flex flex-col fixed overflow-y-auto w-290 lg:w-350 h-screen">
                <!-- Search -->
                <!-- <Search /> -->
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
                        <p class="text-xs text-gray-400">29.7K Bites</p>
                    </div>
                    <!-- /Trending Topic -->

                    <!-- Trending Topic -->
                    <div
                        class="text-blue-400 text-sm font-normal p-3 border-b border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out">
                        <h2 class="font-bold text-md text-gray-800 dark:text-white">
                            #Mastodon
                        </h2>
                        <p class="text-xs text-gray-400">351K Bites</p>
                    </div>
                    <!-- /Trending Topic -->

                    <!-- Trending Topic -->
                    <div
                        class="text-blue-400 text-sm font-normal p-3 border-b border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out">
                        <h2 class="font-bold text-md text-gray-800 dark:text-white">
                            #ElonSucks
                        </h2>
                        <p class="text-xs text-gray-400">52.7K Bites</p>
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
                            <a class="hover:underline" href="#">Terms</a>
                        </li>
                        <li class="inline-block mx-2">
                            <a class="hover:underline" href="#">Privacy</a>
                        </li>
                        <li class="inline-block mx-2">
                            <a class="hover:underline" href="#">Cookies</a>
                        </li>
                        <li class="inline-block mx-2">
                            <a class="hover:underline" target="_blank" href="https://github.com/mstdn/Twix">Source</a>
                        </li>
                        <li class="inline-block mx-2">© 2023 Twix, Inc.</li>
                    </ul>
                </footer>
            </div>
        </div>
    </div>
</template>
<script>
import Search from './Search.vue';

export default {
    components: { Search }
}
</script>