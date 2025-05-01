<template>
    <form @submit.prevent="handleSubmit" class="max-w-md space-y-4">
        <div>
            <label>Վերնագիր</label>
            <input v-model="form.title" type="text" class="border p-2 w-full" required />
        </div>
        <div>
            <label>Նկարագրություն</label>
            <textarea v-model="form.description" class="border p-2 w-full" required></textarea>
        </div>
        <div>
            <label>Վիճակ</label>
            <select v-model="form.status" class="border p-2 w-full">
                <option value="pending">Սպասման մեջ</option>
                <option value="in_progress">Ընթացքի մեջ</option>
                <option value="completed">Ավարտված</option>
            </select>
        </div>
        <button type="submit" :disabled="loading" class="bg-blue-600 text-white px-4 py-2 rounded">
            Ստեղծել
        </button>
        <div v-if="error" class="text-red-500 mt-2">{{ error }}</div>
    </form>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { useCreateTask } from '@/composables/useCreateTask';

const { submit, loading, error } = useCreateTask();

const form = ref({
    title: '',
    description: '',
    status: 'pending',
});

const handleSubmit = async () => {
    const newTask = await submit(form.value);
    if (newTask) {
        alert('Առաջադրանքը ստեղծվեց հաջողությամբ!');
        form.value = { title: '', description: '', status: 'pending' };
    }
};
</script>
