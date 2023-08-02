<template>
    <div>
        <div class="border-b border-gray-200 dark:border-dim-200 bg-gray-50 dark:bg-dim-300">
            <div class="flex flex-col  bg-white dark:bg-dim-900  border-gray-200 dark:border-dim-200 text-blue-400">
                <div class="h-24 bg-gradient-to-r from-cyan-500 to-blue-500"></div>
                <div class="p-6">
                    <div class="flex justify-between">
                        <div class="flex flex-row">
                            <img class="w-14 h-14 rounded-full"
                                :src="profile.data.avatar"
                                alt="@{{ profile.data.username }}" />
                            <div class="flex flex-col ml-2">
                                <h1 class="text-gray-800 dark:text-white font-bold">
                                    {{ profile.data.name }}
                                </h1>
                                <p class="text-gray-400 text-sm">@{{ profile.data.username }}</p>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <Link
                                v-if="$page.props.auth.user !== null && profile.data.is.following === false && profile.data.is.self === false"
                                preserveScroll method="post" as="button" type="button"
                                :href="route('follow', { id: profile.data.username })"
                                class="mx-auto w-11 h-11 xl:w-32 flex items-center justify-center bg-blue-400 hover:bg-blue-500 py-3 rounded-full text-white font-bold font-sm transition duration-350 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg>
                            <span class="hidden xl:block font-bold text-md ml-2"> Follow</span>
                            </Link>
                            <Link
                                v-if="$page.props.auth.user !== null && profile.data.is.following === true && profile.data.is.self === false"
                                preserveScroll method="post" as="button" type="button"
                                :href="route('follow', { id: profile.data.username })"
                                class="mx-auto w-11 h-11 xl:w-32 flex items-center justify-center bg-blue-400 hover:bg-blue-500 py-3 rounded-full text-white font-bold font-sm transition duration-350 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg>
                            <span class="hidden xl:block font-bold text-md ml-2"> Unfollow</span>
                            </Link>

                        </div>
                    </div>
                    <p v-if="profile.data.about !== null" class="text-gray-500 mb-5 mt-3">
                        {{ profile.data.about }}
                    </p>
                    <p v-if="profile.data.about == null" class="text-gray-500 mb-5 mt-3">
                        No bio yet.
                    </p>
                    <div class="flex justify-start">
                        <div>
                            <p><span class="font-bold pr-1">{{ profile.data.postamount }}</span>Posts</p>
                        </div>
                        <div class="pl-2">
                            <p><span class="font-bold pr-1">{{ profile.data.followcount }}</span>Follows</p>
                        </div>
                        <div class="pl-2">
                            <p><span class="font-bold pr-1">{{ profile.data.followerscount }}</span>Followers</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="flex justify-between">
                <div class="flex pl-2">
                    Posts
                </div>
                <div class="flex">
                    Replies
                </div>
                <div class="flex pr-2">
                    Media
                </div>
            </div>
        </div>


        <div class="">
            <Post :posts="posts" />
        </div>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
import Post from '../Shared/Post.vue';

let props = defineProps({
    posts: Object,
    profile: Object,
});

</script>