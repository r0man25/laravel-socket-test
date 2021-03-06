import Vue from "vue";

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = Vue;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('prop-component', require('./components/PropComponent.vue').default);
Vue.component('ajax-component', require('./components/AjaxComponent.vue').default);
Vue.component('line-chart-component', require('./components/LineChartComponent.vue').default);
Vue.component('pie-chart-component', require('./components/PieChartComponent.vue').default);
Vue.component('line-random-chart-component', require('./components/LineChartRandomComponent.vue').default);
Vue.component('line-socket-chart-component', require('./components/LineChartSocketComponent.vue').default);
Vue.component('socket-chat-component', require('./components/SocketChatComponent.vue').default);
Vue.component('socket-private-chat-component', require('./components/SocketPrivateChatComponent.vue').default);

Vue.component('echo-chat', require('./components/EchoChatComponent.vue').default);
Vue.component('echo-private-chat', require('./components/EchoPrivateChatComponent.vue').default);
Vue.component('echo-presence-chat', require('./components/EchoPresenceChatComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
