<script setup>
import { Link } from '@inertiajs/vue3';

let props = defineProps({
    links: Object,
});
</script>
<template>
    <div v-if="links.meta.links.length">
     <div class="flex justify-center py-8">
       <template v-for="(link) in links.meta.links">
         <div v-if="link.url === null" class="text-xs font-bold text-blue-400 px-4 py-1 rounded-full border-2 border-blue-400" v-html="link.label" />
         <Link v-else class="text-xs font-bold text-blue-400 px-4 py-1 rounded-full border-2 border-blue-400" :class="{ 'text-xs font-bold text-blue-400 px-4 py-1 rounded-full border-2 border-blue-400': link.active }" :href="link.url" v-html="link.label" />
       </template>
     </div>
   </div>
 </template>
