<template>
    <AppLayout :title="props.profile.data.username">
        <template #header>
            @{{ props.profile.data.username }}'s profile
        </template>

        <div class="border-l border-r border-gray-200 dark:border-dim-200">
            <ProfileCard :profile="profile" />
        </div>

        <div class="">

            <TabGroup>
                <TabList class="flex items-center border-l border-r border-b border-gray-200 dark:border-dim-200">
                    <Tab as="template" v-slot="{ selected }" class="w-full">
                        <button
                            :class="{ 'text-white text-sm font-normal p-3 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out': selected, 'text-blue-400 text-sm font-normal p-3 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out': !selected }">
                            Posts
                        </button>
                    </Tab>
                    <Tab as="template" v-slot="{ selected }" class="w-full">
                        <button
                            :class="{ 'text-white text-sm font-normal p-3 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out': selected, 'text-blue-400 text-sm font-normal p-3 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out': !selected }">
                            Replies
                        </button>
                    </Tab>
                    <Tab as="template" v-slot="{ selected }" class="flex w-full">
                        <button
                            :class="{ 'text-white text-sm font-normal p-3 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out': selected, 'text-blue-400 text-sm font-normal p-3 hover:bg-gray-100 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out': !selected }">
                            Media
                        </button>
                    </Tab>
                </TabList>
                <TabPanels>
                    <TabPanel>
                        <PostCard v-if="posts.meta.total !== 0" v-for="post in items" :key="post.id" :post="post" />
                        <div v-if="!canLoadMoreItems"
                            class="border-b border-gray-200 dark:border-dim-200 bg-gray-50 dark:bg-dim-300 py-2 border-l border-r">
                            <div
                                class="flex flex-shrink-0 items-center justify-center py-4 bg-white dark:bg-dim-900 border-b border-t border-gray-200 dark:border-dim-200 hover:bg-gray-50 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out text-blue-400 text-sm">
                                No posts
                            </div>
                        </div>
                        <div ref="landmark"></div>
                    </TabPanel>
                    <TabPanel>
                        LOL
                    </TabPanel>
                    <TabPanel>

                    </TabPanel>
                </TabPanels>
            </TabGroup>

        </div>

    </AppLayout>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ProfileCard from '../Shared/ProfileCard.vue';
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue';
import PostCard from '../Shared/PostCard.vue';
import { useInfiniteScroll } from "@/Composables/useInfiniteScroll";
import { useIntersect } from "@/Composables/useIntersect";
import { ref } from 'vue';

let props = defineProps({
    posts: Object,
    profile: Object,
});

const landmark = ref(null);

const { items, reset, canLoadMoreItems } = useInfiniteScroll('posts', landmark);

</script>
