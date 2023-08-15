<template>
    <AppLayout :title="props.profile.data.username">
        <template #header>
            @{{ props.profile.data.username }}'s profile
        </template>

        <div class="border-l border-r border-b border-gray-200 dark:border-dim-200">
            <ProfileCard :profile="profile" />
            <UserListCard :users="followers" />
        </div>

    </AppLayout>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ProfileCard from '../Shared/ProfileCard.vue';
import Post from '../Shared/Post.vue';
import UserListCard from '../Shared/UserListCard.vue';

let props = defineProps({
    profile: Object,
    followers: Object,
});
</script>
