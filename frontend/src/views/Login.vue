<template>
    <div id="app">
        <Navigation/>
        <Login/>
    </div>
</template>

<script>

import Login from "../components/Login";
import Navigation from "../components/Navigation";
export default {
    name: "App",
    components: {
        Login,
        Navigation
    }
};
</script>

<style>
</style>
