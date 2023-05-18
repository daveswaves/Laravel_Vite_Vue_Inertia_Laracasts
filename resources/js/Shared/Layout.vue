<script>
import Nav from "./Nav.vue";

export default {
  components: { Nav },
};
</script>

<template>
  <section class="p-6 bg-gray-200">
    <header class="flex justify-between">
      <h1 class="font-bold text-lg">My App</h1>
      <Nav />
    </header>
  </section>
  
  <section class="p-6">
    <div class="max-w-7xl mx-auto">
      <slot />
    </div>
  </section>
</template>
