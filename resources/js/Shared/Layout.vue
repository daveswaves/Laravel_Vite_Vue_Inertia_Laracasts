<script>
import Nav from "./Nav.vue";

export default {
  components: { Nav },
  
  computed: {
    /*
      username() returns the namespaced 'username' value,
      set in the 'Middleware/HandleInertiaRequests.php' file.
      Doing so makes it globally available to all pages within the project.
      Nb. We could reference the value directly like so ('this' not required):
      {{ $page.props.auth.user.username }}
    */
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
