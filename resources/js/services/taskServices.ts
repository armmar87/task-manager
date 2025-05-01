import axios from 'axios';
import { Task } from '@/types/Task';

export const getTasks = async (): Promise<Task[]> => {
    const response = await axios.get('/api/tasks');
    return response.data.data;
};

export async function createTask(task: {
    title: string;
    description: string;
    status: 'pending' | 'in_progress' | 'completed';
}): Promise<Task> {
    const response = await axios.post('/api/tasks', task);
    return response.data.data;
}

export async function getTaskById(id: number): Promise<Task> {
    const response = await axios.get(`/api/tasks/${id}`);
    return response.data.data;
}

export async function updateTask(id: number, task: {
    title: string;
    description: string;
    status: 'pending' | 'in_progress' | 'completed';
}): Promise<Task> {
    const response = await axios.put(`/api/tasks/${id}`, task);
    return response.data.data;
}

export async function deleteTask(id: number): Promise<void> {
    await axios.delete(`/api/tasks/${id}`);
}

