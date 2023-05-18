<script setup>
const props = defineProps({ users: Array });
</script>

<template>
  <Head title="Users" />
  
  <h1 class="text-3xl">Users</h1>

  <ul>
    <li v-for="user in users" :key="user.id" v-text="user.name"></li>
  </ul>
</template>
