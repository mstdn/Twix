<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, Link } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';

let props = defineProps({
    users: Object,
});
</script>

<template>
    <AppLayout title="Users">
        <template #header>
            Users
        </template>

        <div class="columns-1 md:columns-1 lg:columns-1">
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        <tr v-for="profile in users" :key="profile.id">
                            <td>{{ profile.name }}</td>
                            <td>@{{ profile.username }}</td>
                            <td>
                                <!-- <button @click="destroy(profile.id)" class="btn btn-ghost btn-sm" method="post"
                                    type="submit">
                                    Delete
                                </button> -->
                                <Link method="delete" class="btn btn-ghost btn-sm"
                                    :href="route('admin.user.destroy', profile.id)">Delete</Link>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>


    </AppLayout>
</template>
