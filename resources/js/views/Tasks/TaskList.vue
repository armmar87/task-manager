<template>
    <div class="p-4">
        <h2 class="text-xl font-bold mb-4">Առաջադրանքներ</h2>
        <ul>
            <li v-for="task in tasks" :key="task.id" class="p-2 border mb-2 rounded">
                {{ task.title }} - {{ task.status }}
                <!-- Կոճակ Task-ի համար -->
                <DeleteButton @confirm="() => handleDelete(task.id)" />
            </li>
        </ul>
    </div>
</template>

<script setup lang="ts">
import { useTasks } from '@/composables/useTasks';
import DeleteButton from '@/components/ui/DeleteButton.vue';

const { tasks } = useTasks();

</script>

