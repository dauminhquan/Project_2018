

window.Vue = require('vue');
window.axios = require("axios")

Vue.component('form-login', require('./components/authLogin.vue'));

const table = new Vue({
    el: '#form-login',

});
