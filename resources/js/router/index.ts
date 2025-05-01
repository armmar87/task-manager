import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router';
import TaskList from '@/views/Tasks/TaskList.vue';
import TaskForm from '@/views/Tasks/TaskForm.vue';
import TaskEdit from '@/views/Tasks/TaskEdit.vue';

const routes: RouteRecordRaw[] = [
    {
        path: '/',
        name: 'tasks',
        component: TaskList,
    },
    {
        path: '/asks/create',
        name: 'create-task',
        component: TaskForm,
    },
    {
        path: '/tasks/:id/edit',
        name: 'edit-task',
        component: TaskEdit
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
