import '../css/app.css';
import 'tailwindcss/tailwind.css';
import '../images/favicon.ico';

import Vue from 'vue';
import VueRouter from 'vue-router';

import App from '@/App';
import HomePage from '@/pages/Home';
import SignUpPage from '@/pages/SignUp';
import SignInPage from '@/pages/SignIn';
import MyProfilePage from '@/pages/MyProfile';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

Vue.use(VueRouter);

Vue.component('font-awesome-icon', FontAwesomeIcon);

const router = new VueRouter({
  routes: [
    { path: '/', component: HomePage },
    { path: '/sign-up', component: SignUpPage },
    { path: '/sign-in', component: SignInPage },
    { path: '/profile', component: MyProfilePage },
  ]
});

new Vue({
  router,
    render: (h) => h(App)
}).$mount('#app');
