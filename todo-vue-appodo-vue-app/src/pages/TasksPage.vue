<template>
    <main style="min-height: 50vh; margin-top: 2rem;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <!-- Add new Task -->
                      <NewTask @added="handleAddedTask"/>
                    <!-- List of uncompleted tasks -->
                    <!-- <Tasks :tasks="tasks" /> -->
                    <Tasks :tasks="uncompletedTasks" @updated="handleUpdatedTask" @completed="handleCompletedTask" @removed="handleRemovedTask" />
                    <!-- Show toggle button -->
                    <div class="text-center my-3" v-show="showToggleBtn">
                        <button class="btn btn-sm btn-secondary" @click="$event=>showCompletedTasks =!showCompletedTasks">
                            <span v-if="!showCompletedTasks">Show Completed</span>
                             <span v-else>Hide Completed</span>
                        </button>

                    </div>

                    <!-- List of completed tasks -->
                    <Tasks :tasks="completedTasks" :show="completedTasksIsVisible && showCompletedTasks" @updated="handleUpdatedTask" @completed="handleCompletedTask" @removed="handleRemovedTask"/>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>

import { computed, onMounted, ref } from "vue";
import api from "../http/api";
import { allTasks,createTask,updateTask ,completeTask,removeTask} from "../http/task-api";
import Tasks from "../components/Tasks/Tasks.vue"
import NewTask from "../components/Tasks/NewTask.vue";

const tasks = ref([])

onMounted(async () => {
    // const { data } = await api.get('/tasks')
    const { data } = await allTasks();
    console.log(data);
    tasks.value = data.data;
    // tasks.value = data.data.filter(task => task.is_completed);
    //   tasks.value = data.data.filter(task => !task.is_completed);
})
const uncompletedTasks = computed(() => tasks.value.filter(task => !task.is_completed));
const completedTasks = computed(() => tasks.value.filter(task => task.is_completed));
const showToggleBtn = computed(() => uncompletedTasks.value.length > 0 && completedTasks.value.length > 0);
const completedTasksIsVisible = computed(
    () => uncompletedTasks.value.length === 0 || completedTasks.value.length > 0);
const showCompletedTasks = ref(false);

const handleAddedTask = async (newTask) => {
    const { data: createdTask } = await createTask(newTask);
    tasks.value.unshift(createdTask.data);
}
const handleUpdatedTask = async (task) => {
    const { data: updatedTask } = await updateTask(task.id, {
        name: task.name
    });
    const currentTask = tasks.value.find(item => item.id === task.id)
    currentTask.name = updatedTask.data.name
}

const handleCompletedTask = async (task) => {
    const { data: updatedTask } = await completeTask(task.id, {
        is_completed: task.is_completed
    });
    const currentTask = tasks.value.find(item => item.id === task.id)
    currentTask.is_completed = updatedTask.data.is_completed

}
const handleRemovedTask = async (task) => {
    console.log(task.id);
    await removeTask(task.id)
    const index = tasks.value.find(item => item.id === task.id)
    tasks.value.splice(index,1)
}



</script>

