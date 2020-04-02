require("./bootstrap");

window.Vue = require("vue");
//Call Vutify

import Vue from "vue";
import Vuetify from "vuetify";
//import Bootstrap from "bootstrap";
import ECharts from "vue-echarts";
import router from "./Router/router.js"; //Register Routes
import { store } from "./components/Store/store"; //Нэрлэсэн FUNCTION оо ингэж зарлан

Vue.use(Vuetify);
//Vue.use(Bootstrap);

import User from "./Helpers/User";

window.User = User;
// console.log(User.hasToken());
window.EventBus = new Vue();

Vue.component("app", require("./components/App.vue").default);
const app = new Vue({
    el: "#app",
    ECharts,
    router, //To Register App.JS
    store, //Register VueX function
    data: { date: new Date().toISOString().substr(0, 10) }
});
