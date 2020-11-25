<template>
  <section class="bg-white p-4 2xl:px-96 border-b border-gray-200">
    <div class="container">
      <h1 class="text-3xl">{{ title }}</h1>
    </div>
  </section>
</template>

<script>
export default {
  name: 'Header',
  props: {
    title: {
      type: String,
      required: true
    }
  },
};
</script>
