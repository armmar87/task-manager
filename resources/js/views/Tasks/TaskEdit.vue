<template>
    <div>
        <h2 class="text-xl font-semibold mb-4">Խմբագրել առաջադրանքը</h2>
        <div v-if="loading">Բեռնվում է...</div>
        <div v-else-if="task">
            <form @submit.prevent="handleSubmit" class="space-y-4">
                <input v-model="form.title" type="text" placeholder="Վերնագիր" class="w-full border p-2" />
                <textarea v-model="form.description" placeholder="Նկարագրություն" class="w-full border p-2" />
                <select v-model="form.status" class="w-full border p-2">
                    <option value="pending">Սպասման մեջ</option>
                    <option value="in_progress">Ընթացքի մեջ</option>
                    <option value="completed">Ավարտված</option>
                </select>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Թարմացնել</button>
                <div v-if="error" class="text-red-500">{{ error }}</div>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, watch } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { useEditTask } from '@/composables/useEditTask';

const route = useRoute();
const router = useRouter();
const id = Number(route.params.id);

const { task, loading, error, submit } = useEditTask(id);

const form = ref({
    title: '',
    description: '',
    status: 'pending',
});

watch(task, (val) => {
    if (val) {
        form.value = {
            title: val.title,
            description: val.description,
            status: val.status,
        };
    }
});

const handleSubmit = async () => {
    const updated = await submit(form.value);
    if (updated) {
        alert('Առաջադրանքը թարմացվեց հաջողությամբ!');
        router.push('/');
    }
};
</script>
