<template>
  <v-container>
    <form @submit.prevent="login">
      <v-text-field
        v-model="form.email"
        :rules="emailRules"
        label="Цахим хаяг"
        type="text"
        required
      ></v-text-field>
      <v-text-field v-model="form.password" label="Нууц үг" type="password" required></v-text-field>
      <v-btn color="success" type="submit">Нэвтрэх</v-btn>
      <router-link to="/signup">
        <v-btn color="teal darken-3 white--text">Бүртгүүлэх</v-btn>
      </router-link>
    </form>
  </v-container>
</template>
<script>
export default {
  data() {
    return {
      form: {
        email: null,
        password: null
      },
      emailRules: [
        v => !!v || "Талбарыг бѳгѳлнѳ үү.",
        v => /.+@.+/.test(v) || "Хүчин тѳгѳлдѳр Цахим хаяг оруулна уу."
      ]
    };
  },
  methods: {
    login() {
      User.login(this.form);
    }
  }
};
</script> 