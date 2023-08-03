<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '../Shared/Pagination.vue';
import Post from '../Shared/Post.vue';
import Empty from '../Shared/Empty.vue';
import Upload from '../Shared/Upload.vue';

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
        <Post :posts="posts" />

        <Pagination :links="posts" />

    </AppLayout>
</template>
