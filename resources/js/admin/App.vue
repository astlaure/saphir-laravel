<template>
    <NotificationCenter/>
    <aside class="sidebar p-4 vh-100 d-flex flex-column">
        <h3 class="text-center text-uppercase text-white my-4">Factoria</h3>
        <hr class="border-white"/>
        <ul class="nav flex-column">
            <li class="nav-item">
                <router-link to="/" class="nav-link text-white">Dashboard</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/users" class="nav-link text-white">Users</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/users" class="nav-link text-white">Documents</router-link>
            </li>
        </ul>
        <ul class="nav flex-column mt-auto">
            <li class="nav-item">
                <LogoutForm />
            </li>
        </ul>
    </aside>
    <main class="content p-4">
        <router-view />
    </main>
</template>

<script setup>
import LogoutForm from './core/components/LogoutForm.vue';
import NotificationCenter from './core/components/NotificationCenter.vue';
</script>

<style lang="scss">
.sidebar {
    width: 18em;
    background: var(--bs-dark);
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
}

.content {
    margin-left: 18em;
}
</style>
