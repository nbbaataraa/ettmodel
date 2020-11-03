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
                    <h3 class="headline mb-0">АЖИЛТАНЫ МЭДЭЛЭЛ:</h3>
                  </div>
                </v-card-title>
                <v-flex grow pa-4 xs12 sm6 md12>
                  <v-autocomplete
                    v-model="select"
                    :loading="loading"
                    :items="education"
                    item-text="fname"
                    item-value="id"
                    :search-input="searchUser"
                    label="Ажилтны овог:"
                  ></v-autocomplete>
                  <v-autocomplete
                    v-model="select"
                    :loading="loading"
                    :items="education"
                    item-text="lname"
                    item-value="id"
                    :search-input="searchUser"
                    label="Ажилтны нэр:"
                  ></v-autocomplete>

                  <v-autocomplete
                    v-model="select"
                    :loading="loading"
                    :items="education"
                    item-text="employee_department"
                    item-value="id"
                    :search-input="searchUser"
                    label="Хэлтэс нэгж:"
                  ></v-autocomplete>
                </v-flex>
                <v-layout row></v-layout>
                <v-card-title primary-title>
                  <div>
                    <h3 class="headline mb-0">Ерѳнхий боловсрол</h3>
                  </div>
                </v-card-title>

                <v-layout row>
                  <v-flex grow pa-4 xs12 sm6 md12>
                    <v-text-field
                      label="Ерѳнхий боловсролын сургуулий нэр /Дунд/:"
                      v-model="edu_senior"
                      required
                    ></v-text-field>
                    <v-text-field
                      label="Ерѳнхий боловсролын сургуулий нэр /Ахлах/:"
                      v-model="edu_high"
                      required
                    ></v-text-field>
                  </v-flex>
                </v-layout>
                <v-card-title primary-title>
                  <div>
                    <h3 class="headline mb-0">МСҮТ сургууль</h3>
                  </div>
                </v-card-title>

                <v-layout row>
                  <v-flex grow pa-4 xs12 sm6 md12>
                    <v-text-field label="МСҮТ сургуулий нэр:" v-model="edu_collage" required></v-text-field>
                  </v-flex>
                </v-layout>

                <v-card-title primary-title>
                  <div>
                    <h3 class="headline mb-0">Их дээд сургууль</h3>
                  </div>
                </v-card-title>

                <v-layout row>
                  <v-flex grow pa-4 xs12 sm6 md12>
                    <v-text-field
                      label="Их дээд сургуулий нэр:"
                      v-model="edu_universities"
                      required
                    ></v-text-field>
                  </v-flex>
                </v-layout>

                <v-card-title primary-title>
                  <div>
                    <h3 class="headline mb-0">Магистер</h3>
                  </div>
                </v-card-title>

                <v-layout row>
                  <v-flex grow pa-4 xs12 sm6 md12>
                    <v-text-field
                      label="Магистер боловсролын сургуулий нэр:"
                      v-model="edu_magister"
                      required
                    ></v-text-field>
                  </v-flex>
                </v-layout>

                <v-card-title primary-title>
                  <div>
                    <h3 class="headline mb-0">Доктрант</h3>
                  </div>
                </v-card-title>

                <v-layout row>
                  <v-flex grow pa-4 xs12 sm6 md12>
                    <v-text-field
                      label="Доктрант боловсролын сургуулий нэр:"
                      v-model="edu_doctor"
                      required
                    ></v-text-field>
                  </v-flex>
                </v-layout>
                <v-card-actions>
                  <v-btn flat color="primary" @click="submit">Хадгалах</v-btn>
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
      loading: false,
      searchUser: "",
      items: [],
      select: null,
      education: [],
      employee_id: "",
      edu_collage: "",
      edu_high: "",
      edu_senior: "",
      edu_magister: "",
      edu_doctor: "",
      edu_universities: ""
    };
  },

  created() {
    this.initialize();
  },

  watch: {
    searchUser(val) {
      val && val !== this.select && this.filterNames(val);
    }
  },
  methods: {
    initialize() {
      this.fetchEducation();
    },
    submit() {
      axios
        .post("")
        .then()
        .catch();
    },
    clear() {
      alert("You Clicked Clear");
    },
    fetchEducation() {
      axios
        .get("/api/employee")
        .then(res => (this.education = res.data))
        .catch(error => console.log(error.res.data));
    },
    filterNames(v) {
      this.loading = true;
      setTimeout(() => {
        this.items = this.skills.filter(e => {
          return Object.keys(e).some(key => {
            let string = String(e[key]);
            return string.toLowerCase().indexOf((v || "").toLowerCase()) > -1;
          });
        });
        this.loading = false;
      }, 500);
    }
  }
};
</script>

<style lang="css" scoped>
</style>
