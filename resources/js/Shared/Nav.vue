<script>
import NavLink from './NavLink.vue';

export default {
  components: { NavLink },
};
</script>

<template>
  <nav>
    <ul class="flex space-x-4 list-inside">
      <!--
        The href attribute is automatically passed to the NavLink component.
        $page.component is the name of the page component (eg. Home, Settings, Users).
        This is preferable to $page.url, which would fail when URLs append a query string:
        eg. href="/users?id=456" :active="$page.url == '/users'".
        $page.url.startsWith('/users') would work, but $page.component is easier.
        Nb. Home, Users & Settings (between opening / closing NavLink tags)
            are passed to the NavLink component as a slot.
      -->
      <li><NavLink href="/" :active="$page.component == 'Home'">Home</NavLink></li>
      <li><NavLink href="/users" :active="$page.component == 'Users'">Users</NavLink></li>
      <li><NavLink href="/settings" :active="$page.component == 'Settings'">Settings</NavLink></li>
    </ul>
  </nav>
</template>
