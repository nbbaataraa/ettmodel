<template>
  <div>
    <router-link to="/education">
      <v-btn flat large color="info">
        <v-icon dark>arrow_back_ios</v-icon>
      </v-btn>
    </router-link>
    <v-toolbar color="warning white--text">
      <v-toolbar-title>НЭМЭХ</v-toolbar-title>
    </v-toolbar>
    <v-container fluid grid>
      <v-layout>
        <v-flex xs12 align-end flexbox>
          <form class>
            <div>
              <v-card>
                <v-card-title primary-title>
                  <div>
                    <h3 class="headline mb-0">Ерѳнхий боловсрол</h3>
                  </div>
                </v-card-title>

                <v-layout row>
                  <v-flex grow pa-4 xs12 sm6 md12>
                    <v-text-field label="Name" required></v-text-field>
                    <v-text-field label="E-mail" required></v-text-field>
                    <v-select label="Select" required></v-select>
                    <v-checkbox label="Option" required></v-checkbox>
                  </v-flex>
                </v-layout>

                <v-card-title primary-title>
                  <div>
                    <h3 class="headline mb-0">Их дээд сургууль</h3>
                  </div>
                </v-card-title>

                <v-layout row>
                  <v-flex grow pa-4 xs12 sm6 md12>
                    <v-text-field label="Name" required></v-text-field>
                    <v-text-field label="E-mail" required></v-text-field>
                    <v-select label="Select" required></v-select>
                    <v-checkbox label="Option" required></v-checkbox>
                  </v-flex>
                </v-layout>

                <v-card-title primary-title>
                  <div>
                    <h3 class="headline mb-0">Магистер</h3>
                  </div>
                </v-card-title>

                <v-layout row>
                  <v-flex grow pa-4 xs12 sm6 md12>
                    <v-text-field label="Name" required></v-text-field>
                    <v-text-field label="E-mail" required></v-text-field>
                    <v-select label="Select" required></v-select>
                    <v-checkbox label="Option" required></v-checkbox>
                  </v-flex>
                </v-layout>

                <v-card-title primary-title>
                  <div>
                    <h3 class="headline mb-0">Доктрант</h3>
                  </div>
                </v-card-title>

                <v-layout row>
                  <v-flex grow pa-4 xs12 sm6 md12>
                    <v-text-field label="Name" required></v-text-field>
                    <v-text-field label="E-mail" required></v-text-field>
                    <v-select label="Select" required></v-select>
                    <v-checkbox label="Option" required></v-checkbox>
                  </v-flex>
                </v-layout>
                <v-card-actions>
                  <v-btn flat color="primary">Хадгалах</v-btn>
                  <router-link to="/education">
                    <v-btn flat color="warning">Болих</v-btn>
                  </router-link>
                </v-card-actions>
              </v-card>
            </div>
          </form>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {
    submit() {
      alert("You Clicked Submit");
    },
    clear() {
      alert("You Clicked Clear");
    }
  }
};
</script>

<style lang="css" scoped>
</style>
