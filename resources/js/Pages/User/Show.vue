<template>
    <AppLayout title="Home">
        <template #header>
            @{{ props.profile.data.username }}'s profile
        </template>

        <div class="border-l border-r border-gray-200 dark:border-dim-200 h-screen">
            <ProfileCard :profile="profile" :posts="posts" />
        </div>

    </AppLayout>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ProfileCard from '../Shared/ProfileCard.vue';

let props = defineProps({
    posts: Object,
    profile: Object,
});
</script>
