<script setup>
// import TasksPage from './pages/TasksPage.vue';
import Footer from './components/Footer.vue';
import NavBar from './components/NavBar.vue';
</script>

<template>
  <NavBar/>
  <!-- <TasksPage/> -->
   <RouterView v-slot="{Component}">
    <Transition name="fade" mode="out-in">
   <component :is="Component"/>
    </Transition>
   </RouterView>
  <Footer></Footer>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
