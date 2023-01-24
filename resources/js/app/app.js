
import Vue from 'vue';
import PortfolioItem from './components/PortfolioItem';
import ArticlesItem from './components/ArticlesItem';
import ServiceItem from './components/ServiceItem';

new Vue({
    el: '#app',
    components: {
        PortfolioItem,
        ArticlesItem,
        ServiceItem
    },
    mounted() {
        require('./locales');
        require('./script');
    }
});
