<script>
import Nav from "./Nav.vue";

export default {
  components: { Nav },

  computed: {
    username() {
      return this.$page.props.auth.user.username;
    }
  }
};
</script>

<template>
  <section class="p-6 bg-gray-200">
    <header class="flex justify-between">
      <div class="flex items-center">
        <h1 class="font-bold text-lg">My App</h1>

        <p class="text-sm ml-4">{{ username }}</p>

        <p class="text-m ml-10">[ <b>settings.vue</b> is using an alternative layout - <b>Layout2.vue</b> ]</p>
      </div>
      <Nav />
    </header>
  </section>
  
  <section class="p-6">
    <div class="max-w-7xl mx-auto">
      <slot />
    </div>
  </section>
</template>
