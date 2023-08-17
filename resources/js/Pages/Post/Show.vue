<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link, router, useForm } from '@inertiajs/vue3';
import Post from '../Shared/Post.vue';
import { Popover, PopoverButton, PopoverPanel } from '@headlessui/vue';
import PostCard from '../Shared/PostCard.vue';

let props = defineProps({
    post: Object,
    user: Object,
    replies: Object,
});

function submit() {
  router.delete(route('post.destroy'), form)
};

const form = useForm({});

function destroy(id) {
    if (confirm("Are you sure you want to delete?")) {
        form.delete(route('post.destroy', id));
    }
};

</script>
<template>
    <AppLayout title="Home">
        <template #header>
            @{{ user.name }}'s post
        </template>

        <PostCard :post="post" />

        <PostCard v-if="replies.total !== 0" v-for="post in replies.data" :key="post.id" :post="post" />
       
    </AppLayout>
</template>
