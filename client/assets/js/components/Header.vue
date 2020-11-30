<template>
  <section class="bg-white p-4 2xl:px-96 border-b border-gray-200">
    <div class="container flex justify-between">
      <h1 class="logo text-3xl align-middle">
        <router-link to="/">Villages</router-link>
      </h1>
      <div class="align-middle">
        <router-link class="align-middle" to="/sign-up">Sign Up</router-link>
        <router-link class="align-middle ml-6" to="/sign-in">Sign In</router-link>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'Header',
};
</script>
