import Vue from "vue";
import VueRouter from "vue-router";
import UserAdd from "../components/ViewComponents/hr/UserAdd.vue"; //Calling Router Vue's
import Login from "../components/ViewComponents/Login.vue";
import Dashboard from "../components/ViewComponents/hr/Dashboard.vue"; //Calling Router Vue's
import UserList from "../components/ViewComponents/hr/UsersList.vue"; //Calling Router Vue's
Vue.use(VueRouter);
//To Call Routes in const
const routes = [
    { path: "/useradd", component: UserAdd },
    { path: "/login", component: Login },
    { path: "/dashboard", component: Dashboard },
    { path: "/userlist", component: UserList }
    //{ path: "/dispatcher", component: App },
    //{ path: "/station", component: App }
];
//To Register and export Defaults
const router = new VueRouter({
    routes,
    hashbang: false,
    mode: "history"
});

export default router;
