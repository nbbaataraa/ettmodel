<template>
  <v-app>
    <NavBar></NavBar>
    <v-content class="mx-5 mb-5">
      <router-view></router-view>
    </v-content>
    <Footer></Footer>
  </v-app>
</template>
<script>
import NavBar from "./NavBar.vue";
import Footer from "./Footer.vue";
import Dashboard from "./ViewComponents/hr/Dashboard.vue";
export default {
  components: {
    NavBar,
    Dashboard,
    Footer
  }
};
</script>
