<template>
  <nav>
    <!-- Drawer эхлэл -->
    <v-navigation-drawer app v-model="drawer" class="amber accent-4">
      <!-- To Side Links -->

      <v-list>
        <!-- Үндсэн цэс Drawer-т нэмэх -->

        <v-list-tile v-for="link in lin" :key="link.text" :to="link.route" v-if="link.show">
          <v-list-tile-action>
            <v-icon class="white--text">{{ link.icon }}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title class="white--text">
              {{
              link.text
              }}
            </v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>

        <!-- Туслах цэс буюу Tree drawer-т нэмэх Эхлэл -->
        <v-list-group class="white--text" prepend-icon="account_circle" value="true">
          <template v-slot:activator>
            <v-list-tile>
              <v-list-tile-title>Хүний нѳѳц</v-list-tile-title>
            </v-list-tile>
          </template>

          <v-list-group class="white--text" no-action sub-group value="true">
            <template v-slot:activator>
              <v-list-tile>
                <v-list-tile-title>Бүртгэл</v-list-tile-title>
              </v-list-tile>
            </template>
            <!-- Скрипттэй холбох хэсэг -->

            <v-list-tile v-for="link in links" :key="link.text" :to="link.route" v-if="link.show">
              <v-list-tile-action>
                <v-icon class="white--text">
                  {{
                  link.icon
                  }}
                </v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                <v-list-tile-title class="white--text">
                  {{
                  link.text
                  }}
                </v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>

            <!-- Скрипттэй холбох хэсэг тѳгсгѳл -->
          </v-list-group>
        </v-list-group>
        <!-- Мэдээлэл технологийн дэд цэс үүн дээр v-for гүйлгэхдээ скриптийн датаг ѳѳрчлѳх хэрэгтэй -->

        <!-- Туслах цэс нэмэх тѳгсгѳл -->
      </v-list>
    </v-navigation-drawer>
    <!-- Drawer тѳгсгѳл -->
    <!-- Toolbar эхлэл -->

    <v-toolbar app color="amber lighten-3" light>
      <v-toolbar-side-icon @click="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>Эрдэнэс Тавантолгой ХК</v-toolbar-title>
      <v-spacer></v-spacer>
      <div>
        <router-link v-for="link in tools" :key="link.text" :to="link.to" v-if="link.show">
          <v-btn icon tag="li">
            <v-icon>{{ link.icon }}</v-icon>
          </v-btn>
        </router-link>
      </div>
    </v-toolbar>
    <!-- Toolbar тѳгсгѳл -->
  </nav>
</template>

<script>
export default {
  data() {
    return {
      drawer: true,
      links: [
        {
          icon: "assignment_ind",
          text: "Ажилтны жагсаалт",
          route: "/userlist",
          show: User.loggedIn()
        },
        {
          icon: "assignment",
          text: "Ур чадвар",
          route: "/skills",
          show: User.loggedIn()
        }

        // Роуте, icon, текст-үүдийг энд зарлаж ѳгнѳ.
        // {
        //   icon: "dashboard",
        //   text: "Диспатчер",
        //   route: "/dispatcher"
        // },
        // {
        //   icon: "settings_remote",
        //   text: "Станц",
        //   route: "/station"
        // }
      ],
      lin: [
        {
          icon: "dashboard",
          text: "Хянах самбар",
          route: "/dashboard",
          show: User.loggedIn()
        },
        {
          icon: "add",
          text: "Систем хэрэглэгч Бүртгэх",
          route: "/signup",
          show: User.loggedIn()
        }

        // Роуте, icon, текст-үүдийг энд зарлаж ѳгнѳ.
        // {
        //   icon: "dashboard",
        //   text: "Диспатчер",
        //   route: "/dispatcher"
        // },
        // {
        //   icon: "settings_remote",
        //   text: "Станц",
        //   route: "/station"
        // }
      ],
      tools: [
        {
          text: "Нэвтрэх",
          to: "/login",
          icon: "exit_to_app",
          show: !User.loggedIn()
        },
        {
          text: "Гарах",
          to: "/logout",
          icon: "touch_app",
          show: User.loggedIn()
        }
      ]
    };
  },
  created() {
    EventBus.$on("logout", () => {
      User.logOut();
    });
  }
};
</script>
<style>
a {
  text-decoration: none;
}
</style>
