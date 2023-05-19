<script>
export default {
  props: {
    links: Array
  }
};
</script>

<template>
  <div>
    <Component
      :is="link.url ? 'Link' : 'span'"
      v-for="link in links"
      :href="link.url"
      v-html="link.label"
      class="px-1"
      :class="{ 'text-gray-400': ! link.url, 'font-bold' : link.active }"
    />
  </div>
</template>
