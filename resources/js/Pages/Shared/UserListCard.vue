<template>
    <div>
        <!-- Who to follow -->
        <div class="bg-gray-50 dark:bg-dim-700">
            <!-- <h2 class="text-gray-900 dark:text-white text-md font-bold p-3 border-b border-gray-200 dark:border-dim-200">
                Browse users
            </h2> -->
            <!-- Twitter Account -->
            <div v-for="profile in users.data" :key="profile.id"
                class="text-blue-400 text-sm font-normal p-3 border-b border-gray-200 dark:border-dim-200 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out">
                <Link :href="route('user.show', { id: profile.username })">
                <div class="flex flex-row justify-between p-2">
                    <div class="flex flex-row">
                        <img class="w-10 h-10 rounded-full" :src="profile.avatar" :alt="profile.name" />
                        <div class="flex flex-col ml-2">
                            <h1 class="text-gray-900 dark:text-white font-bold text-sm">
                                {{ profile.name }}
                            </h1>
                            <p class="text-gray-400 text-sm">@{{ profile.username }}</p>
                        </div>
                    </div>
                    <div class="">
                        <div v-if="$page.props.auth.user" class="flex items-center h-full text-gray-800 dark:text-white">
                            <Link v-if="profile.is.following === false &&
                                profile.is.self === false
                                " preserveScroll method="post" as="button" type="button" class="
                                text-xs
                                font-bold
                                text-blue-400
                                px-4
                                py-1
                                rounded-full
                                border-2 border-blue-400
                                " :href="route('follow', { id: profile.username })">
                            + Follow
                            </Link>

                            <Link v-if="profile.is.following === true &&
                                profile.is.self === false
                                " preserveScroll method="post" as="button" type="button" class="
                            text-xs
                            font-bold
                            text-blue-400
                            px-4
                            py-1
                            rounded-full
                            border-2 border-blue-400
                            " :href="route('follow', { id: profile.username })">
                            - Unfollow
                            </Link>
                        </div>
                    </div>
                </div>
                </Link>
            </div>
            <!-- /Twitter Account -->


            <div
                class="text-blue-400 text-sm font-normal p-3 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out">
                <Pagination :links="users" />
            </div>
        </div>
        <!-- /Who to follow -->
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';

let props = defineProps({
    users: Object,
});
</script>
