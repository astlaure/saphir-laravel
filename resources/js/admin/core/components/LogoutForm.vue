<template>
    <form action="#" @submit.prevent="onSubmit">
        <button type="submit" class="btn btn-link nav-link text-white">Logout</button>
    </form>
</template>

<script setup>
import axios from 'axios';

function onSubmit() {
    axios.post('/logout', {}, { baseURL: '/' })
        .then(response => window.location.href = response.data.redirect)
        .catch(() => {});
}
</script>
