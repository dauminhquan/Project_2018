


window.Vue = require('vue');
window.axios = require("axios")

Vue.component('data-table', require('./components/dataTable.vue'));

const table = new Vue({
    el: '#data-table'
});
