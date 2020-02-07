<template v-for="employee in employees" :key="employee.id">
  <v-card>
    <v-card-title>
      Nutrition
      <v-spacer></v-spacer>
      <v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
    </v-card-title>
    <v-data-table :headers="headers" :items="employees" :search="search">
      <template v-slot:items="props">
        <td>{{ props.item.id }}</td>
        <td class="text-xs-right">{{ props.item.lname }}</td>
        <td class="text-xs-right">{{ props.item.fname }}</td>
        <td class="text-xs-right">{{ props.item.employee_phone_num }}</td>
        <td class="text-xs-right">{{ props.item.employee_phone_num_home }}</td>
        <td class="text-xs-right">{{ props.item.employee_email1 }}</td>
      </template>
      <template v-slot:no-results>
        <v-alert
          :value="true"
          color="error"
          icon="warning"
        >Таны хайсан "{{ search }}" утганд ѳгѳгдѳл алга.</v-alert>
      </template>
    </v-data-table>
  </v-card>
</template>
<script>
export default {
  data() {
    return {
      search: "",
      headers: [
        {
          text: "ID",
          align: "left",
          sortable: true,
          value: "id"
        },
        { text: "lname", align: "right", value: "lname" },
        { text: "fname", align: "right", value: "fname" },
        {
          text: "Phone Num",
          align: "right",
          value: "employee_phone_num"
        },
        {
          text: "Home Num",
          align: "right",
          value: "employee_phone_num_home"
        },
        { text: "Email", align: "right", value: "employee_email1" }
      ],
      employees: []
    };
  },
  created() {
    axios
      .get("/api/employee")
      .then(res => (this.employees = res.data))
      .catch(error => console.log(error.response.data));
  }
};
</script>
