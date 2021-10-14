<template>
    <v-main class="container">
        <v-row class="justify-content-center mt-4">
            <div class="col-md-5 col-sm-8">
                <v-card>
                    <v-toolbar dark class="dark">
                        <v-toolbar-title>Login</v-toolbar-title>
                    </v-toolbar>

                    <v-card-text>
                        <v-form>
                            <v-label for="username">
                                Username
                            </v-label>
                            <v-text-field dense filled rounded required id="username" type="text"/>
                            <v-label for="password">
                                Password
                            </v-label>
                            <v-text-field dense filled rounded required id="password" type="password"/>
                        </v-form>
                    </v-card-text>
                    <v-card-actions class="d-flex flex-row-reverse">
                        <v-btn type="submit" dark>Sign Up</v-btn>
                    </v-card-actions>
                </v-card>
            </div>
        </v-row>
    </v-main>
</template>

<script>
export default {
    name: "Login"
}
</script>

<style scoped>

</style>
