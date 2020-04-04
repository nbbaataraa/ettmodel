<template>
<div>
    <router-link to="/education">
        <v-btn flat large color="info">
            <v-icon dark>arrow_back_ios</v-icon>
        </v-btn>
    </router-link>
    <v-toolbar color="warning white--text">
        <v-toolbar-title>
            НЭМЭХ
        </v-toolbar-title>
    </v-toolbar>
    <v-container>
        <v-layout row>
            <v-flex grow pa-1>
                <form class="xs6">
                    <v-text-field label="Name" required></v-text-field>
                    <v-text-field label="E-mail" required></v-text-field>
                    <v-select label="Select" required></v-select>
                    <v-checkbox label="Option" required></v-checkbox>

                    <v-btn @click="submit">submit</v-btn>
                    <v-btn @click="clear">clear</v-btn>
                </form>
            </v-flex>
        </v-layout>




    </v-container>
</div>
</template>

<script>
export default {
    data() {
        return {}
    },
    methods: {
        submit() {
            alert("You Clicked Submit");
        },
        clear() {
            alert("You Clicked Clear");
        }
    }
}
</script>

<style lang="css" scoped>
</style>
