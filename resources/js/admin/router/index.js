import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../core/Dashboard.vue';
import UserList from '../users/UserList.vue';
import UserCreate from '../users/UserCreate.vue';
import UserUpdate from '../users/UserUpdate.vue';

export const router = createRouter({
    history: createWebHistory(window.saphir.basename),
    routes: [
        { path: '/', component: Dashboard },

        { path: '/users', component: UserList },
        { path: '/users/create', component: UserCreate },
        { path: '/users/update/:id', component: UserUpdate },
    ],
});
