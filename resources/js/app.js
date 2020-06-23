require('bootstrap')
import TrendChart from "vue-trend-chart";
import Vue from 'vue'

Vue.use(TrendChart);

window.Vue = Vue;

Vue.component('date-filter-chart', require('./components/DateFilteredChart.vue').default);

const app = new Vue({
    el: '#app',
});
