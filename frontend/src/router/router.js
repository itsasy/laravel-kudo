import VueRouter from "vue-router";

import Home from "../views/Home";
import Register from "../views/Register";
import Login from "../views/Login";

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: "/",
            component: Home,
        },
        {
            path: "/register",
            component: Register
        },
        {
            path: "/login",
            component: Login
        }
    ]
})

export default router
