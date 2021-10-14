<template>
    <v-main>
        <v-col cols="12" sm="4">
            <v-card elevation="2">
                <v-card-title class="mb-4">
                    <v-row>
                        <v-col cols="8" md="8">
                            <p class="text-h6 text--primary">
                                <strong>Message</strong>
                            </p>
                        </v-col>
                        <v-col cols="4" md="4" class="d-flex justify-end">
                            <v-btn @click="openModal()" dark depressed color="dark">
                                <v-icon small class="mr-2">mdi-briefcase-edit</v-icon>
                                Edit
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-card-title>

                <v-card-text>
                    <v-row>
                        <v-col cols="12">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium ad consequatur
                            eaque facilis id in ipsa molestias nam necessitatibus, non obcaecati optio perferendis
                            perspiciatis possimus quae reiciendis reprehenderit. Officia.
                        </v-col>
                    </v-row>
                </v-card-text>
                <v-card-text class="d-flex flex-row-reverse">
                    From: My
                </v-card-text>
            </v-card>
        </v-col>
    </v-main>
</template>

<script>
export default {
    name: "ShowBoard",
    methods: {
        openModal() {
            this.loader = false;


        }
    }
}
</script>

<style scoped>

</style>
