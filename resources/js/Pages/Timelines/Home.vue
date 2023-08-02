<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '../Shared/Pagination.vue';
import Post from '../Shared/Post.vue';
import Empty from '../Shared/Empty.vue';
import Compose from '../Shared/Compose.vue';
import Upload from '../Shared/Upload.vue';

let props = defineProps({
    posts: Object,
    filters: Object,
});


</script>

<template>
    <AppLayout title="Home">
        <template #header>
            Home
        </template>

        <!-- <Compose /> -->
        <Upload />

        <div v-if="posts.meta.total === 0">
            <Empty />
        </div>
        <Post :posts="posts" />

        <Pagination :links="posts.links" />

    </AppLayout>
</template>
