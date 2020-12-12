<template>
  <div>
    <header-component />
    <section class="px-4 2xl:px-96">
      <router-view
        @user-signed-up="onUserSignedUp"
      />
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
  methods: {
    onUserSignedUp(payload) {
      console.log('Listening to user-signed-up');
      console.log(payload);
    },
  }
};
</script>
