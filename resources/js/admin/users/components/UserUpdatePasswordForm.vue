<template>
    <div class="container">
        <form action="#" @submit.prevent="onSubmit">
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
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary px-4">Save</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { reactive, ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();

const props = defineProps({
    user: Object,
});

const errors = ref({});
const form = reactive({
    password: '',
    password_confirmation: '',
});

function onSubmit() {
    axios.patch(`/users/${props.user.id}`, form)
        .then(() => {
            window.dispatchEvent(new CustomEvent('submit-notification', {
                detail: { type: 'success', message: "User's password updated." }
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
