import { ref } from 'vue';
import { createTask } from '@/services/taskService';
import type { Task } from '@/types/Task';

export function useCreateTask() {
    const loading = ref(false);
    const error = ref<string | null>(null);

    const submit = async (task: {
        title: string;
        description: string;
        status: 'pending' | 'in_progress' | 'completed';
    }): Promise<Task | null> => {
        loading.value = true;
        error.value = null;

        try {
            const newTask = await createTask(task);
            return newTask;
        } catch (e: any) {
            error.value = e?.response?.data?.message ?? 'Error creating task';
            return null;
        } finally {
            loading.value = false;
        }
    };

    return {
        submit,
        loading,
        error,
    };
}
