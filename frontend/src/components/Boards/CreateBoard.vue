<template>
    <v-main persistent max-width="550px" scrollable>
        <v-card>
            <v-toolbar color="black" dark class="pa-0">
                <v-toolbar-title>New KudoBoard</v-toolbar-title>
                <v-spacer/>
                <!--
                <v-btn icon @click="close">
                <v-icon>mdi-close</v-icon>
                </v-btn>
                -->
            </v-toolbar>

            <v-app>
                <v-card-text>
                    <v-form class="pt-5">
                        <label>KudoBoard for:</label>
                        <v-combobox v-model="boardForm.worker_id" :items="boardForm.workerList" dense filled rounded/>

                        <label>Description:</label>
                        <v-text-field dense filled rounded placeholder="" v-model="boardForm.description"/>
                    </v-form>
                </v-card-text>
                <v-card-actions class="d-flex justify-content-center">
                    <v-btn dark depressed color="dark" @click="createBoard">
                        <v-icon>mdi-plus</v-icon>
                        Create
                    </v-btn>
                </v-card-actions>
            </v-app>

        </v-card>
    </v-main>
</template>

<script>

import BoardListService from '../../services/BoardServices';

export default {
    name: "CreateBoard",
    data() {
        return {
            boardService: new BoardListService,

            boardForm: {
                workerList: [1, 2, 2,3],

                description: 'test',
                worker_id: ''
            }
        }
    },
    methods: {
        createBoard() {
            let create = this.boardService.createBoard({
                description: this.boardForm.description,
                worker_id: this.boardForm.worker_id
            })
            create.then((response) => {
                return Promise.resolve(response.data)
            }).catch(() => {
                return Promise.resolve(false)
            })
        }
    }
}
</script>

<style scoped>

</style>
