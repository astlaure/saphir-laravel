<template>
    <div class="notification-center">
        <Notification v-for="(notification, index) in notifications" :index="index" :notification="notification" :on-close="handleClose" />
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import Notification from './Notification.vue';

const notifications = ref([]);

function addNotification(event) {
    notifications.value.push(event.detail);
}

function handleClose(index) {
    const result = [...notifications.value];
    result.splice(index, 1);
    notifications.value = result;
}

onMounted(() => {
    window.addEventListener('submit-notification', addNotification);

    return () => {
        window.removeEventListener('submit-notification', addNotification);
    };
})
</script>

<style lang="scss">
.notification-center {
    position: fixed;
    right: 0;
    z-index: 1000;
    width: 24em;
    padding: 1rem;
}
</style>
