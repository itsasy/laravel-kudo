<template>
    <v-main class="container mt-4">
        <v-alert v-if="list.length === 0" dense outlined type="info">
            You haven't received a KudoBoard yet.
        </v-alert>

        <v-row class="d-flex justify-content-center" v-else>
            <v-col v-for="(element, index) in list" :key="index" cols="12" md="4" sm="10">
                <v-card elevation="2">
                    <v-card-text class="mb-4">
                        <v-row>
                            <v-col cols="8" md="8">
                                <p class="text-h6 text--primary">
                                    <strong>{{ element.title }}</strong>
                                </p>
                            </v-col>
                            <v-col cols="4" md="4" class="d-flex justify-end">
                                <v-btn :to="'/board/' + element.id" dark depressed color="dark" link>
                                    <v-icon small class="mr-2">mdi-bulletin-board</v-icon>
                                    View
                                </v-btn>
                            </v-col>

                            <!--
                            <v-col class="d-flex justify-content-center">
                                <strong>To: {{ element.worker.name }}</strong>
                            </v-col>
                            -->
                        </v-row>
                        <hr/>

                        <!-- To -->
                        <v-col class="d-flex justify-content-center">
                            <strong>
                                <v-icon>mdi-account</v-icon>
                                For: {{ element.worker.name }}
                            </strong>
                        </v-col>
                    </v-card-text>

                </v-card>
            </v-col>
        </v-row>
    </v-main>
</template>

<script>
import BoardListService from '../../services/BoardServices';

export default {
    name: "BoardList",
    data() {
        return {
            loader: false,
            BoardList: new BoardListService,
            list: {},
        }
    },
    created() {
        this.fetchBoardList();
    },
    methods: {
        fetchBoardList() {
            let boardList = this.BoardList.getBoards()
            boardList.then(res => {
                this.list = res.data.boards;
            }).catch(error => {
                console.log(error);
            });
        }
    },
    mounted() {
        this.$root.$on('fetchBoardList', ()=>{
            this.fetchBoardList()
        })
    }
}
</script>

<style scoped>

</style>
