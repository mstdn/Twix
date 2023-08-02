<template>
    <div>
        <div class="
          border-b border-gray-200
          dark:border-dim-200
          pb-4
          border-l border-r
        ">
            <form @submit.prevent="submit()">

                <div class="flex flex-shrink-0 p-4 pb-0">
                    <div class="w-12 flex items-top">
                        <img class="inline-block h-10 w-10 rounded-full" :src="$page.props.auth.user.profile_photo_url"
                            alt="" />
                    </div>
                    <div class="w-full p-2">
                        <textarea :maxHeight="300" v-model="form.description" name="description" id="description" class="
                            dark:text-white
                            text-gray-900
                            placeholder-gray-400
                            w-full
                            h-12
                            bg-transparent
                            border-0
                            focus:outline-none
                            borborder-transparent focus:border-transparent focus:ring-0
                            resize-none
                        " placeholder="What's happening?"></textarea>
                        <div class="flex text-sm text-red-500" v-if="$page.props.errors.description">{{
                            $page.props.errors.description }}</div>
                    </div>
                </div>
                <div class="w-full flex items-top p-2 text-white pl-14">
                    <label>
                        <file-input @input="uploadMedia"></file-input>
                    </label>

                    <label>
                        <!-- <div class="
                                    text-blue-400
                                    hover:bg-blue-50
                                    dark:hover:bg-dim-800
                                    rounded-full
                                    p-2
                                ">
                            <svg viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor">
                                <g>
                                    <path
                                        d="M19 10.5V8.8h-4.4v6.4h1.7v-2h2v-1.7h-2v-1H19zm-7.3-1.7h1.7v6.4h-1.7V8.8zm-3.6 1.6c.4 0 .9.2 1.2.5l1.2-1C9.9 9.2 9 8.8 8.1 8.8c-1.8 0-3.2 1.4-3.2 3.2s1.4 3.2 3.2 3.2c1 0 1.8-.4 2.4-1.1v-2.5H7.7v1.2h1.2v.6c-.2.1-.5.2-.8.2-.9 0-1.6-.7-1.6-1.6 0-.8.7-1.6 1.6-1.6z">
                                    </path>
                                    <path
                                        d="M20.5 2.02h-17c-1.24 0-2.25 1.007-2.25 2.247v15.507c0 1.238 1.01 2.246 2.25 2.246h17c1.24 0 2.25-1.008 2.25-2.246V4.267c0-1.24-1.01-2.247-2.25-2.247zm.75 17.754c0 .41-.336.746-.75.746h-17c-.414 0-.75-.336-.75-.746V4.267c0-.412.336-.747.75-.747h17c.414 0 .75.335.75.747v15.507z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <input name="video" id="video" type="file" @input="form.video = $event.target.files[0]"
                            style="display: none" /> -->
                        <video-input @input="uploadVideo"></video-input>
                    </label>

                    <p class="p-2 text-gray-400 text-sm" :class="{ 'text-red-600 dark:text-red-600': remainingChars < 0 }">
                        {{ remainingChars }}/500</p>
                    <button type="submit" v-if="!loading" :disabled="form.processing" class="
                        bg-blue-400
                        hover:bg-blue-500
                        text-white
                        rounded-full
                        py-1
                        px-4
                        ml-auto
                        mr-1
                        ">
                        <span class="font-bold text-sm">Meow</span>
                    </button>
                </div>

                <div v-if="media.length" class="grid gap-2" :class="{ 'grid-cols-2': media.length > 1 }">
                    <div class="relative flex flex-col items-center justify-center" v-for="(item, index) in media">
                        <button @click="removeMedia(index, item)" type="button"
                            class="m-1 absolute top-0 left-0 text-white bg-black bg-opacity-50 rounded-full cursor-pointer hover:bg-opacity-100 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                        <img :src="item.url" class="rounded-xl object-cover w-full h-48" />
                        <div class="absolute bg-black bg-opacity-75 text-sm rounded px-2 text-white" v-if="item.loading">
                            Loading..</div>
                    </div>
                </div>

                <div v-if="video.length" class="grid gap-2">
                    <div class="relative flex flex-col items-center justify-center" v-for="(item, index) in video">
                        <button @click="removeVideo(index, item)" type="button"
                            class="m-1 absolute top-0 left-0 text-white bg-black bg-opacity-50 rounded-full cursor-pointer hover:bg-opacity-100 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                        <vue-plyr :options="options">
                            <video controls crossorigin playsinline loop>
                                <source size="720" :src="item.url" type="video/mp4" />
                            </video>
                        </vue-plyr>
                        <div class="absolute bg-black bg-opacity-75 text-sm rounded px-2 text-white" v-if="item.loading">
                            Loading..</div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import FileInput from "./FileInput.vue";
import VideoInput from "./VideoInput.vue";

export default {
    data() {
        return {
            loading: false,
            form: {
                description: "",
                videoIds: [],
                mediaIds: []
            },
            media: [],
            video: [],
        };
    },
    methods: {
        removeMedia(index, item) {
            this.media.splice(index, 1);

            if (item.id) {
                axios.delete(`media/${item.id}`)
                    .catch((e) => {
                        console.log(e);
                        this.media.splice(index, 0, item);
                    });
            }
        },
        removeVideo(index, item) {
            this.video.splice(index, 1);

            if (item.id) {
                axios.delete(`video/${item.id}`)
                    .catch((e) => {
                        console.log(e);
                        this.video.splice(index, 0, item);
                    });
            }
        },
        submit() {
            this.form.mediaIds = this.media.map(item => item.id);
            this.form.videoIds = this.video.map(item => item.id);
            this.$inertia.post(`/upload`, this.form, {
                preserveState: true,
                onStart: () => this.loading = true,
                onFinish: () => this.loading = false,
                onSuccess: () => {
                    if (Object.keys(this.$page.props.errors).length === 0) {
                        this.form = { description: '', mediaIds: [], videoIds: [] };
                        this.media = [];
                        this.video = [];
                        //this.isOpen.value = false;
                    }
                }
            });
        },
        uploadMedia(files) {
            Array.from(files).forEach((media) => {
                let reader = new FileReader();
                reader.readAsDataURL(media);

                reader.onload = (e) => {
                    let item = {
                        url: e.target.result,
                        id: undefined,
                        loading: true
                    }

                    let formData = new FormData();
                    formData.append('file', media);
                    axios.post('media', formData)
                        .then(({ data }) => {
                            item.id = data.id
                        }).finally(() => item.loading = false);

                    this.media.push(item);
                }
            })
        },
        uploadVideo(files) {
            Array.from(files).forEach((video) => {
                let reader = new FileReader();
                reader.readAsDataURL(video);

                reader.onload = (e) => {
                    let item = {
                        url: e.target.result,
                        id: undefined,
                        loading: true
                    }

                    let formData = new FormData();
                    formData.append('file', video);
                    axios.post('video', formData)
                        .then(({ data }) => {
                            item.id = data.id
                        }).finally(() => item.loading = false);

                    this.video.push(item);
                }
            })
        }
    },
    computed: {
        remainingChars() {
            return 500 - this.form.description.length;
        },
        canSubmit() {
            return this.form.description.length && this.remainingChars >= 0 && this.media.every(item => !item.loading);
        }
    },
    components: { FileInput, VideoInput }
}
</script>
<style scoped>
button:disabled {
    opacity: 75%;
    cursor: not-allowed;
}
</style>