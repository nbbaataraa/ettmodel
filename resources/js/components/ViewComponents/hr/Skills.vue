<template>
  <div>
    <v-toolbar flat color="white">
      <v-toolbar-title>Нийт ажилтан</v-toolbar-title>
    </v-toolbar>
    <v-layout>
      <v-spacer></v-spacer>
      <v-flex xs12 sm6 md4>
        <v-text-field v-model="search" append-icon="search" label="Хайх" single-line hide-details></v-text-field>
      </v-flex>
    </v-layout>

    <v-data-table
      :headers="headers"
      :items="skills"
      v-if="skills !==null"
      :search="search"
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <td class="text-xs-right">{{ props.item.fname }}</td>
        <td class="text-xs-right">{{ props.item.lname }}</td>
        <!-- Nested Data агуулж буй тохиолдолд Filters болон methods бичиж ѳгнѳ. -->
        <td class="text-xs-right">{{ props.item.skilltypes_rel | getSkill_name}}</td>
        <!-- Nested Data агуулж буй тохиолдолд Filters болон methods бичиж ѳгнѳ. -->
        <td class="text-xs-right">{{ props.item.skilltypes_rel | getSkill_level}}</td>
        <!-- Nested Data агуулж буй тохиолдолд Filters болон methods бичиж ѳгнѳ. -->
        <td class="text-xs-right">
          <v-icon color="primary" small class="mr-2" @click="editItem(props.item)">edit</v-icon>
          <v-icon color="red" small @click="deleteItem(props.item)">delete</v-icon>
        </td>
      </template>
      <template v-slot:no-results>
        <v-alert
          :value="true"
          color="error"
          icon="warning"
        >Таны хайсан "{{ search }}" утганд ѳгѳгдѳл алга.</v-alert>
      </template>
    </v-data-table>
  </div>
</template>
    <!-- <div v-for="skill in skills" :key="skill.id">
      <div v-for="skilltype in skill.skilltypes_rel">
        <table>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Skill Level</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">{{skill.id}}</th>
              <td>{{skill.fname}}</td>
              <td>{{skill.lname}}</td>
              <td>{{skilltype.skill_level}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>-->
  </div>
</template>

<script>
export default {
  name: "Skills",
  data() {
    return {
      headers: [
        { text: "Овог", value: "id", align: "right", sortable: true },
        { text: "Нэр", value: "employee_id", align: "right" },
        { text: "Ур чадвар", value: "skill_name", align: "right" },
        // {
        //   text: "Ур чадварын тѳрѳл",
        //   value: "skill_type_name",
        //   align: "right"
        // },
        { text: "Зэрэг,дэв", value: "skill_level", align: "right" },
        { text: "Үйлдэлүүд", value: "name", sortable: false, align: "right" }
      ],
      skills: [],
      dataLoaded: false,
      search: "",
      editedIndex: -1,
      editedItem: {}
    };
  },

  created() {
    this.initialize();
  },
  methods: {
    // <!-- Nested Data агуулж буй тохиолдолд бичих methods  -->
    getSkill_level: skilltypes_rel => {
      return skilltypes_rel.map(skilltypes_rel => skilltypes_rel.skill_level);
    },
    getSkill_name: skilltypes_rel => {
      return skilltypes_rel.map(
        skilltypes_rel => skilltypes_rel.skill_type_name
      );
    },
    fetchSkillData() {
      axios
        .get("/api/skill")
        .then(res => {
          this.skills = res.data;
          this.dataLoaded = true;
        })
        .catch(error => console.log(error.response.data));
    },
    initialize() {
      this.fetchSkillData();
    },
    editItem(item) {
      this.editedIndex = this.skills.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },
    deleteItem(item) {
      const index = this.skills.indexOf(item);
      confirm("Та тухайн ѳгѳгдѳл устгахдаа итгэлтэй байна уу?") &&
        this.skills.splice(index, 1);

      axios
        .delete("//" + item.id)
        .then(response => {
          console.log(response);
        })
        .catch(error => console.log(error.response.data));
    },
    save() {
      if (this.editedIndex > -1) {
        axios
          .put("/api//" + this.editedItem.id, {})
          .then(response => {
            console.log(response);
          })
          .catch(error => console.log(error.response.data));
        Object.assign(this.skills[this.editedIndex], this.editedItem);
      } else {
        axios
          .post("/api/employee", {})
          .then(response => {
            console.log(response);
          })
          .catch(error => console.log(error.response.data));
        this.skills.push(this.editedItem);
      }
      this.close();
    }
  },
  filters: {
    // <!-- Nested Data агуулж буй тохиолдолд бичих filters  -->
    getSkill_level: skilltypes_rel => {
      return skilltypes_rel.map(skilltypes_rel => skilltypes_rel.skill_level);
    },
    getSkill_name: skilltypes_rel => {
      return skilltypes_rel.map(
        skilltypes_rel => skilltypes_rel.skill_type_name
      );
    }
  }
};
</script>

<style>
</style>
