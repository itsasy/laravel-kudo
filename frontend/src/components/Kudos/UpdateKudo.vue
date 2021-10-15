<template>
    <v-main class="container mt-4">
        <update-kudo v-model="UpdateKudo" :data="kudoData"></update-kudo>
        <v-row class="d-flex justify-content-center">
            <v-col v-for="(element,index) in list" :key="index" cols="12" md="4" sm="10">
                <v-card elevation="2">
                    <v-card-title class="mb-4">
                        <v-row>
                            <v-col cols="4" md="4" class="d-flex justify-end">
                                <!--@click.stop="UpdateKudo=true" -->
                                <v-btn @click.stop="UpdateKudo=true" dark depressed color="dark">
                                    <v-icon small class="mr-2">mdi-briefcase-edit</v-icon>
                                    Edit
                                </v-btn>
                            </v-col>
                            <v-col cols="4" md="4" class="d-flex justify-end">
                                <v-btn depressed dark class="bg-danger">
                                    <v-icon small class="mr-2">mdi-briefcase-edit</v-icon>
                                    Delete
                                </v-btn>
                            </v-col>
                        </v-row>
                    </v-card-title>
                    <v-card-text>
                        <v-row>
                            <v-col cols="12">
                                {{ element.description }}
                            </v-col>
                        </v-row>
                    </v-card-text>
                    <v-card-text class="d-flex flex-row-reverse">
                        From: {{ element.user_id }}
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-main>
</template>

<script>
import BoardService from '../../services/BoardServices';
import UpdateKudo from "../Kudos/UpdateKudo";

export default {
    name: "ShowBoard",
    data() {
        return {
            postList: new BoardService,
            UpdateKudo: false,
            kudoData: null,
            list: {},
        }
    },
    created() {
        this.fetchBoardPosts()
    },
    methods: {
        fetchBoardPosts() {
            let postList = this.postList.boardPublications(this.$route.params.id)
            postList.then(response => {
                this.list = response.data.publications
            }).catch(error => {
                console.log(error);
            })
        },
    },
    components: {
        UpdateKudo
    }
}
</script>

<style scoped>

</style>
