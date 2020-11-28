<template>
  <section class="p-4 2xl:px-96">
    <h1 class="text-3xl">Sign Up</h1>
    <form @submit.prevent="handleSubmit" class="my-4">
      <div class="my-6">
        <label class="block text-sm font-medium text-gray-700 sr-only" for="email">
          Email address
        </label>
        <input
          class="p-4 my-2 border rounded border-gray-300"
          type="email"
          placeholder="Enter address..."
          v-model="email"
        />
        <button
          type="submit"
          class="ml-2 p-4 rounded bg-red-500 text-gray-100 uppercase"
        >
        Sign Up
      </button>
      </div>
    </form>

    <div v-show="submitted" class="mt-6">Submitted email address: <strong>{{ submitted }}</strong></div>
  </section>
</template>

<script>
export default {
  name: 'SignUp',
  data() {
    return {
      email: '',
      submitted: '',
    };
  },
  methods: {
    handleSubmit() {
      this.$data.submitted = this.$data.email;
      this.$data.email = '';
    },
  },
};
</script>
