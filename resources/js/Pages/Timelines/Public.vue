<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Upload from '../Shared/Upload.vue';
import Post from '../Shared/Post.vue';
import Empty from '../Shared/Empty.vue';


let props = defineProps({
    posts: Object,
    filters: Object,
});


</script>

<template>
    <AppLayout title="Public">
        <template #header>
            Public
        </template>

        <div v-if="$page.props.auth.user">
            <Upload />
        </div>

        <div v-if="posts.meta.total === 0">
            <Empty />
        </div>
        <Post :posts="posts" />

    </AppLayout>
</template>
