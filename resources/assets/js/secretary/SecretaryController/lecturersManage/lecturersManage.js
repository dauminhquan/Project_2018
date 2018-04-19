


window.Vue = require('vue');
window.axios = require("axios")

Vue.component('table-lecturer', require('./components/tableLecturer.vue'));

const table = new Vue({
    el: '#lecturers-table'
});
