<template>
  <div>
    <header-component
      :isAuthenticated="isAuthenticated"
      :user="user"
    />
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
  data() {
    return {
      user: null,
    };
  },
  components: {
    HeaderComponent,
  },
  computed: {
    isAuthenticated() {
      return (
        this.user !== null &&
        this.user.token !== null
      );
    }
  },
  methods: {
    onUserSignedUp(payload) {
      this.user = {
        username: payload.username,
        id: payload.userId,
        token: payload.userId,
      };

      this.$router.push('/profile')
    },
  }
};
</script>
