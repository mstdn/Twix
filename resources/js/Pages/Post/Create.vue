<template>
    <AppLayout title="Upload">
        <template #header>
            Upload
        </template>

        <Upload />
    </AppLayout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import Upload from '../Shared/Upload.vue';
export default {
    components: {
    AppLayout,
    Upload
}
}
</script>
