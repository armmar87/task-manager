import { ref, onMounted } from 'vue';
import { getTasks, deleteTask } from '@/services/taskService';
import type { Task } from '@/types/Task';


export function useTasks() {
    const tasks = ref<Task[]>([]);
    const loading = ref<boolean>(false);

    const fetchTasks = async () => {
        loading.value = true;
        try {
            tasks.value = await getTasks();
        } finally {
            loading.value = false;
        }
    };

    onMounted(fetchTasks);

    return {
        tasks,
        loading,
        fetchTasks,
    };
}
const handleDelete = async (id: number) => {
    try {
        await deleteTask(id);
        alert('Առաջադրանքը ջնջվեց հաջողությամբ։');
        tasks.value = tasks.value.filter((t) => t.id !== id);
    } catch (e) {
        alert('Ջնջելու ընթացքում սխալ տեղի ունեցավ։');
    }
};


