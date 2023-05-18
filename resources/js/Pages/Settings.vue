<script>
// Uses a different layout to the default used by the other pages.
import Layout from "../Shared/Layout2.vue";

export default {
  /* 
  Use persistent layout.
  Previously <Layout> was a child of the current page (Home.vue).
  Now, the current page (Home.vue) is a child of <Layout>
  This is useful if you have a podcast player, for example, in
  the header or footer. Selecting a new page won't reset the player.
  */
  layout: Layout
};
</script>

<template>
  <h1 class="text-3xl">Settings</h1>
</template>
