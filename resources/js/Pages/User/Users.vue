<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Pagination from "../Shared/Pagination.vue";
import { ref, watch } from "vue";
import { router } from '@inertiajs/vue3'
import throttle from "lodash/throttle";
import { Link } from '@inertiajs/vue3';

let props = defineProps({
    users: Object,
    filters: Object,
});

let search = ref(props.filters.search);

watch(
    search,
    throttle(function (value) {
        router.get(
            "/users",
            { search: value },
            {
                preserveState: true,
                replace: true,
            }
        );
    }, 500)
)

</script>

<template>
    <AppLayout title="Explore">
        <template #header>
            Explore
        </template>

        <div class="border-l border-r border-gray-200 dark:border-dim-200 h-screen">
            <div class="pt-2 px-2">
                <!-- Search -->
                <div class="relative mb-2">
                    <div class="absolute text-gray-600 flex items-center pl-4 h-full cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="18"
                            height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                            </path>
                        </svg>
                    </div>
                    <input v-model="search"
                        class="w-full bg-gray-200 dark:bg-dim-400 border-gray-200 dark:border-dim-400 text-gray-500 focus:bg-gray-100 dark:focus:bg-dim-900 focus:outline-none focus:border focus:border-blue-200 font-normal h-9 flex items-center pl-12 text-sm rounded-full border shadow"
                        placeholder="Search Twix" />
                </div>
                <!-- /Search -->
            </div>


            <!-- Who to follow -->
            <div class="bg-gray-50 dark:bg-dim-700 rounded-2xl m-2">
                <h1
                    class="text-gray-900 dark:text-white text-md font-bold p-3 border-b border-gray-200 dark:border-dim-200">
                    Who to follow
                </h1>

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
                            <div v-if="$page.props.auth.user"
                                class="flex items-center h-full text-gray-800 dark:text-white">
                                <Link v-if="profile.isFollowing === false &&
                                    profile.followbutton === false
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

                                <Link v-if="profile.isFollowing === true &&
                                    profile.followbutton === false
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



    </AppLayout>
</template>

