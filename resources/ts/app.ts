


import './bootstrap.ts';


import Vue from 'vue';

import SamplesMainVue from './vue/samples/main.vue';

Vue.component('samples-main-vue', SamplesMainVue);


new Vue({
    el: '#app'
})
