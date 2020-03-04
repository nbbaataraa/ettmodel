<template>
  <v-container>
    <v-layout class="justify-center">
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
      </form>
    </v-layout>
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
  created() {
    if (User.loggedIn()) {
      this.$router.push({ name: "dashboard" });
    }
  },
  methods: {
    login() {
      User.login(this.form);
      // this.$router.push({ name: "dashboard" });
    }
  }
};
</script>
<style >
a {
  text-decoration: none;
}
</style>
