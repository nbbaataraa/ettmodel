<template>
  <v-container>
    <v-form ref="form" v-model="valid" lazy-validation>
      <!-- <v-text-field
        v-model="password"
        :counter="25"
        :rules="nameRules"
        label="Нэвтрэх нэр"
        required
      ></v-text-field>-->

      <v-text-field v-model="email" :rules="emailRules" label="Нэвтрэх нэр" required></v-text-field>
      <v-text-field v-model="password" :type="'password'" label="Нууц үг" required></v-text-field>

      <v-btn color="success" @click="validate">Нэвтрэх</v-btn>
    </v-form>
  </v-container>
</template>
<script>
export default {
  data: () => ({
    valid: true,
    name: "",
    nameRules: [
      v => !!v || "Талбарыг бѳгѳлнѳ үү.",
      v => (v && v.length <= 25) || "25 үсэгнээс доош утга оруулна уу."
    ],
    email: "",
    emailRules: [
      v => !!v || "Талбарыг бѳгѳлнѳ үү.",
      v => /.+@.+/.test(v) || "Хүчин тѳгѳлдѳр Цахим хаяг оруулна уу."
    ]
  }),

  methods: {
    validate() {
      this.$refs.form.validate();
    }
  }
};
</script> 