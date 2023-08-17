import {onMounted, onUnmounted} from "vue";

export function useIntersect(ref, callback, options = {}) {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                callback();
            }
        });
    }, options);

    onMounted(() => {
        observer.observe(ref.value);
    });

    onUnmounted(() => observer.disconnect());
}
