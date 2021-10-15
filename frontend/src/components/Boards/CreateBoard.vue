<template>
    <v-dialog v-model="modal" persistent max-width="550px" scrollable>
        <v-card>
            <v-toolbar dark class="pa-0">
                <v-toolbar-title>New KudoBoard</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn icon @click.stop="modal=false">
                    <v-icon>mdi-close</v-icon>
                </v-btn>
            </v-toolbar>

            <v-card-text>
                <v-form class="pt-5">
                    <label>KudoBoard for:</label>
                    <v-select item-value="id" item-text="name" :items="boardForm.workerList"
                              v-model="boardForm.worker_id" label="Select" single-line
                              dense filled rounded></v-select>
                    <label>Description:</label>
                    <v-text-field dense filled rounded placeholder="" v-model="boardForm.description"/>
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

import BoardListService from '../../services/BoardServices';
import WorkerService from "../../services/WorkerServices";

export default {
    name: "CreateBoard",
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
            boardService: new BoardListService,
            workerService: new WorkerService,
            boardForm: {
                workerList: [],

                description: '',
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
            create.then(() => {
                this.$router.go(this.$router.currentRoute);
            }).catch(() => {
                return Promise.resolve(false)
            })
        },
        getWorkers() {
            let workerList = this.workerService.getWorkers()
            workerList.then(response => {
                this.boardForm.workerList = response.data.workers;
            }).catch(error => {
                console.log(error);
            });
        }
    },
    created() {
        this.getWorkers()
    }
}
</script>

<style scoped>

</style>
