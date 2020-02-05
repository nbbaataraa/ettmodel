<template>
  <v-form v-model="valid">
    <v-container>
      <v-layout>
        <v-flex xs12 md4>
          <v-text-field
            v-model="familyname"
            :rules="nameRules"
            :counter="20"
            label="Ургын овог"
            required
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md4>
          <v-text-field
            v-model="firstname"
            :rules="nameRules"
            :counter="20"
            label="Эцгийн овог"
            required
          ></v-text-field>
        </v-flex>

        <v-flex xs12 md4>
          <v-text-field v-model="lastname" :rules="nameRules" :counter="20" label="Нэр" required></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field v-model="age" :rules="nameRules" :counter="20" label="Нас" required></v-text-field>
        </v-flex>
      </v-layout>
      <v-layout>
        <v-flex xs12 sm6 md4>
          <v-menu
            v-model="bot1"
            :close-on-content-click="false"
            :nudge-right="40"
            lazy
            transition="scale-transition"
            offset-y
            full-width
            min-width="290px"
          >
            <template v-slot:activator="{ on }">
              <v-text-field
                v-model="date"
                label="Тѳрсѳн он сар ѳдѳр"
                prepend-icon="event"
                readonly
                v-on="on"
              ></v-text-field>
            </template>
            <v-date-picker v-model="date" @input="bot1 = false"></v-date-picker>
          </v-menu>
        </v-flex>

        <v-flex xs12 md4>
          <v-text-field
            v-model="employee_birth_place"
            :rules="textArea"
            :counter="50"
            label="Тѳрсѳн газар"
            required
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-textarea
            v-model="employee_address"
            :rules="textArea1"
            :counter="100"
            label="Гэрийн хаяг"
            required
          ></v-textarea>
        </v-flex>
      </v-layout>
      <v-layout>
        <v-flex xs12 md4>
          <v-select v-model="employee_nationality" :items="items" filled label="Яс үндэс" required></v-select>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field
            v-model="social_origin"
            :rules="textArea"
            :counter="50"
            label="Нийгмийн гарал"
            required
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-checkbox
            v-model="employee_isSoldier"
            :label="`Цэрэгт явсан эсэх: ${employee_isSoldier.toString()}`"
            false-value="0"
            true-value="1"
          ></v-checkbox>
        </v-flex>
      </v-layout>
      <v-layout>
        <v-flex xs12 md4>
          <v-text-field
            v-model="employee_n_number"
            :rules="textFields"
            :counter="8"
            label="Нийгмийн даатгалын дугаар"
            required
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field
            v-model="employee_health_number"
            :rules="textFields"
            :counter="8"
            label="Эрүүл мэндийн даатгалын дугаар"
            required
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field
            v-model="employee_drive_license"
            :rules="textFields"
            :counter="8"
            label="Жолооны үнэмлэхний дугаар"
            required
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field
            v-model="employee_drive_license_mine"
            :rules="textFields"
            :counter="8"
            label="Уурхайн жолооны үнэмлэхний дугаар"
            required
          ></v-text-field>
        </v-flex>
      </v-layout>
      <v-layout>
        <v-flex xs12 md4>
          <v-text-field
            v-model="employee_phone_num"
            :rules="textFields"
            :counter="8"
            label="Утасны дугар"
            required
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field
            v-model="employee_phone_num_home"
            :rules="textFields"
            :counter="8"
            label="Гэрийн утасны дугаар"
            required
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field v-model="email1" :rules="emailRules1" label="Цахим хаяг" required></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field v-model="email2" :rules="emailRules2" label="Цахим хаяг" required></v-text-field>
        </v-flex>
      </v-layout>
    </v-container>
  </v-form>
</template>
<script>
export default {
  data: () => ({
    valid: false,
    familyname: "",
    firstname: "",
    lastname: "",
    age: "",
    employee_reg_num: "",
    employee_BOT: "",
    employee_birth_place: "",
    employee_address: "",
    employee_nationality: "",
    employee_social_origin: "",
    employee_n_number: "",
    employee_health_number: "",
    employee_drive_license: "",
    employee_drive_license_mine: "",
    employee_phone_num: "",
    employee_phone_num_home: "",

    nameRules: [
      v => !!v || "Талбарыг бүрэн бѳглѳнѳ үү.",
      v => v.length <= 20 || "20 доош үсэг оруулна уу"
    ],
    textArea: [
      v => !!v || "Талбарыг бүрэн бѳглѳнѳ үү.",
      v => v.length <= 50 || "50 доош үсэг оруулна уу"
    ],
    textArea1: [
      v => !!v || "Талбарыг бүрэн бѳглѳнѳ үү.",
      v => v.length <= 100 || "100 доош үсэг оруулна уу"
    ],
    textFields: [
      v => !!v || "Талбарыг бүрэн бѳглѳнѳ үү.",
      v => v.length <= 8 || "8 доош үсэг оруулна уу"
    ],
    email1: "",
    emailRules1: [
      v => !!v || "Цахим хаяг оруулна уу.",
      v => /.+@.+/.test(v) || "Хүчинтэй цахим хаяг оруулна уу."
    ],
    email2: "",
    emailRules2: [
      v => !!v || "Цахим хаяг оруулна уу.",
      v => /.+@.+/.test(v) || "Хүчинтэй цахим хаяг оруулна уу."
    ],
    date: new Date().toISOString().substr(0, 10),
    bot1: false,
    items: [
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
    employee_isSoldier: 0
  })
};
</script>