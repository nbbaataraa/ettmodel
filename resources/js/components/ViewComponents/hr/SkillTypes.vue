<template>
  <form>
    <v-flex xs12 sm6 md4>
      <v-text-field v-model="editedItems.skill_type_name" label="Ур чадвар" required></v-text-field>
    </v-flex>

    <v-flex xs12 sm6 md4>
      <v-select v-model="editedItems.skill_level" :items="items" filled label="Зэрэг, Дэв" required></v-select>
    </v-flex>
    <v-btn class="primary" @click="save">Хадгалах</v-btn>
    <v-btn class="blue lighten-3 white--text" @click="clear">Цэвэрлэх</v-btn>
  </form>
</template>
<script>
export default {
  data: () => ({
    items: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"],
    editedIndex: -1,
    editedItems: {
      skill_type_name: "",
      skill_level: ""
    }
  }),
  // editItem(item) {
  //   this.editedIndex = this.skill_types.indexOf(item);
  //   this.editedItem = Object.assign({}, item);
  //   this.dialog = true;
  // },
  methods: {
    clear() {
      this.editedItems.skill_type_name = "";
      this.editedItems.skill_level = null;
      // this.checkbox = false;
    },
    save() {
      if (this.editedIndex > -1) {
        axios
          .put("/api/skilltype/" + this.editedItem.id, {
            skill_type_name: this.editedItems.skill_type_name,
            skill_level: this.editedItems.skill_level
          })
          .then(response => {
            console.log(response);
          })
          .catch(error => console.log(error.response.data));
        Object.assign(this.employees[this.editedIndex], this.editedItem);
      } else {
        axios
          .post("/api/skilltype", {
            skill_type_name: this.editedItems.skill_type_name,
            skill_level: this.editedItems.skill_level
          })
          .then(response => {
            console.log(response);
          })
          .catch(error => console.log(error.response.data));
        // this.employees.push(this.editedItem);
      }
    }
  }
};
</script>
