<template>
  <v-container>
    <v-layout class="justify-center">
      <form @submit.prevent="signup">
        <v-text-field v-model="form.name" label="Хэрэглэгчийн нэр" type="text"></v-text-field>
        <span class="red--text" v-if="errors.name">
          {{
          errors.name[0]
          }}
        </span>
        <v-text-field v-model="form.email" :rules="emailRules" label="Цахим хаяг" type="text"></v-text-field>
        <span class="red--text" v-if="errors.email">
          {{
          errors.email[0]
          }}
        </span>
        <v-text-field v-model="form.password" label="Нууц үг" type="password"></v-text-field>
        <span class="red--text" v-if="errors.password">
          {{
          errors.password[0]
          }}
        </span>
        <v-text-field
          v-model="form.password_confirmation"
          label="Нууц үг баталгаажуулах"
          type="password"
        ></v-text-field>
        <v-btn color="success" type="submit">Бүртгэх</v-btn>
        <router-link to="/login">
          <v-btn color="grey darken-3 white--text">Нэвтрэх</v-btn>
        </router-link>
      </form>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null
      },
      emailRules: [
        v => !!v || "Талбарыг бѳгѳлнѳ үү.",
        v => /.+@.+/.test(v) || "Хүчин тѳгѳлдѳр Цахим хаяг оруулна уу."
      ],
      errors: {}
    };
  },

  methods: {
    signup() {
      axios
        .post("/api/auth/signup", this.form)
        .then(res => {
          User.responseAfterLogin(res);
          //this.$router.push({ name: "dashboard" });
        })
        .catch(error => (this.errors = error.response.data.errors));
      alert("Success!!!");
    }
  }
};
</script>
<style >
a {
  text-decoration: none;
}
</style>