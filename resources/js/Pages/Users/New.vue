<script setup>
import { router, useForm } from '@inertiajs/vue3';

let form = useForm({
  name: '',
  email: '',
  password: '',
});

let submit = () => {
  form.post('/users');
}
</script>

<template>
  <Head title="New User" />

  <h1 class="text-3xl">Create New User</h1>

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
      <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs mt-1"></div>
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
      <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>
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
      />
      <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>
    </div>
    
    <!-- Submit Button -->
    <div class="mb-6">
      <button  type="submit"
        class="rounded py-2 px-4"
          :class="{
            'bg-blue-400 text-white hover:bg-blue-500 cursor-pointer': !form.processing,
            'bg-gray-400 text-gray-300 cursor-auto': form.processing
          }"
        :disabled="form.processing"
      >Submit</button>
    </div>
  </form>
</template>
