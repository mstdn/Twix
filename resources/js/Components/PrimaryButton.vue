<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="bg-blue-400
                        hover:bg-blue-500
                        text-white
                        rounded-full
                        py-1
                        px-4
                        ml-auto
                        mr-1">
        <slot />
    </button>
</template>
