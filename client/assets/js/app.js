import '../css/app.css';
import 'tailwindcss/tailwind.css';

import Vue from 'vue';
import Page from './pages/page';

new Vue({
    render:  (h) => h(Page)
}).$mount('#app');
