<template>
  <div>
    <v-layout>
      <v-spacer></v-spacer>
      <v-flex xs12 sm6 md4>
        <router-link to="/new">
          <v-btn small fab dark color="indigo" class="right">
            <v-icon dark>add</v-icon>
          </v-btn>
        </router-link>
        <v-text-field
          v-model="searchTable"
          append-icon="search"
          label="Хайх"
          single-line
          hide-details
        ></v-text-field>
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
        <td class="text-xs-right">
          <router-link :to="`/education/${props.item.id}`">
            <v-icon color="primary" small class="mr-2" @click="(props.item.id)">edit</v-icon>
          </router-link>
          <!-- <v-icon color="red" small @click="deleteItem(props.skills)">delete</v-icon> -->
        </td>
      </template>
      <template v-slot:no-results>
        <v-alert
          :value="true"
          color="error"
          icon="warning"
        >Таны хайсан "{{ searchTable }}" утганд ѳгѳгдѳл алга.</v-alert>
      </template>
    </v-data-table>
    <v-layout></v-layout>
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
          align: "right",
          sortable: true
        },
        {
          text: "Дунд сургууль",
          value: "edu_senior",
          align: "right",
          sortable: true
        },
        {
          text: "Ахлах сургууль",
          value: "edu_high",
          align: "right",
          sortable: true
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
          sortable: true,
          align: "right"
        },
        {
          text: "Доктор",
          value: "edu_doctor",
          sortable: true,
          align: "right"
        },
        {
          text: "Үйлдэлүүд",
          value: "id",
          sortable: false,
          align: "right"
        }
      ],
      edu: [],
      searchTable: ""
    };
  },
  created() {
    this.initialize();
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
    initialize() {
      this.fetchEducation();
    }
  }
};
</script>

<style>
</style>
