<template>
    <div>
        
    </div>
</template>
<script setup>
import {usePage} from '@inertiajs/inertia-vue3';
import {computed, ref, watch} from 'vue';

const isToastActive = ref(false);

const triggerToast = computed(() => {
  let ret = usePage().props.value.toast;
  if (undefined !== ret) {

    isToastActive.value = true;
    setTimeout(function() {
      isToastActive.value = false;
    }, 3000);
  }
});
</script>
