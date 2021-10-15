<template>
    <div id="app">
        <Navigation/>
        <Menu/>
        <ShowBoard/>
    </div>
</template>

<script>

import Navigation from "../components/Navigation";
import ShowBoard from "../components/Boards/ShowBoard";
import Menu from "../components/Menu";

export default {
    name: "App",
    components: {
        ShowBoard,
        Navigation,
        Menu
    }
};
</script>

<style>
</style>
