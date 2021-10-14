<template>
    <div id="app">
        <Navigation/>
        <ListBoards/>
    </div>
</template>

<script>

import Navigation from "../components/Navigation";
import ListBoards from "../components/ListBoards";

export default {
    name: "App",
    components: {
        ListBoards,
        Navigation
    }
};
</script>

<style>
</style>
