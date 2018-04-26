


window.Vue = require('vue');
window.axios = require("axios")

Vue.component('data-table', require('./components/infoStudent.vue'));
Vue.component("data-topic",require("./components/infoTopic.vue"))
const table = new Vue({
    el: '#data-table',

});
