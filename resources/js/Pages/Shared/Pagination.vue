<template>
    <div v-if="links.length > 3">
        <div class="flex justify-center py-8">
            <template v-for="(link) in links">
                <div v-if="link.url === null" class="text-gray-900 dark:text-white" v-html="link.label" />
                <Link v-else class="btn btn-outline btn-primary"
                    :class="{ 'bg-base-200 dark:bg-gray-700': link.active }" :href="link.url" v-html="link.label"></Link>
            </template>
        </div>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';

let props = defineProps({
    links: Object,
});
</script>