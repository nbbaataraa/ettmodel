require("./bootstrap");

window.Vue = require("vue");
//Call Vutify

import Vue from "vue";
import Vuetify from "vuetify";
import ECharts from "vue-echarts";
import router from "./Router/router.js"; //Register Routes
Vue.use(Vuetify);
Vue.component("app", require("./components/App.vue").default);
const app = new Vue({
    el: "#app",
    ECharts,
    router //To Register App.JS
});
