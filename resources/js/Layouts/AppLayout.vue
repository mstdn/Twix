<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import Banner from '@/Components/Banner.vue';
import Left from '@/Pages/Shared/Left.vue';
import Right from '@/Pages/Shared/Right.vue';
import { useToast } from "vue-toastification";


defineProps({
    title: String,
});

const logout = () => {
    router.post(route('logout'));
};

// const toast = useToast()

// watch(() => usePage().props.value.flash, flash => {
//     let toastId = null;

//     if (flash.message) {
//         toastId = toast({ component: Notification, props: { type: TYPE.DEFAULT, title: flash.message } })
//     }
//     if (flash.success) {
//         toastId = toast({ component: Notification, props: { type: TYPE.SUCCESS, title: flash.success } })
//     }
//     if (flash.error) {
//         toastId = toast({ component: Notification, props: { type: TYPE.ERROR, title: flash.error } })
//     }

//     if (toastId !== null) {
//         setTimeout(() => toast.dismiss(toastId), 5000)
//     }
// }, { deep: true })

</script>

<template>
    <div>

        <Head :title="title" />


        <div class="navbar bg-white dark:bg-dim-900 border-b border-gray-200 dark:border-gray-700 sticky top-0 z-50">
            <div class="flex-1">
                <Link href="/" class="btn btn-ghost normal-case text-xl dark:text-white">
                {{ $page.props.appName }}
                </Link>
            </div>
            <!-- <div v-if="$page.props.auth.user" class="flex-none gap-2">
                <button class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
                <button class="btn btn-ghost btn-circle">
                    <div class="indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="badge badge-xs badge-primary indicator-item"></span>
                    </div>
                </button>
            </div> -->
            <div v-if="$page.props.auth.user" class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img :src="$page.props.auth.user.profile_photo_url" />
                    </div>
                </label>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                        <Link :href="route('profile.show')">
                        Settings
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('api-tokens.index')">
                        API
                        </Link>
                    </li>
                    <form @submit.prevent="logout">
                        <li>
                            <Link :href="route('logout')" method="post" as="button">Logout</Link>
                        </li>
                    </form>
                </ul>
            </div>
            <div v-else class="navbar-end">
                <a :href="route('login')" class="btn">Login</a>
                <a :href="route('register')" class="btn">Register</a>
            </div>
        </div>

        <!-- Page Content -->
        <div class="container mx-auto">
            <div class="flex flex-row justify-center">

                <!-- Left -->
                <Left />
                <!-- /Left -->


                <!-- Middle -->
                <div class="w-full sm:w-600">
                    <!-- Header -->
                    <div
                        class="flex justify-between items-center border-b px-4 py-3 sticky top-0 bg-white dark:bg-dim-900 border-gray-200 dark:border-gray-700 border-l border-r">
                        <!-- Title -->
                        <h2 v-if="$slots.header" class="text-gray-800 dark:text-gray-100 font-bold font-sm">
                            <slot name="header" />
                        </h2>
                        <!-- /Title -->

                        <!-- Custom Timeline -->
                        <div>
                            <svg viewBox="0 0 24 24" class="w-5 h-5 text-blue-400" fill="currentColor">
                                <g>
                                    <path
                                        d="M22.772 10.506l-5.618-2.192-2.16-6.5c-.102-.307-.39-.514-.712-.514s-.61.207-.712.513l-2.16 6.5-5.62 2.192c-.287.112-.477.39-.477.7s.19.585.478.698l5.62 2.192 2.16 6.5c.102.306.39.513.712.513s.61-.207.712-.513l2.16-6.5 5.62-2.192c.287-.112.477-.39.477-.7s-.19-.585-.478-.697zm-6.49 2.32c-.208.08-.37.25-.44.46l-1.56 4.695-1.56-4.693c-.07-.21-.23-.38-.438-.462l-4.155-1.62 4.154-1.622c.208-.08.37-.25.44-.462l1.56-4.693 1.56 4.694c.07.212.23.382.438.463l4.155 1.62-4.155 1.622zM6.663 3.812h-1.88V2.05c0-.414-.337-.75-.75-.75s-.75.336-.75.75v1.762H1.5c-.414 0-.75.336-.75.75s.336.75.75.75h1.782v1.762c0 .414.336.75.75.75s.75-.336.75-.75V5.312h1.88c.415 0 .75-.336.75-.75s-.335-.75-.75-.75zm2.535 15.622h-1.1v-1.016c0-.414-.335-.75-.75-.75s-.75.336-.75.75v1.016H5.57c-.414 0-.75.336-.75.75s.336.75.75.75H6.6v1.016c0 .414.335.75.75.75s.75-.336.75-.75v-1.016h1.098c.414 0 .75-.336.75-.75s-.336-.75-.75-.75z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <!-- /Custom Timeline -->
                    </div>
                    <!-- /Header -->

                    <Banner />

                    <div v-if="$page.props.flash.message" class="alert">
                        {{ $page.props.flash.message }}
                    </div>

                    <slot />

                    <!-- /Timeline -->
                </div>
                <!-- /Middle -->

                <!-- Right -->
                <Right />
                <!-- /Right -->

            </div>
        </div>

    </div>
</template>
