import Vue from "vue";
import VueRouter from "vue-router";

import Login from "../components/ViewComponents/Login.vue";
import Dashboard from "../components/ViewComponents/hr/Dashboard.vue"; //Calling Router Vue's
import UserList from "../components/ViewComponents/hr/UsersList.vue"; //Calling Router Vue's
import Skills from "../components/ViewComponents/hr/Skills.vue"; //Calling Router Vue's
import Signup from "../components/ViewComponents/Signup.vue"; //Calling Router Vue's
import Logout from "../components/ViewComponents/Logout.vue"; //Calling Router Vue's
import Education from "../components/ViewComponents/hr/Education.vue";
import Eduedit from "../components/ViewComponents/hr/Eduedit.vue";
import AddEdu from "../components/ViewComponents/hr/AddEdu.vue";
Vue.use(VueRouter);
//To Call Routes in const
const routes = [{
        path: "/login",
        component: Login
    },
    {
        path: "/dashboard",
        component: Dashboard,
        name: "dashboard"
    },
    {
        path: "/userlist",
        component: UserList,
        name: "userlists"
    },
    {
        path: "/signup",
        component: Signup,
        name: "signup"
    },
    {
        path: "/logout",
        component: Logout,
        name: "logout"
    },
    {
        path: "/skills",
        component: Skills,
        name: "skills"
    },
    {
        path: "/education",
        component: Education,
        name: "education"
    },
    {
        path: "/educationedit/:educationid",
        component: Eduedit,
        name: "Eduedit"
    },
    {
        path: "/addedu",
        component: AddEdu,
        name: "AddEdu"
    }

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