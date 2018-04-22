


window.Vue = require('vue');
window.axios = require("axios")

Vue.component('data-table', require('./components/dataTable.vue'));
Vue.component("data-edit-time",require("./components/dataEditTime.vue"))
const table = new Vue({
    el: '#data-table',

});
