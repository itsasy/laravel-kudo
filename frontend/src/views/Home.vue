<template>
    <div id="app">
        <Navigation/>
        <Menu/>
        <ListBoards/>
    </div>
</template>

<script>

import Navigation from "../components/Home/Navigation";
import ListBoards from "../components/Boards/ListBoard";
import Menu from "../components/Home/Menu";

export default {
    name: "App",
    components: {
        ListBoards,
        Navigation,
        Menu
    }
};
</script>

<style>
</style>
