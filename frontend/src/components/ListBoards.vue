<template>
    <v-main>
        <v-col cols="12" sm="4">
            <v-card elevation="2">
                <v-card-text class="mb-4">
                    <v-row>
                        <v-col cols="8" md="8">
                            <p class="text-h6 text--primary">
                                <strong>Description</strong>
                            </p>
                        </v-col>
                        <v-col cols="4" md="4" class="d-flex justify-end">
                            <v-btn dark depressed color="dark">
                                <v-icon small class="mr-2">mdi-bulletin-board</v-icon>
                                View
                            </v-btn>
                        </v-col>
                    </v-row>

                    <!-- To -->
                    <div>
                        <span style="display: block;margin-bottom: 5px">For:</span>
                        <!--Adicionar método para que se muestren los nombres-->
                        <v-tooltip bottom>
                            <template>
                                <!--                v-bind="attrs"             :color="randomColor()"-->
                                <v-avatar size="48" class="ml-1">
                                <span class="white--text text-h6">
                                    NAME
                                </span>
                                </v-avatar>
                            </template>
                            <span>Nombre</span>
                        </v-tooltip>

                        <v-btn small class="mx-1" fab depressed color="white">
                            <v-icon color="cyan"> mdi-plus</v-icon>
                        </v-btn>

                        <v-btn small class="mx-1" fab depressed color="white">
                            <v-icon color="red"> mdi-minus</v-icon>
                        </v-btn>
                        <hr/>
                    </div>
                </v-card-text>

                <v-card-text>
                    <v-row>
                        <v-col cols="12" sm="6">
                            <v-icon color="green darken-2">mdi-account</v-icon>
                            Creator:
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-icon color="green darken-2">mdi-account</v-icon>
                            Worker:
                        </v-col>
                    </v-row>
                    <v-icon>mdi-android-messages</v-icon>
                    POSTS:
                </v-card-text>
            </v-card>
        </v-col>
    </v-main>
</template>

<script>
export default {
    name: "ListBoards"
}
</script>

<style scoped>

</style>
