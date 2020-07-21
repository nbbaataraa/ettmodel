<template>
  <div>
    <router-link to="/education">
      <v-btn flat large color="info">
        <v-icon dark>arrow_back_ios</v-icon>
      </v-btn>
    </router-link>
    <v-toolbar color="indigo white--text">
      <v-toolbar-title>ЗАСАХ</v-toolbar-title>
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
                    <v-autocomplete
                      v-model="select"
                      :loading="loading"
                      :items="edu"
                      item-text="employee.lname"
                      item-value="id"
                      :search-input="search"
                      label="Enter Name: "
                    ></v-autocomplete>
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
    return {
      edu: [],
      loading: false,
      search: "",
      searchTable: "",
      items: [],
      select: null
    };
  },
  created() {
    this.initialize();
  },
  methods: {
    fetchEducation() {
      axios
        .put("api/education", {
          headers: {
            "Content-Type": "application/json",
            Accept: "application/json"
          }
        })
        .then(res => {
          console.log(res);
        })
        .catch(error => console.log(error.response.data));
    },
    filterNames(v) {
      this.loading = true;
      setTimeout(() => {
        this.items = this.edu.filter(e => {
          return Object.keys(e).some(key => {
            let string = String(e[key]);
            return string.toLowerCase().indexOf((v || "").toLowerCase()) > -1;
          });
        });
        this.loading = false;
      }, 500);
    },
    submit() {
      alert("You Clicked Submit");
    },
    clear() {
      alert("You Clicked Clear");
    },
    initialize() {
      this.filterNames();
      this.fetchEducation();
    }
  }
};
</script>

<style lang="css" scoped>
</style>
