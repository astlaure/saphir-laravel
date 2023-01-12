<template>
    <div class="container">
        <div class="card border-0 shadow mt-4 mw-50e mx-auto">
            <div class="card-body">
                <form action="#" @submit.prevent="onSubmit">
                    <div class="mb-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" class="form-control" :class="{'is-invalid': errors.name}" v-model="form.name" />
                        <div v-if="errors.name" class="invalid-feedback">{{ errors.name[0] }}</div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" :class="{'is-invalid': errors.email}" v-model="form.email" />
                        <div v-if="errors.email" class="invalid-feedback">{{ errors.email[0] }}</div>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" :class="{'is-invalid': errors.password}" v-model="form.password" />
                        <div v-if="errors.password" class="invalid-feedback">{{ errors.password[0] }}</div>
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Password Confirmation</label>
                        <input type="password" id="password_confirmation" class="form-control" :class="{'is-invalid': errors.password_confirmation}" v-model="form.password_confirmation" />
                        <div v-if="errors.password_confirmation" class="invalid-feedback">{{ errors.password_confirmation[0] }}</div>
                    </div>
                    <div class="mb-4">
                        <label for="role" class="form-label">Role</label>
                        <select id="role" class="form-select" :class="{'is-invalid': errors.role}" v-model="form.role">
                        <option value="admin">Admin</option>
                        <option value="client">Client</option>
                        </select>
                        <div v-if="errors.role" class="invalid-feedback">{{ errors.role[0] }}</div>
                    </div>
                    <div class="mb-4 form-check">
                        <input type="checkbox" id="enabled" class="form-check-input" :class="{'is-invalid': errors.enabled}" v-model="form.enabled" />
                        <label for="enabled" class="form-check-label">Enabled</label>
                        <div v-if="errors.enabled" class="invalid-feedback">{{ errors.enabled[0] }}</div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <router-link to="/users" class="btn btn-link">Back to users</router-link>
                        <button type="submit" class="btn btn-primary px-4">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive, ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();

const errors = ref({});
const form = reactive({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    role: 'client',
    enabled: true,
});

function onSubmit() {
    axios.post('/users', form)
        .then(() => {
            window.dispatchEvent(new CustomEvent('submit-notification', {
                detail: { type: 'success', message: 'User created.' }
            }));
            router.push('/users');
        })
        .catch(err => {
            if (err.response.status === 422) {
                errors.value = err.response.data.errors;
            }
        });
}
</script>
