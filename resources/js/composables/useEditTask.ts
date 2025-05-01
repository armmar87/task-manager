import { ref, onMounted } from 'vue';
import { getTaskById, updateTask } from '@/services/taskService';
import type { Task } from '@/types/Task';

export function useEditTask(id: number) {
    const task = ref<Task | null>(null);
    const loading = ref(false);
    const error = ref<string | null>(null);

    const fetch = async () => {
        loading.value = true;
        try {
            task.value = await getTaskById(id);
        } catch (e: any) {
            error.value = e?.response?.data?.message ?? 'Չհաջողվեց բեռնել';
        } finally {
            loading.value = false;
        }
    };

    const submit = async (data: {
        title: string;
        description: string;
        status: Task['status'];
    }): Promise<Task | null> => {
        try {
            return await updateTask(id, data);
        } catch (e: any) {
            error.value = e?.response?.data?.message ?? 'Չհաջողվեց թարմացնել';
            return null;
        }
    };

    onMounted(fetch);

    return { task, loading, error, submit };
}
