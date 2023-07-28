<template>
    <div class="task-actions">
        <button class="btn btn-sm btn-circle btn-outline-secondary me-1" @click="$event =>emit('edit')">
            <IconPencil />
        </button>
        <button class="btn btn-sm btn-circle btn-outline-danger" @click="$event => emit('remove')">
            <TrashIcon />
        </button>
    </div>
</template>

<script setup>
import IconPencil from '../icons/IconPencil.vue';
import TrashIcon from '../icons/TrashIcon.vue';


const emit =defineEmits(['edit', 'remove']);
</script>