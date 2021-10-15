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
                            <v-text-field dense filled rounded required id="username" type="text" v-model="user.email"/>
                            <v-label for="password">
                                Password
                            </v-label>
                            <v-text-field dense filled rounded required id="password" type="password"
                                          v-model="user.password"/>
                        </v-form>
                    </v-card-text>
                    <v-card-actions class="d-flex flex-row-reverse">
                        <v-btn dark depressed color="dark" @click.prevent="authentication">{{ loadingRequest ? '...Wait' : 'Sign in' }}</v-btn>
                    </v-card-actions>
                </v-card>
            </div>
        </v-row>
    </v-main>
</template>

<script>

export default {
    name: "Login"
    , data() {
        return {
            user: {
                email: null,
                password: null
            },
            loadingRequest: false
        }
    },
    methods: {
        authentication() {
            this.$store.dispatch('login', {
                email: this.user.email,
                password: this.user.password
            }).then(() => {
                this.$router.push('/')
            }).catch(err => {
                console.log(err)
            })
        }
    }
}
</script>

<style scoped>

</style>
