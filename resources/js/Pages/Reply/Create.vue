<template>
    <AppLayout title="Upload">
        <template #header>
            Reply
        </template>

        <ReplyForm :post="$post"/>
    </AppLayout>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ReplyForm from '../Shared/ReplyForm.vue';

let props = defineProps({
    post: Object,
});

</script>