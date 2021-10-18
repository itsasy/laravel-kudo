<template>
    <v-main class="container">
        <v-row class="justify-content-center mt-4">
            <div class="col-md-5 col-sm-8">
                <alert
                    :dialog="alert.dialog"
                    :tipo="alert.tipo"
                    :mensaje="alert.mensaje"
                    @close="alert.dialog = false"
                />
                <v-card>
                    <v-toolbar dark class="dark">
                        <v-toolbar-title>Register</v-toolbar-title>
                    </v-toolbar>

                    <v-card-text>
                        <v-form>
                            <v-label for="name">
                                Name
                            </v-label>
                            <v-text-field dense filled rounded required id="name" type="text" v-model="userForm.name">
                            </v-text-field>
                            <v-label for="email">
                                E-mail
                            </v-label>
                            <v-text-field dense filled rounded required id="email" type="email"
                                          v-model="userForm.email">
                            </v-text-field>
                            <v-label for="password">
                                Password
                            </v-label>
                            <v-text-field dense filled rounded required id="password" type="password"
                                          v-model="userForm.password">
                            </v-text-field>
                            <v-label for="password_confirmation">
                                Confirm password
                            </v-label>
                            <v-text-field dense filled rounded required id="password_confirmation" type="password"
                                          v-model="userForm.password_confirmation">
                            </v-text-field>
                        </v-form>
                    </v-card-text>
                    <v-card-actions class="d-flex flex-row-reverse">
                        <v-btn
                            class="mr-4"
                            dark
                            @click="registerUser">
                            Register
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </div>
        </v-row>
    </v-main>
</template>

<script>
import alert from "./Helpers/alert";

export default {
    components: {
        alert
    },
    name: "RegisterForm",
    data() {
        return {
            userForm: {
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            },
            alert: {
                dialog: false,
                tipo: "success",
                mensaje: "asd"
            }
        }
    }, props: {
        dialog: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        registerUser() {
            if (this.userForm.name === '' || this.userForm.email === '') {
                this.alert.tipo = "warning";
                this.alert.mensaje = "Empty fields!";
                this.alert.dialog = true;
            } else if (this.userForm.password !== this.userForm.password_confirmation) {
                this.alert.tipo = "warning";
                this.alert.mensaje = "Passwords do not match, please try again"
                this.alert.dialog = true;
            } else {
                this.$store.dispatch('register', {
                    name: this.userForm.name,
                    email: this.userForm.email,
                    password: this.userForm.password
                }).then(() => {
                    this.$store.dispatch('login', {
                        email: this.userForm.email,
                        password: this.userForm.password
                    }).then(() => {
                        this.$router.push('/');
                    }).catch(error => {
                        console.log(error)
                    })
                })
            }
        }
    }
}
</script>

<style scoped>

</style>
