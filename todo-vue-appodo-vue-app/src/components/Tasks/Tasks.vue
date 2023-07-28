<template>
    <div class="card mt-2" v-if="tasks.length && show">
        <ul class="list-group list-group-flush">
            <TasksList v-for="task in tasks" 
            :task="task" 
            :key="task.id" 
            @updated="$event => $emit('updated', $event)"
            @completed="$event => $emit('completed', $event)"
            @removed="$event => $emit('removed', $event)" />
        </ul>
    </div>
</template>

<script setup>
import TasksList from './TasksList.vue';
const props = defineProps({
    tasks: Array,
    show: {
        type: Boolean,
        default:true
    }
})
</script>