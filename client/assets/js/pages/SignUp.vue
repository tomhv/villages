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
  </section>
</template>

<script>
import axios from 'axios';
import { signUp } from '@/services/users';

export default {
  name: 'SignUp',
  data() {
    return {
      username: null,
      email: null,
      error: null,
    };
  },
  methods: {
    handleSubmit() {
      signUp(this.username, this.email)
        .then(response => {
          this.$emit('user-signed-up', {
            username: this.username,
            email: this.email,
            userId: response.data.userId,
          });

          this.email = null;
          this.username = null;
          this.error = null;
        })
        .catch(error => {
          if (error.response) {
            this.error = 'Oh noes! The API isn\'t behaving very well.';
          } else if (error.request) {
            this.error = 'Oh noes! Oh, where has the little API gone?!';
          } else {
            this.error = 'Oh noes! Well that\'s rubbish!';
          }
        })
      ;
    },
  },
};
</script>
