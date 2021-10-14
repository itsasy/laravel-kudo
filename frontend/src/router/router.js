import VueRouter from "vue-router";

import Home from "../views/Home";
import Register from "../views/Register";

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
        }
    ]
})

export default router
