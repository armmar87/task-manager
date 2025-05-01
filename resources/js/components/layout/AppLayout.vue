<template>
    <div>
        <!-- Navigation -->
        <header class="bg-gray-800 text-white p-4 flex justify-between items-center shadow">
            <h1 class="text-lg font-semibold">Task Manager</h1>
            <nav class="space-x-4">
                <RouterLink to="/" class="hover:underline">Առաջադրանքներ</RouterLink>
                <RouterLink to="/tasks/create" class="hover:underline">Ստեղծել</RouterLink>
            </nav>
        </header>

        <!-- Main content -->
        <main class="p-6 max-w-4xl mx-auto">
            <RouterView />
        </main>
    </div>
</template>

<script setup lang="ts">
import { RouterView, RouterLink } from 'vue-router';
</script>
