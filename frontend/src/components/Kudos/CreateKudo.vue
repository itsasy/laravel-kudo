<template>
    <v-dialog v-model="modal" persistent max-width="550px" scrollable>
        <alert
            :dialog="alert.dialog"
            :tipo="alert.tipo"
            :mensaje="alert.mensaje"
            @close="alert.dialog = false"
        />
        <v-card>
            <v-toolbar dark class="pa-0">
                <v-toolbar-title>New Kudo</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn icon @click.stop="modal=false">
                    <v-icon>mdi-close</v-icon>
                </v-btn>
            </v-toolbar>

            <v-card-text>
                <v-form class="pt-5">
                    <label>Write your post in this Board:</label>
                    <v-textarea dense filled rounded placeholder="" v-model="kudoForm.description"/>
                </v-form>
            </v-card-text>
            <v-card-actions class="d-flex justify-content-end">
                <v-btn dark depressed color="dark" @click="createBoard">
                    <v-icon>mdi-plus</v-icon>
                    Create
                </v-btn>
            </v-card-actions>

        </v-card>
    </v-dialog>
</template>

<script>

import KudoService from "../../services/KudoServices";
import alert from "../Helpers/alert";

export default {
    components: {
        alert
    },
    name: "CreateKudo",
    props: {
        value: Boolean,
        dialog: {
            type: Boolean,
            default: false
        }
    },
    computed: {
        modal: {
            get() {
                return this.value
            },
            set(value) {
                this.$emit('input', value)
            }
        }
    },
    data() {
        return {
            kudoService: new KudoService(),
            kudoForm: {
                description: '',
                user_id: this.$store.getters.user.id,
            },
            alert: {
                dialog: false,
                tipo: "success",
                mensaje: "asd"
            }
        }
    },
    methods: {
        createBoard() {
            if (this.kudoForm.description === '') {
                this.alert.tipo = "warning";
                this.alert.mensaje = "Empty fields!";
                this.alert.dialog = true;
            } else {
                let create = this.kudoService.createKudo({
                    description: this.kudoForm.description,
                    board_id: this.$route.params.id,
                    user_id: this.kudoForm.user_id
                })
                create.then((response) => {
                    if (response.data.message === 'Has been created') {
                        this.$root.$emit('fetchBoardPosts');
                        this.modal = false
                        this.kudoForm.description = ''
                        this.alert.tipo = 'success';
                        this.alert.mensaje = response.data.message;
                        this.alert.dialog = true;
                    }
                })
            }
        }
    }
}
</script>

<style scoped>

</style>
