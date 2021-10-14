<template>
    <v-main class="container">
        <v-row class="justify-content-center mt-4">
            <div class="col-md-5 col-sm-8">
                <v-card>
                    <v-toolbar dark class="dark">
                        <v-toolbar-title>Register</v-toolbar-title>
                    </v-toolbar>

                    <v-card-text>
                        <v-form>
                            <v-label for="name">
                                Name
                            </v-label>
                            <v-text-field dense filled rounded required id="name" type="text">
                            </v-text-field>
                            <v-label for="email">
                                E-mail
                            </v-label>
                            <v-text-field dense filled rounded required id="email" type="email">
                            </v-text-field>
                            <v-label for="password">
                                Password
                            </v-label>
                            <v-text-field dense filled rounded required id="password" type="password">
                            </v-text-field>
                            <v-label for="password_confirmation">
                                Confirme password
                            </v-label>
                            <v-text-field dense filled rounded required id="password_confirmation" type="password">
                            </v-text-field>
                        </v-form>
                    </v-card-text>
                    <v-card-actions class="d-flex flex-row-reverse">
                        <v-btn
                            class="mr-4"
                            type="submit"
                            dark>
                            Register
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </div>
        </v-row>
    </v-main>
</template>

<script>
export default {
    name: "RegisterForm"
}
</script>

<style scoped>

</style>
