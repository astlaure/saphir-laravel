<template>
    <div class="center-position">
        <div class="spinner-border text-primary spinner-lg" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</template>

<script setup></script>

<style lang="scss">
.center-position {
    transform: translate(-50%, -50%);
    position: fixed;
    top: 50%;
    left: calc(50% + 9em);
}

.spinner-lg {
    width: 5rem;
    height: 5rem;
    border-width: 0.5rem;
}
</style>
