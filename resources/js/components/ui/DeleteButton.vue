<template>
    <button
        @click="handleClick"
        class="text-red-600 hover:underline text-sm"
    >
        Ջնջել
    </button>
</template>

<script setup lang="ts">
const emit = defineEmits<{
    (e: 'confirm'): void;
}>();

function handleClick() {
    if (confirm('Վստա՞հ եք, որ ուզում եք ջնջել այս առաջադրանքը։')) {
        emit('confirm');
    }
}
</script>
