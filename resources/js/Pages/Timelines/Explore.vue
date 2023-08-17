<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Empty from '../Shared/Empty.vue';
import Upload from '../Shared/Upload.vue';
import PostCard from '../Shared/PostCard.vue';
import { useInfiniteScroll } from "@/Composables/useInfiniteScroll";
import { useIntersect } from "@/Composables/useIntersect";
import { ref } from 'vue';

const landmark = ref(null);

const { items, reset, canLoadMoreItems } = useInfiniteScroll('posts', landmark);

let props = defineProps({
    posts: Object,
    filters: Object,
});

</script>

<template>
    <AppLayout title="Explore">
        <template #header>
            Explore
        </template>

        <div v-if="$page.props.auth.user">
            <Upload />
        </div>

        <div v-if="posts.meta.total === 0">
            <Empty />
        </div>
        <PostCard v-if="posts.meta.total !== 0" v-for="post in items" :key="post.id" :post="post" />

        <div v-if="!canLoadMoreItems"
            class="border-b border-gray-200 dark:border-dim-200 bg-gray-50 dark:bg-dim-300 py-2 border-l border-r">
            <div
                class="flex flex-shrink-0 items-center justify-center py-4 bg-white dark:bg-dim-900 border-b border-t border-gray-200 dark:border-dim-200 hover:bg-gray-50 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out text-blue-400 text-sm">
                No posts
            </div>
        </div>

        <div ref="landmark"></div>
        <!-- <Pagination :links="posts" /> -->

    </AppLayout>
</template>
