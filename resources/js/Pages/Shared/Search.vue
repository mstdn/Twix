<template>
    <div class="relative m-2">
        <div class="absolute text-gray-600 flex items-center pl-4 h-full cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="18" height="18"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path
                    d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                </path>
            </svg>
        </div>
        <input type="search"
            class="w-full bg-gray-200 dark:bg-dim-400 border-gray-200 dark:border-dim-400 text-gray-100 focus:bg-gray-100 dark:focus:bg-dim-900 focus:outline-none focus:border focus:border-blue-200 font-normal h-9 flex items-center pl-12 text-sm rounded-full border shadow"
            placeholder="Search Twix" />
    </div>
</template>
<script setup>
import throttle from "lodash/throttle";
import { ref, watch } from "vue";
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

let props = defineProps({
    posts: Object,
    filters: Object,
});

let search = ref(search);

watch(
    search,
    throttle(function (value) {
        Inertia.get(
            "/search",
            { search: value },
            {
                preserveState: true,
                replace: true,
                preserveScroll: true
            }
        );
    }, 1000)
);

const form = useForm();

</script>