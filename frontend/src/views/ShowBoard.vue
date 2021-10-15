<template>
    <div>
        <Navigation/>
        <Menu/>
        <ShowBoard/>
    </div>
</template>

<script>

import Navigation from "../components/Home/Navigation";
import ShowBoard from "../components/Boards/ShowBoard";
import Menu from "../components/Home/Menu";

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
