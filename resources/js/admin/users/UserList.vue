<template>
    <Spinner v-if="loading"/>

    <h3 v-if="errors" class="text-center mt-4">Cannot load the data</h3>

    <div v-if="!loading" class="container">
        <div class="card border-0 shadow mt-4 mw-50e mx-auto">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <router-link to="/users/create" className="btn btn-outline-primary text-decoration-none px-4">Create user</router-link>
                    <div class="d-flex">
                        <button v-if="userPage.previous" type="button" class="btn btn-link" @click="decrementPage">Prev</button>
                        <span v-else class="btn btn-link disabled text-secondary">Prev</span>
                        <button v-if="userPage.next" type="button" class="btn btn-link" @click="incrementPage">Next</button>
                        <span v-else class="btn btn-link disabled text-secondary">Next</span>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="user in userPage.data" class="align-middle">
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                            <router-link :to="`/users/update/${user.id}`" class="btn btn-link text-secondary text-decoration-none">update</router-link>
                            <DeleteAction :on-delete="() => deleteItem(user.id)" />
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import axios from 'axios';
import DeleteAction from '../core/components/DeleteAction.vue';
import Spinner from '../core/components/Spinner.vue';

const loading = ref(true);
const errors = ref(false);
const userPage = ref({
    current: 1,
    next: null,
    previous: null,
    data: [],
});
const page = ref(1);

function incrementPage() {
    page.value++;
    fetchData();
}

function decrementPage() {
    page.value--;
    fetchData();
}

function deleteItem(id) {
    axios.delete(`/users/${id}`)
        .then(() => {
            fetchData();
            window.dispatchEvent(new CustomEvent('submit-notification', {
                detail: { type: 'success', message: 'User deleted.' }
            }));
        })
        .catch(() => {
            window.dispatchEvent(new CustomEvent('submit-notification', {
                detail: { type: 'danger', message: 'The requested action failed.' }
            }));
        });
}

function fetchData() {
    axios.get(`/users?page=${page.value}`)
        .then(response => {
            const { current_page, data, next_page_url, prev_page_url } = response.data;
            userPage.value = {
                current: current_page,
                next: next_page_url,
                previous: prev_page_url,
                data,
            };
        })
        .catch(() => errors.value = true)
        .finally(() => loading.value = false);
}

onMounted(() => {
    fetchData();
})
</script>
