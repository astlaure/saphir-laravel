<template>
    <Teleport to="body">
        <div class="modal fade show" tabIndex="-1" style="display: block; background: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="onCancel"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">{{ message }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary px-4" @click="onCancel">Cancel</button>
                        <button type="button" class="btn btn-primary px-4" @click="onOk">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </Teleport>
</template>

<script setup>
defineProps({
    message: String,
    onCancel: Function,
    onOk: Function,
})
</script>
