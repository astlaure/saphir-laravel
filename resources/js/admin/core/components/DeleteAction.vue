<template>
    <button type="button" class="btn btn-link text-danger text-decoration-none" @click="onOpen">delete</button>
    <ConfirmationDialog v-if="open" message="Delete the element?" :on-ok="onOk" :on-cancel="onCancel" />
</template>

<script setup>
import ConfirmationDialog from './ConfirmationDialog.vue';
import { ref } from 'vue';

const props = defineProps({
    onDelete: Function,
});

const open = ref(false);

function onOpen() {
    open.value = true;
}

function onOk() {
    props.onDelete();
    open.value = false;
}
function onCancel() {
    open.value = false;
}
</script>
