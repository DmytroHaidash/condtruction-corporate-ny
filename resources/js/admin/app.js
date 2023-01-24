require('./bootstrap');

import Editor from './components/Editor';

new Vue({
    el: '#app',
    components: {
        ...Editor,
    },
    mounted() {
        require('./modules/phone-mask');
    }
});

