<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

</script>

<template>
    <AppLayout title="Privacy">
        <template #header>
            Privacy
        </template>

        <div class="border-b border-gray-200 dark:border-dim-200 bg-gray-50 dark:bg-dim-300 border-l border-r">
            <div
                class="flex flex-col items-center justify-center text-center p-6 bg-white dark:bg-dim-900 border-gray-200 dark:border-dim-200 hover:bg-gray-50 dark:hover:bg-dim-300 cursor-pointer transition duration-350 ease-in-out text-blue-400 text-sm">
                <h1 class="dark:text-white text-gray-900 text-2xl font-bold mb-2">
                    Privacy
                </h1>
                <p class="text-gray-500 mb-5">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent gravida libero non leo egestas, sit
                    amet scelerisque mi fringilla. In nec mattis est. Proin fermentum sagittis risus ac consectetur.
                    Maecenas lorem sem, hendrerit vel nibh nec, mattis posuere leo.
                </p>
                <p class="text-gray-500 mb-5">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent gravida libero non leo egestas, sit
                    amet scelerisque mi fringilla. In nec mattis est. Proin fermentum sagittis risus ac consectetur.
                    Maecenas lorem sem, hendrerit vel nibh nec, mattis posuere leo.
                </p>
            </div>
        </div>

    </AppLayout>
</template>
