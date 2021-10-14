// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from "vue";
import VueRouter from "vue-router";
import vuetify from "./vuetify/index";

import router from './router/router'

import App from "./App";

Vue.use(VueRouter);

Vue.config.productionTip = false;

new Vue({
    render: h => h(App),
    vuetify,
    router,
}).$mount("#app");
