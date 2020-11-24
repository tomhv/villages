import '../css/app.css';
import Vue from 'vue';
import Page from './page';

new Vue({
    render:  (h) => h(Page)
}).$mount('#app');
