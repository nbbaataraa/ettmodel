<template>
  <div>
    <v-toolbar flat color="white">
      <v-toolbar-title>Нийт ажилтан</v-toolbar-title>

      <v-divider class="mx-2" inset vertical></v-divider>
      <v-spacer></v-spacer>
      <v-dialog v-model="dialog" max-width="900px">
        <template v-slot:activator="{ on }">
          <v-btn color="primary" dark class="mb-2" v-on="on">Шинэ ажилтан нэмэх</v-btn>
        </template>
        <v-card>
          <v-card-title>
            <span class="headline">{{ formTitle }}</span>
          </v-card-title>

          <v-card-text>
            <v-container grid-list-md>
              <v-layout wrap>
                <v-text-field
                  v-model="editedItem.family_name"
                  :rules="nameRules"
                  :counter="20"
                  label="Ургын овог"
                  required
                ></v-text-field>
                <v-flex xs12 sm6 md4>
                  <v-text-field
                    v-model="editedItem.fname"
                    :rules="nameRules"
                    :counter="20"
                    label="Эцгийн овог"
                    required
                  ></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field
                    v-model="editedItem.lname"
                    :rules="nameRules"
                    :counter="20"
                    label="Нэр"
                    required
                  ></v-text-field>
                </v-flex>
                <!-- <v-flex xs12 sm6 md4>
                  <v-text-field
                    v-model="editedItem.employee_age"
                    type="number"
                    label="Нас"
                    required
                  ></v-text-field>
                </v-flex>-->
                <v-flex xs12 sm6 md4>
                  <v-text-field
                    v-model="editedItem.employee_reg_num"
                    :rules="nameRules"
                    :counter="20"
                    label="Регистерын дугаар"
                    required
                  ></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-menu
                    v-model="bot1"
                    :close-on-content-click="false"
                    :nudge-right="60"
                    lazy
                    transition="scale-transition"
                    offset-y
                    full-width
                    min-width="290px"
                  >
                    <template v-slot:activator="{ on }">
                      <v-text-field
                        v-model="editedItem.employee_BOT"
                        label="Тѳрсѳн ѳдѳр"
                        prepend-icon="event"
                        readonly
                        v-on="on"
                      ></v-text-field>
                    </template>
                    <v-date-picker v-model="editedItem.employee_BOT" @input="bot1 = false"></v-date-picker>
                  </v-menu>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-textarea
                    v-model="editedItem.employee_bith_place"
                    :rules="textArea"
                    :counter="50"
                    label="Тѳрсѳн газар"
                    required
                  ></v-textarea>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-textarea
                    v-model="editedItem.employee_address"
                    :rules="textArea1"
                    :counter="100"
                    label="Гэрийн хаяг"
                    required
                  ></v-textarea>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-select
                    v-model="editedItem.employee_nationality"
                    :items="items_nation"
                    label="Яс үндэс"
                    required
                  ></v-select>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field
                    v-model="editedItem.employee_social_origin"
                    :rules="textArea"
                    :counter="50"
                    label="Нийгмийн гарал"
                    required
                  ></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-checkbox
                    v-model="editedItem.employee_isSoldier"
                    :label="`Цэрэгт явсан эсэх: ${editedItem.employee_isSoldier}`"
                    false-value="0"
                    true-value="1"
                  ></v-checkbox>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field
                    v-model="editedItem.employee_n_number"
                    :rules="textFields"
                    :counter="8"
                    label="Нийгмийн даатгалын дугаар"
                    required
                  ></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field
                    v-model="editedItem.employee_health_number"
                    :rules="textFields"
                    :counter="8"
                    label="Эрүүл мэндийн даатгалын дугаар"
                    required
                  ></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field
                    v-model.number="editedItem.employee_drive_license"
                    type="number"
                    :rules="textFields"
                    :counter="8"
                    label="Жолооны үнэмлэхний дугаар"
                    required
                  ></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field
                    v-model="editedItem.employee_drive_license_mine"
                    :rules="textFields"
                    :counter="8"
                    label="Уурхайн жолооны үнэмлэхний дугаар"
                    required
                  ></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field
                    v-model.number="editedItem.employee_phone_num"
                    type="number"
                    :rules="textFields"
                    :counter="8"
                    label="Утасны дугар"
                    required
                  ></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field
                    v-model.number="editedItem.employee_phone_num_home"
                    type="number"
                    :rules="textFields"
                    :counter="8"
                    label="Гэрийн утасны дугаар"
                    required
                  ></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field
                    type="email"
                    v-model="editedItem.employee_email1"
                    :rules="emailRules1"
                    label="Primary Цахим хаяг"
                    required
                  ></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-flex md-6>
                    <v-text-field
                      type="email"
                      v-model="editedItem.employee_email2"
                      :rules="emailRules2"
                      label="Secondary Цахим хаяг"
                      required
                    ></v-text-field>
                  </v-flex>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field
                    v-model="editedItem.employee_revenue"
                    :rules="textFields"
                    label="Ѳрхийн орлого"
                    required
                  ></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field
                    v-model="editedItem.employee_sizeOf_suits"
                    :rules="textArea"
                    label="Хувцасны хэмжээ"
                    required
                  ></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-select
                    v-model="editedItem.employee_appointment"
                    :items="items_appoint"
                    filled
                    label="Албан тушаал"
                    required
                  ></v-select>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-select
                    v-model="editedItem.employee_department"
                    :items="items_dep"
                    filled
                    label="Хэлтэс нэгж"
                    required
                  ></v-select>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-select
                    v-model="editedItem.employee_shift"
                    :items="items_shift"
                    filled
                    label="Ээлж"
                    required
                  ></v-select>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-text-field
                    v-model="editedItem.employee_live_location"
                    :rules="textArea1"
                    label="Оршин суугаа хаяг"
                    required
                  ></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md4>
                  <v-select
                    v-model="editedItem.employee_campus"
                    :items="items_campus"
                    filled
                    label="Хотхон"
                    required
                  ></v-select>
                </v-flex>
              </v-layout>
            </v-container>
          </v-card-text>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="blue darken-1" flat @click="close">Болих</v-btn>
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
    <v-data-table :headers="headers" :items="employees" :search="search" class="elevation-1">
      <template v-slot:items="props">
        <td class="text-xs-right">{{ props.item.lname }}</td>
        <td class="text-xs-right">{{ props.item.fname }}</td>
        <td class="text-xs-right">{{ props.item.employee_phone_num }}</td>
        <td class="text-xs-right">{{ props.item.employee_phone_num_home }}</td>
        <td class="text-xs-right">{{ props.item.employee_email1 }}</td>
        <td class="text-xs-right">
          <v-icon color="primary" small class="mr-2" @click="editItem(props.item)">edit</v-icon>
          <v-icon color="red" small @click="deleteItem(props.item)">delete</v-icon>
        </td>
      </template>
      <template v-slot:no-data>
        <v-btn color="primary" @click="initialize">Reset</v-btn>
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

<script>
export default {
  data: () => ({
    dialog: false,
    search: "",
    headers: [
      { text: "Овог", value: "lname", align: "right", sortable: true },
      { text: "Нэр", value: "fname", align: "right" },
      { text: "Гар утас", value: "employee_phone_num", align: "right" },
      { text: "Гэрийн утас", value: "employee_phone_num_home", align: "right" },
      { text: "Цахим хаяг", value: "employee_email1", align: "right" },
      { text: "Үйлдэлүүд", value: "name", sortable: false, align: "right" }
    ],

    employees: [],
    editedIndex: -1,
    editedItem: {
      valid: false,
      family_name: "",
      fname: "",
      lname: "",
      // employee_age: "",
      employee_reg_num: "",
      employee_BOT: "",
      employee_bith_place: "",
      employee_address: "",
      employee_nationality: "",
      employee_social_origin: "",
      employee_isSoldier: 0,
      employee_n_number: "",
      employee_health_number: "",
      employee_drive_license: "",
      employee_drive_license_mine: "",
      employee_phone_num: "",
      employee_phone_num_home: "",
      employee_email1: "",
      employee_email2: "",
      employee_revenue: "",
      employee_sizeOf_suits: "",
      employee_appointment: "",
      employee_department: "",
      employee_shift: "",
      employee_live_location: "",
      employee_campus: ""
    },

    items_nation: [
      "Халх",
      "Казак",
      "Дөрвөд",
      "Буриад",
      "Баяд",
      "Дарьганга",
      "Урианхай",
      "Захчин",
      "Дархад",
      "Торгууд",
      "Өөлд",
      "Хотон",
      "Мянгад",
      "Барга",
      "Үзэмчин",
      "Орос",
      "Хятад",
      "Бусад",
      "Гадаадын харъяат"
    ],
    items_dep: ["ЗУХ", "УОХ", "ТАЗМ", "НАЛХ", "ХАБЭА", "БОУБХ"],
    items_appoint: [
      "Захирал",
      "Орлогч Захирал",
      "Тѳлѳвлѳлт ерѳнхий инженер",
      "Ашиглалт ерѳнхий инженер",
      "Ахлах инженер",
      "Ахлах мэргэжилтэн",
      "Инженер",
      "мэргэжилтэн",
      "Ажилтан",
      "Туслах ажилтан",
      "Гэрээт ажилтан"
    ],
    items_shift: ["А ээлж", "Б ээлж", "В ээлж", "Г ээлж"],
    items_campus: ["Цанхи", "Эрдэнэс", "ИДМН", "Сум", "Wagner Asia"],
    nameRules: [
      v => !!v || "Талбарыг бүрэн бѳглѳнѳ үү."
      // v => v.length <= 20 || "20 доош үсэг оруулна уу"
    ],
    textArea: [
      v => !!v || "Талбарыг бүрэн бѳглѳнѳ үү."
      // v => v.length <= 50 || "50 доош үсэг оруулна уу"
    ],
    textArea1: [
      v => !!v || "Талбарыг бүрэн бѳглѳнѳ үү."
      // v => v.length <= 100 || "100 доош үсэг оруулна уу"
    ],
    textFields: [
      v => !!v || "Талбарыг бүрэн бѳглѳнѳ үү."
      // v => v.length <= 8 || "8 доош үсэг оруулна уу"
    ],
    email1: "",
    emailRules1: [
      v => !!v || "Цахим хаяг оруулна уу."
      // v => /.+@.+/.test(v) || "Хүчинтэй цахим хаяг оруулна уу."
    ],
    email2: "",
    emailRules2: [
      v => !!v || "Цахим хаяг оруулна уу.",
      v => /.+@.+/.test(v) || "Хүчинтэй цахим хаяг оруулна уу."
    ],
    date: new Date().toISOString().substr(0, 10),

    bot1: false,

    defaultItem: {
      name: ""
    }
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "Шинэ хэрэглэгч" : "Хэрэглэгч засварлах";
    }
  },

  watch: {
    dialog(val) {
      val || this.close();
    }
  },

  created() {
    this.initialize();
  },

  methods: {
    fetchData() {
      axios
        .get("/api/employee")
        .then(res => (this.employees = res.data))
        .catch(error => console.log(error.response.data));
    },
    initialize() {
      this.fetchData();
    },
    editItem(item) {
      this.editedIndex = this.employees.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },

    deleteItem(item) {
      const index = this.employees.indexOf(item);
      confirm("Та тухайн ѳгѳгдѳл устгахдаа итгэлтэй байна уу?") &&
        this.employees.splice(index, 1);

      axios
        .delete("/api/employee/" + item.id)
        .then(response => {
          console.log(response);
        })
        .catch(error => console.log(error.response.data));
    },

    close() {
      this.dialog = false;
      setTimeout(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      }, 300);
    },

    save() {
      if (this.editedIndex > -1) {
        axios
          .put("/api/employee/" + this.editedItem.id, {
            family_name: this.editedItem.family_name,
            fname: this.editedItem.fname,
            lname: this.editedItem.lname,
            // employee_age: this.editItem.employee_age,
            employee_reg_num: this.editedItem.employee_reg_num,
            employee_BOT: this.editedItem.employee_BOT,
            employee_bith_place: this.editedItem.employee_bith_place,
            employee_address: this.editedItem.employee_address,
            employee_nationality: this.editedItem.employee_nationality,
            employee_social_origin: this.editedItem.employee_social_origin,
            employee_isSoldier: this.editedItem.employee_isSoldier,
            employee_n_number: this.editedItem.employee_n_number,
            employee_health_number: this.editedItem.employee_health_number,
            employee_drive_license: this.editedItem.employee_drive_license,
            employee_drive_license_mine: this.editedItem
              .employee_drive_license_mine,
            employee_phone_num: this.editedItem.employee_phone_num,
            employee_phone_num_home: this.editedItem.employee_phone_num_home,
            employee_email1: this.editedItem.employee_email1,
            employee_email2: this.editedItem.employee_email2,
            employee_revenue: this.editedItem.employee_revenue,
            employee_sizeOf_suits: this.editedItem.employee_sizeOf_suits,
            employee_appointment: this.editedItem.employee_appointment,
            employee_department: this.editedItem.employee_department,
            employee_shift: this.editedItem.employee_shift,
            employee_live_location: this.editedItem.employee_live_location,
            employee_campus: this.editedItem.employee_campus
          })
          .then(response => {
            console.log(response);
          })
          .catch(error => console.log(error.response.data));
        Object.assign(this.employees[this.editedIndex], this.editedItem);
      } else {
        axios
          .post("/api/employee", {
            family_name: this.editedItem.family_name,
            fname: this.editedItem.fname,
            lname: this.editedItem.lname,
            // employee_age: this.editItem.employee_age,
            employee_reg_num: this.editedItem.employee_reg_num,
            employee_BOT: this.editedItem.employee_BOT,
            employee_bith_place: this.editedItem.employee_bith_place,
            employee_address: this.editedItem.employee_address,
            employee_nationality: this.editedItem.employee_nationality,
            employee_social_origin: this.editedItem.employee_social_origin,
            employee_isSoldier: this.editedItem.employee_isSoldier,
            employee_n_number: this.editedItem.employee_n_number,
            employee_health_number: this.editedItem.employee_health_number,
            employee_drive_license: this.editedItem.employee_drive_license,
            employee_drive_license_mine: this.editedItem
              .employee_drive_license_mine,
            employee_phone_num: this.editedItem.employee_phone_num,
            employee_phone_num_home: this.editedItem.employee_phone_num_home,
            employee_email1: this.editedItem.employee_email1,
            employee_email2: this.editedItem.employee_email2,
            employee_revenue: this.editedItem.employee_revenue,
            employee_sizeOf_suits: this.editedItem.employee_sizeOf_suits,
            employee_appointment: this.editedItem.employee_appointment,
            employee_department: this.editedItem.employee_department,
            employee_shift: this.editedItem.employee_shift,
            employee_live_location: this.editedItem.employee_live_location,
            employee_campus: this.editedItem.employee_campus
          })
          .then(response => {
            console.log(response);
          })
          .catch(error => console.log(error.response.data));
        this.employees.push(this.editedItem);
      }
      this.close();
    }
  }
};
</script>