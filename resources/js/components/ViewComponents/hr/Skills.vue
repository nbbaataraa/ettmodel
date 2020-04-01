<template>
<div>
    <v-toolbar flat color="white">
        <v-toolbar-title>Нийт ажилтан</v-toolbar-title>
        <v-divider class="mx-2" inset vertical></v-divider>
        <v-spacer></v-spacer>
        <v-dialog v-model="dialog" max-width="900px">
            <template v-slot:activator="{ on }">
                <v-btn color="green lighten-3 white--text" dark class="mb-2" v-on="on">Шинээр чадвар нэмэх</v-btn>
            </template>
            <v-card>
                <v-card-title>
                    <span class="headline">{{ formTitle }}</span>
                </v-card-title>

                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout wrap>
                            <v-flex xs12 sm6 md4>
                                <v-text-field v-model="editedItems.skill_name" label="Ур чадвар" required></v-text-field>
                            </v-flex>
                            <v-flex xs12 sm6 md4>
                                <v-text-field v-model="editedItems.skill_type" label="Ур чадварын тѳрѳл" required></v-text-field>
                            </v-flex>
                            <v-flex xs12 sm6 md4>
                                <v-select v-model="editedItems.skill_level" :items="items" item-text="skill_level" item-value="id" filled label="Зэрэг, Дэв" required></v-select>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="red darken-1" flat @click="close">Болих</v-btn>
                    <v-btn color="blue darken-1" flat @click="save">Хадгалах</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-toolbar>
    <v-layout>
        <v-spacer></v-spacer>
        <v-flex xs12 sm6 md4>
            <v-text-field v-model="search" append-icon="search" label="Хайх" single-line hide-details></v-text-field>
        </v-flex>
    </v-layout>

    <v-data-table :headers="headers" :items="allskills" :search="search" class="elevation-1">
        <template slot="items" slot-scope="props">
            <td class="text-right">{{props.item.id}}</td>
            <td class="text-xs-right">{{ props.item.employee.lname}}</td>
            <td class="text-xs-right">{{ props.item.skill_name }}</td>
            <td class="text-xs-right">{{ props.item.skill_type }}</td>
            <td class="text-xs-right">{{ props.item.skill_level }}</td>
            <td class="text-xs-right">
                <v-icon color="primary" small class="mr-2" @click="editItem(props.item)">edit</v-icon>
                <!-- <v-icon color="red" small @click="deleteItem(props.skills)">delete</v-icon> -->
            </td>
            <!-- Nested Data агуулж буй тохиолдолд Filters болон methods бичиж ѳгнѳ. -->
            <!-- <td class="text-xs-right">{{ props.item.skills | getSkill_name}}</td> -->
            <!-- Nested Data агуулж буй тохиолдолд Filters болон methods бичиж ѳгнѳ. -->
            <!-- <td class="text-xs-right">{{ props.item.skills | getSkill_level}}</td> -->
            <!-- <td class="text-xs-right">{{ props.item.skills | getSkill_id}}</td> -->
            <!-- Nested Data агуулж буй тохиолдолд Filters болон methods бичиж ѳгнѳ. -->
        </template>
        <template v-slot:no-results>
            <v-alert :value="true" color="error" icon="warning">Таны хайсан "{{ search }}" утганд ѳгѳгдѳл алга.</v-alert>
        </template>
    </v-data-table>
</div>
</template>

<script>
export default {
    name: "Skills",
    data() {
        return {
            //loggedOwnID: User.loggedOwnID(this.data.user_id), Ѳгѳгдлийн сан дээр Logged Буюу нэвтэрсэн хэрэглэгчийн ID Утгыг авна.
            headers: [{
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
                    text: "Ур чадвар",
                    value: "skill_name",
                    align: "right"
                },
                {
                    text: "Чадварын тѳрѳл",
                    value: "skill_type",
                    align: "right"
                },
                {
                    text: "Зэрэг, Дэв",
                    value: "skill_level",
                    align: "right",
                    sortable: true
                },

                {
                    text: "Үйлдэлүүд",
                    value: "id",
                    sortable: false,
                    align: "right"
                }
            ],
            dialog: false,
            allskills: [],
            skills: [],
            search: "",
            editedIndex: -1,
            editedItems: {
                allskills: [],
                employee_id: null,
                fname: "",
                lname: "",
                skill_name: "",
                skill_level: ""
            },
            items: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"]
        };
    },

    created() {
        this.initialize();
    },
    filters: {
        // <!-- Nested Data агуулж буй тохиолдолд бичих filters  -->
        getSkill_level: skills => {
            return skills.map(skills => skills.skill_level);
        },
        getSkill_name: skills => {
            return skills.map(skills => skills.skill_name);
        },
        getSkill_id: skills => {
            return skills.map(skills => skills.id);
        }
    },
    computed: {
        formTitle() {
            return this.editedIndex === -1 ? "Шинэ хэрэглэгч" : "Ур чадвар засварлах";
        }
    },
    watch: {
        dialog(val) {
            val || this.close();
        }
    },
    methods: {
        // <!-- Nested Data агуулж буй тохиолдолд бичих methods  -->
        getSkill_level: skills => {
            return skills.map(skills => skills.skill_level);
        },
        getSkill_name: skills => {
            return skills.map(skills => skills.skill_name);
        },
        getSkill_id: skills => {
            return skills.map(skills => skills.id);
        },
        fetchSkillData() {
            axios
                .get("/api/skill", {
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json"
                    }
                })
                .then(res => {
                    this.skills = res.data;
                })
                .catch(error => console.log(error.response.data));
        },
        fetchSkills() {
            axios
                .get("api/skillshow", {
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json"
                    }
                })
                .then(res => {
                    this.allskills = res.data;
                })
                .catch(error => console.log(error.response.data));
        },
        initialize() {
            this.fetchSkillData();
            this.fetchSkills();
        },
        editItem(item) {
            this.editedIndex = this.allskills.indexOf(item);
            this.editedItems = Object.assign({}, item);
            this.dialog = true;
        },

        // deleteItem(item) {
        //   const index = this.skills.indexOf(item);
        //   confirm("Та тухайн ѳгѳгдѳл устгахдаа итгэлтэй байна уу?") &&
        //     this.skills.splice(index, 1);
        //   axios
        //     .delete("//" + item.id)
        //     .then(response => {
        //       console.log(response);
        //     })
        //     .catch(error => console.log(error.response.data));
        // },
        close() {
            this.dialog = false;

            setTimeout(() => {
                this.editedItems = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            }, 300);
        },
        save() {
            if (this.editedIndex > -1) {
                axios
                    .put("/api/skill/" + this.allskills.id, {
                        employee_id: this.skills.id,
                        skill_name: this.editedItems.skill_name,
                        skill_type: this.editedItems.skill_type,
                        skill_level: this.editedItems.skill_level
                    })
                    .then(response => {
                        console.log(response);
                    })
                    .catch(error => console.log(error.response.data));
            } else {
                axios
                    .post("/api/skill", {
                        skill_name: this.editedItems.skill_name,
                        skill_type: this.editedItems.skill_type,
                        skill_level: this.editedItems.skill_level
                    })
                    .then(response => {
                        console.log(response);
                    })
                    .catch(error => console.log(error.response.data));
                this.allskills.push(this.editedItems);
            }
        }
    }
};
</script>
<style>
</style>
