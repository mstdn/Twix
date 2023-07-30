<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import CreatePost from '../Shared/CreatePost.vue'
import Post from '../Shared/Post.vue'
import Empty from '../Shared/Empty.vue'


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

        <div v-if="$page.props.auth.user">
            <CreatePost />
        </div>

        <div v-if="posts.meta.total === 0">
            <Empty />
        </div>
        <Post :posts="posts" />

    </AppLayout>
</template>
