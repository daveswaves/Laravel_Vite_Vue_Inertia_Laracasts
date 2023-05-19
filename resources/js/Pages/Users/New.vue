<script setup>
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3'

/* 
  Replace: import { Inertia } from '@inertia/inertia'
  with:    import { router } from '@inertiajs/vue3'

  Use router.get() or router.post()
  instead of Inertia.get() or Inertia.post()

  https://stackoverflow.com/questions/75535328/failed-to-resolve-import-inertia-inertia-from-resources-js-pages-dashboard-v
*/

let form = reactive({
  name: '',
  email: '',
  password: '',
});

let submit = () => {
  router.post('/users', form);
}
</script>

<template>
  <Head title="New User" />

  <h1 class="text-3xl">Create New User</h1>

  <!-- Prevent default form submit and call submit method in script section above. -->
  <form autocomplete="off" @submit.prevent="submit" class="max-w-md mx-auto mt-8">
    
    <!-- Name -->
    <div class="mb-6">
      <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
      <input v-model="form.name" type="text" name="name" id="name" autocomplete="off"
        class="
          border
          border-gray-400
          outline-none
          focus:ring
          p-2
          w-full
          rounded-md"
        required
      />
    </div>
    
    <!-- Email -->
    <div class="mb-6">
      <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
      <input v-model="form.email" type="email" name="email" id="email" autocomplete="off"
        class="
          border
          border-gray-400
          outline-none
          focus:ring
          p-2
          w-full
          rounded-md"
        required
      />
    </div>
    
    <!-- Password -->
    <div class="mb-6">
      <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
      <input v-model="form.password" type="password" name="password" id="password" autocomplete="new-password"
        class="
          border
          border-gray-400
          outline-none
          focus:ring
          p-2
          w-full
          rounded-md"
        required
      />
    </div>
    
    <!-- Submit Button -->
    <div class="mb-6">
      <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 cursor-pointer">Submit</button>
    </div>
  </form>
</template>
