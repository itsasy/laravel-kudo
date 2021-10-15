import VueRouter from "vue-router";

import Home from "../views/Home";
import Register from "../views/Register";
import Login from "../views/Login";
import ShowBoard from "../views/ShowBoard";
import CreateBoard from "../components/Boards/CreateBoard";

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
        },
        {
            path: "/board/:id",
            component: ShowBoard
        },
        {
            path: "/createBoard",
            component: CreateBoard
        }
    ]
})

export default router
