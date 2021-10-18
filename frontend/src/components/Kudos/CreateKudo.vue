<template>
    <v-dialog v-model="modal" persistent max-width="550px" scrollable>
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

export default {
    name: "CreateKudo",
    props: {
        value: Boolean
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
                user_id: this.$store.getters.user.id
            }
        }
    },
    methods: {
        createBoard() {
            if (this.kudoForm.description === '') {
                console.log('error');
            } else {
                let create = this.kudoService.createKudo({
                    description: this.kudoForm.description,
                    board_id: this.$route.params.id,
                    user_id: this.kudoForm.user_id
                })
                create.then(() => {
                    this.$root.$emit('fetchBoardPosts');
                    this.modal = false
                    this.kudoForm.description = ''
                })
            }
        }
    }
}
</script>

<style scoped>

</style>
