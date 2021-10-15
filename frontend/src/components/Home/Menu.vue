<template>
    <div class="menu-component">
        <v-row>
            <v-col cols="10">
              <span class="pointer">
                  <router-link :to="'/'">
                      Home
                  </router-link>
              </span>
                <span v-if="this.$router.history.current.path !== '/' ">
                    / Description
              </span>
            </v-col>
            <v-col cols="2" class="d-flex justify-end">
                <v-btn small outlined color="dark" v-if="this.$router.history.current.path === '/'">
                    <v-icon>mdi-plus</v-icon>
                    New Board
                </v-btn>

                <v-btn small outlined color="dark" v-else>
                    <v-icon>mdi-plus</v-icon>
                    New Kudo
                </v-btn>

            </v-col>
        </v-row>
    </div>
</template>

<script>
export default {
    name: "Menu"
}
</script>


<style scoped>
.menu-component {
    background: #fff;
    padding: 20px 75px 20px 75px;
}

.pointer {
    cursor: pointer;
    font-family: museo-sans, Helvetica Neue, Helvetica, Arial, sans-serif;
    font-size: 18px;
    font-weight: 500;
    line-height: 1.375em;
}
</style>

