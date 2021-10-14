<template>
    <v-main>
        <Navigation/>
        <Menu/>
        <ListBoards/>
    </v-main>
</template>

<script>

import Navigation from "../components/Navigation";
import ListBoards from "../components/Boards/ListBoard";
import Menu from "../components/Menu";

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
