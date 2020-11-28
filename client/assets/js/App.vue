<template>
  <div>
    <header-component />
    <section class="px-4 2xl:px-96">
      <router-view></router-view>
    </section>
  </div>
</template>

<script>
import HeaderComponent from '@/components/Header';

export default {
  name: 'App',
  components: {
    HeaderComponent,
  },
};
</script>
