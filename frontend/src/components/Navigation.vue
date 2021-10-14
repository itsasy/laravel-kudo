<template>
    <v-app-bar color="indigo" dark>
        <v-toolbar-title class="">KudoBoard</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items>
            <v-btn v-for="item in menu" :key="item.icon" :to="item.link" link depressed>
                {{ item.title }}
            </v-btn>
        </v-toolbar-items>
    </v-app-bar>
</template>

<script>
export default {
    data: () => ({
        menu: [
            {icon: "info", title: "Logout", link: 'logout'},
        ]
    }),
    name: "Navigation"
}
;
</script>

<style scoped>
ul {
    margin: 0;
    padding: 0;
}

li {
    display: inline-block;
    padding: 1em 0.5em;
}
</style>
