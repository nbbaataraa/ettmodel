<template>
  <div>
    <v-layout>
      <v-spacer></v-spacer>
      <v-flex xs12 sm6 md4>
        <v-text-field
          v-model="searchTable"
          append-icon="search"
          label="Хайх"
          single-line
          hide-details
        ></v-text-field>
      </v-flex>
    </v-layout>
    <v-layout>
      <v-flex xs12 sm6 md4>
        <v-btn class="primary">Back to Education</v-btn>
      </v-flex>
    </v-layout>
    <v-data-table :headers="headers" :items="edu" :search="searchTable" class="elevation-1">
      <template slot="items" slot-scope="props">
        <td class="text-right">{{props.item.id}}</td>
        <td class="text-xs-right">{{ props.item.employee.lname}}</td>
        <td class="text-xs-right">{{ props.item.edu_senior }}</td>
        <td class="text-xs-right">{{ props.item.edu_high }}</td>
        <td class="text-xs-right">{{ props.item.edu_universities }}</td>
        <td class="text-xs-right">{{ props.item.edu_magister }}</td>
        <td class="text-xs-right">{{ props.item.edu_doctor }}</td>
      </template>
      <template v-slot:no-results>
        <v-alert
          :value="true"
          color="error"
          icon="warning"
        >Таны хайсан "{{ searchTable }}" утганд ѳгѳгдѳл алга.</v-alert>
      </template>
    </v-data-table>
    <v-layout>
      <v-flex xs12 sm6 md4>
        <!-- Add Auto Complate -->
        <v-autocomplete
          v-model="select"
          :loading="loading"
          :items="items"
          item-text="employee.lname"
          item-value="id"
          :search-input="search"
          label="Enter Name: "
        ></v-autocomplete>
        <v-layout>
          <v-flex>
            <v-text-field label="Type Some Text"></v-text-field>
          </v-flex>
        </v-layout>
      </v-flex>
    </v-layout>
  </div>
</template>

<script>
export default {
  data() {
    return {
      //loggedOwnID: User.loggedOwnID(this.data.user_id), Ѳгѳгдлийн сан дээр Logged Буюу нэвтэрсэн хэрэглэгчийн ID Утгыг авна.
      headers: [
        {
          text: "Д/Д",
          value: "id",
          align: "right",
          sortable: true
        },
        {
          text: "Нэр",
          value: "employee.lname",
          align: "right"
        },
        {
          text: "Дунд сургууль",
          value: "edu_senior",
          align: "right"
        },
        {
          text: "Ахлах сургууль",
          value: "edu_high",
          align: "right"
        },
        {
          text: "Их сургууль",
          value: "edu_universities",
          align: "right",
          sortable: true
        },
        {
          text: "Магистер",
          value: "edu_magister",
          sortable: false,
          align: "right"
        },
        {
          text: "Доктор",
          value: "edu_doctor",
          sortable: false,
          align: "right"
        }
      ],
      loading: false,
      edu: [],
      // Autocomplate хийхэд search [] массив зарлаж ѳгнѳ.
      search: "",
      searchTable: "",
      // Autocomplate нь утгуудаа items [] массивт ѳгнѳ.
      items: [],
      // Autocomplate нь item[] массиваас select массиваас утга авна.
      select: null
    };
  },
  created() {
    this.initialize();
  },
  // Autocomplate watch:{} hook ашиглан утга авна. Энэ нь утга авахдаа method-оос ирнэ.
  watch: {
    search(val) {
      val && val !== this.select && this.filterNames(val);
    }
  },
  methods: {
    fetchEducation() {
      axios
        .get("api/education", {
          headers: {
            "Content-Type": "application/json",
            Accept: "application/json"
          }
        })
        .then(res => {
          this.edu = res.data;
        })
        .catch(error => console.log(error.response.data));
    },
    // Энэ method нь Autocomplate хийхэд чухал үүрэгтэй ба WATCH:{} hook руу item[] массивт database-н object утгыг задалж ѳгнѳ.
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
    initialize() {
      this.fetchEducation();
      this.filterNames();
    }
  }
};
</script>

<style>
</style>
