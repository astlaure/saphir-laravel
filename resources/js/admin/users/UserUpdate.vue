<template>
    <Spinner v-if="loading"/>

    <h3 v-if="errors" class="text-center mt-4">Cannot load the data</h3>

    <div v-if="!loading" class="container">
        <div class="card border-0 shadow mt-4 mw-50e mx-auto">
            <div class="card-body">
                <UserUpdateForm :user="data" />
            </div>
        </div>
        <div class="card border-0 shadow mt-4 mw-50e mx-auto">
            <div class="card-body">
                <UserUpdatePasswordForm :user="data" />
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import axios from 'axios';
import UserUpdatePasswordForm from './components/UserUpdatePasswordForm.vue';
import UserUpdateForm from './components/UserUpdateForm.vue';
import { useRoute } from 'vue-router';
import Spinner from '../core/components/Spinner.vue';

const route = useRoute();

const loading = ref(true);
const errors = ref(false);
const data = ref([]);

onMounted(() => {
    axios.get(`/users/${route.params.id}`)
        .then(response => data.value = response.data)
        .catch(() => errors.value = true)
        .finally(() => loading.value = false);
})
</script>
