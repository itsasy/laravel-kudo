<template>
    <div id="app">
        <Navigation/>
        <Register/>
    </div>
</template>

<script>

import Register from "../components/RegisterForm";
import Navigation from "../components/Home/Navigation";

export default {
    name: "App",
    components: {
        Register,
        Navigation
    }
};
</script>

<style>
</style>
