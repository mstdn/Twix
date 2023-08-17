<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Empty from '../Shared/Empty.vue';
import Upload from '../Shared/Upload.vue';
import PostCard from '../Shared/PostCard.vue';
import { ref } from "vue";
import { useInfiniteScroll } from "@/Composables/useInfiniteScroll";
import { useIntersect } from "@/Composables/useIntersect";

let props = defineProps({
    posts: Object,
    filters: Object,
});

const landmark = ref(null);

const { items, reset, canLoadMoreItems } = useInfiniteScroll('posts', landmark);

</script>

<template>
    <AppLayout title="Home">
        <template #header>
            Home
        </template>

        <div v-if="$page.props.auth.user">
            <Upload />
        </div>

        <PostCard v-if="posts.meta.total !== 0" v-for="item in items" :key="item.id" :post="item" />

        <div v-if="!canLoadMoreItems"
            class="border-b border-gray-200 dark:border-dim-200 bg-gray-50 dark:bg-dim-300 py-2 border-l border-r">
            <div
                class="flex flex-shrink-0 items-center justify-center py-4 bg-white dark:bg-dim-900 border-b border-t border-gray-200 dark:border-dim-200 hover:bg-gray-50 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out text-blue-400 text-sm">
                No posts
            </div>
        </div>

        <div ref="landmark"></div>

    </AppLayout>
</template>
