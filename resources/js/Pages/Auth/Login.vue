<script>
export default {
  layout: null,
}
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';

let form = useForm({
  email: '',
  password: '',
});

let submit = () => {
  form.post('/login');
}
</script>

<template>
  <Head title="Login Page" />

  <main class="grid place-items-center min-h-screen">
    <section class="bg-white p-8 rounded-xl max-w-md mx-auto border border-gray-300">
      <h1 class="text-3xl mb-6">Login</h1>

      <form autocomplete="off" @submit.prevent="submit">
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
          >Log In</button>
        </div>
      </form>
    </section>
  </main>
</template>