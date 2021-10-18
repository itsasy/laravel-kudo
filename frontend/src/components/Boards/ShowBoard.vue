<template>
    <v-main class="container mt-4">
        <v-alert v-if="list.length === 0" dense outlined type="info">
            You haven't received a Kudos.
        </v-alert>

        <v-row class="d-flex justify-content-center" v-else>
            <v-col v-for="(element,index) in list" :key="index" cols="12" md="4" sm="10">
                <v-card elevation="2">
                    <v-card-text>
                        <v-row>
                            <v-col cols="12">
                                {{ element.description }}
                            </v-col>
                        </v-row>
                    </v-card-text>
                    <v-card-text class="d-flex flex-row-reverse">
                        <strong>From: {{ element.publisher.name }}</strong>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-main>
</template>

<script>
import BoardService from '../../services/BoardServices';

export default {
    name: "ShowBoard",
    data() {
        return {
            postList: new BoardService,
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
    mounted() {
        this.$root.$on('fetchBoardPosts', () => {
            this.fetchBoardPosts()
        })
    }
}
</script>

<style scoped>

</style>
