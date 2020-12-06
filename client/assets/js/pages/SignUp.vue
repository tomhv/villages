<template>
  <section class="p-2 py-4 2xl:px-96">
    <h1 class="text-3xl">Sign Up</h1>
    <form @submit.prevent="handleSubmit" class="my-4">
      <div class="my-6">
        <label class="block text-sm font-medium text-gray-700 sr-only" for="email">
          Email address
        </label>
        <input
          class="p-4 my-2 mr-2 border rounded border-gray-300"
          type="email"
          placeholder="Enter address..."
          v-model="email"
        />
        <button
          type="submit"
          class="p-4 rounded bg-red-500 text-gray-100 uppercase"
        >
        Sign Up
      </button>
      </div>
    </form>

    <div v-show="userId" class="mt-6">User ID: <strong>{{ userId }}</strong></div>
  </section>
</template>

<script>
import axios from 'axios';

export default {
  name: 'SignUp',
  data() {
    return {
      email: '',
      userId: null,
    };
  },
  methods: {
    async handleSubmit() {
      const signUp = { username: this.$data.email };
      const response = await axios.post('http://localhost:8075/sign-up', signUp);

      this.$data.userId = response.data.userId;
      this.$data.email = '';
    },
  },
};
</script>
