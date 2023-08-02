<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, Link } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';

let props = defineProps({
    posts: Object,
});

// const form = reactive({
// })

// function submit() {
//   router.delete(route('admin.post.destroy'), form)
// }

// const form = useForm();

// function destroy(id) {
//     if (confirm("Are you sure you want to delete?")) {
//         form.delete(route('admin.post.destroy', id));
//     }
// };

</script>

<template>
    <AppLayout title="Home">
        <template #header>
            Home
        </template>

        <div class="columns-1 md:columns-1 lg:columns-1">
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Content</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="post in posts.data" :key="post.id">
                            <td>
                                <div class="badge badge-neutral">
                                    <Link class="hover:underline" :href="route('user.show', { id: post.username })">
                                        {{ post.username }}
                                    </Link>
                                </div>
                            </td>
                            <td>{{ post.description }}</td>
                            <td>
                                <div class="badge badge-xs">{{ post.time }}</div>
                            </td>
                            <td>
                                <!-- <InertiaLink :href="route('post.show', { id: post.id, user: post.username })" class="btn btn-ghost btn-sm">
                                    Show
                                </InertiaLink> -->
                                <!-- <form @submit.prevent="form.delete(route('admin.post.destroy'), post.id)">
                                </form> -->
                                <!-- <button @click="destroy(post.id)" class="btn btn-ghost btn-sm" method="post" type="submit">
                                    Delete
                                </button> -->
                                <!-- <form @submit.prevent="submit(post.id)">
                                    <button type="submit">Submit</button>
                                </form> -->
                                <Link method="delete" class="btn btn-ghost btn-sm"
                                    :href="route('admin.post.destroy', post.id)">Delete</Link>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </AppLayout>
</template>
