import VueRouter from "vue-router";

import Home from "../views/Home";
import Register from "../views/Register";
import Login from "../views/Login";
import ShowBoard from "../views/ShowBoard";
import CreateBoard from "../components/Boards/CreateBoard";
import store from "../store/store";

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: "/",
            component: Home,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: "/register",
            component: Register,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: "/login",
            component: Login,
            meta: {
                hideForAuth: true
            }
        },
        {
            path: "/board/:id",
            component: ShowBoard,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: "/createBoard",
            component: CreateBoard,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: "/logout",
            meta: {
                requiresAuth: true
            }
        },

    ]
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!store.getters.userToken) {
            next({name: 'Login'})
        } else {
            next()
        }
    } else {
        next()
    }

    if (to.matched.some(record => record.meta.hideForAuth)) {
        if (store.getters.userToken) {
            next({path: '/'});
        } else {
            next();
        }
    } else {
        next();
    }
})
export default router
