<template>
  <section class="p-2 py-4">
    <h1 class="text-3xl">Sign Up</h1>
    <p class="my-4">
      This application is in its VERY early stages of development.<br />
      Please do not enter your email address unless you have been instructed to by Tom.<br />
      There should be no expectation of privacy.<br />
      Any data entered will be deleted periodically and often without warning.
    </p>
    <div v-show="error" class="my-4 p-4 border border-red-300 rounded bg-red-200">{{ error }}</div>
    <form @submit.prevent="handleSubmit" class="my-4">
      <div class="my-2">
        <label class="block text-sm font-medium text-gray-700 sr-only" for="username">
          Username
        </label>
        <input
          class="p-4 my-2 mr-2 border rounded border-gray-300"
          type="text"
          placeholder="Enter username..."
          v-model="username"
        />
      </div>
      <div class="my-2">
        <label class="block text-sm font-medium text-gray-700 sr-only" for="email">
          Email address
        </label>
        <input
          class="p-4 my-2 mr-2 border rounded border-gray-300"
          type="email"
          placeholder="Enter address..."
          v-model="email"
        />
      </div>
      <div class="my-2">
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
      username: null,
      email: null,
      userId: null,
      error: null,
    };
  },
  methods: {
    handleSubmit() {
      let host = 'http://localhost:8075';

      if ('production' == process.env.NODE_ENV) {
        host = 'https://api.villages.tomhv.uk';
      }

      axios
        .post(host + '/sign-up,', {
          username: this.$data.username,
          email: this.$data.email,
        })
        .then(response => {
          this.$data.userId = response.data.userId;
          this.$data.email = null;
          this.$data.username = null;
          this.$data.error = null;
        })
        .catch(error => {
          if (error.response) {
            this.$data.error = 'Oh noes! The API isn\'t behaving very well.';
          } else if (error.request) {
            this.$data.error = 'Oh noes! Oh, where has the little API gone?!';
          } else {
            this.$data.error = 'Oh noes! Well that\'s rubbish!';
          }
        })
      ;
    },
  },
};
</script>
