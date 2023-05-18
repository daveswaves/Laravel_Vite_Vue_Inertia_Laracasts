<script>
export default {
  props: { time: String},
};
</script>

<template>
  <h1 class="text-3xl">Users</h1>

  <p>Scroll down to checkout time and preserve-scroll refresh link.</p>

  <div style="margin-top: 800px;">
    <p>Time: {{ time }}</p>

    <Link
      href="/users"
      class="text-blue-500 hover:underline"
      preserve-scroll
    >Refresh</Link>
  </div>
</template>
