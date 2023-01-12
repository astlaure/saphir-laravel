<template>
    <div class="alert alert-dismissible fade show" :class="`alert-${notification.type}`">
        {{notification.message}}
        <button type="button" class="btn-close" aria-label="Close" @click="() => onClose(index)"></button>
    </div>
</template>

<script setup>
import { onMounted } from 'vue';

const props = defineProps({
    notification: Object,
    index: Number,
    onClose: Function,
});

onMounted(() => {
    setTimeout(() => {
        props.onClose(props.index);
    }, 5000);
});
</script>
