window.Vue = require('vue');
window.axios = require('axios');

try {
    window.$ = window.jQuery = require('jquery');
    window.Popper = require('popper.js');
    require('bootstrap');
} catch (e) {
}

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
