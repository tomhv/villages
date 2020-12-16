<template>
  <div>
    <header-component
      :isAuthenticated="isAuthenticated"
      :user="user"
      :versionNumber="versionNumber"
      @user-signed-out="onUserSignedOut"
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
import { me } from '@/services/users';

export default {
  name: 'App',
  data() {
    return {
      user: null,
      versionNumber: '0.4.0',
    };
  },
  components: {
    HeaderComponent,
  },
  computed: {
    isAuthenticated() {
      return (
        this.user !== null
      );
    }
  },
  created() {
    me()
      .then(response => {
        if (response.data.username) {
          this.$data.user = {
            username: response.data.username,
          };
        }
      })
    ;
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
    onUserSignedOut(payload) {
      this.$data.user = null;

      window.location.href = '/identity/sign-out';
    },
  }
};
</script>
