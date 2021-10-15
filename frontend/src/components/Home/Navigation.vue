<template>
    <v-app-bar dark>
        <v-toolbar-title class="">KudoBoard</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items>
            <v-btn link depressed
                   v-if="this.$router.history.current.path === '/login'|| this.$router.history.current.path === '/register' " href="/login">
                Login
            </v-btn>
            <v-btn link depressed
                   v-if="this.$router.history.current.path === '/login' || this.$router.history.current.path === '/register'"
                   href="/register">
                Register
            </v-btn>
            <v-btn @click="logout" link depressed v-else>
                Logout
            </v-btn>
        </v-toolbar-items>
    </v-app-bar>
</template>

<script>

export default {
    name: "Navigation",
    methods: {
        logout() {
            this.$store.dispatch('logout')
                .then(() => {
                    this.$router.push({path: '/login'})
                }).catch(error => {
                console.log(error)
            })
        }
    }
};
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
