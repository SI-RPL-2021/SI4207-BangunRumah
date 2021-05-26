<template>
  <v-app dark>
    <v-app-bar fixed app>
      <v-img
        :src="require(`~/assets/img/logo_bangunrumah.png`)"
        class="mx-2"
        max-height="40"
        max-width="40"
        contain
        style="cursor: pointer"
        @click.native="$router.push('/')"
      />
      <v-text-field
        append-icon="mdi-magnify"
        single-line
        hide-details
        label="Search"
        filled
        rounded
      />
      <v-spacer />
      <v-menu offset-y open-on-hover bottom>
        <template #activator="{ on, attrs }">
          <v-btn depressed class="mx-1" v-bind="attrs" v-on="on">
            Booking
          </v-btn>
        </template>
        <v-list>
          <v-list-item link to="/architect_list">
            <v-list-item-title>Architect</v-list-item-title>
          </v-list-item>
          <v-list-item link to="/designer_list">
            <v-list-item-title>Design Interior</v-list-item-title>
          </v-list-item>
          <v-list-item link to="/worker_list">
            <v-list-item-title>Renovation</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
      <v-btn
        to="my_order"
        v-if="getRoleUser === 'User' && getIsLogin === true"
        depressed
        class="mx-1"
      >
        My Orders
      </v-btn>
      <v-btn
        to="/my_jobs"
        v-if="
          getRoleUser !== 'User' &&
          getRoleUser !== 'Admin' &&
          getIsLogin === true
        "
        class="mx-1"
        depressed
      >
        My Jobs
      </v-btn>
      <v-btn to="/about_us" depressed class="mx-1">About Us</v-btn>
      <v-btn depressed class="mx-1 mr-6">Testimonial</v-btn>
      <v-btn
        v-if="getIsLogin === false"
        to="login"
        class="ml-6 blue--text mr-3"
        depressed
      >
        Login
      </v-btn>
      <v-btn
        v-if="getIsLogin === false"
        to="register"
        outlined
        color="blue"
        depressed
      >
        Register
      </v-btn>
      <v-menu v-if="getIsLogin === true" offset-y open-on-hover bottom>
        <template #activator="{ on, attrs }">
          <v-btn depressed icon class="mx-1" v-bind="attrs" v-on="on">
            <v-icon>mdi-account</v-icon>
          </v-btn>
        </template>
        <v-list>
          <v-list-item link to="/profile">
            <v-list-item-title>Profile</v-list-item-title>
          </v-list-item>
          <v-list-item link @click="logOut">
            <v-list-item-title>Log Out</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-app-bar>
    <v-main>
      <nuxt />
      <v-snackbar v-model="getStatusShowHideSnackbar" timeout="1000000000">
        {{ getMsgSnackbar }}

        <template #action="{ attrs }">
          <v-btn color="pink" text v-bind="attrs" @click="closeSnackbar">
            Close
          </v-btn>
        </template>
      </v-snackbar>
    </v-main>
  </v-app>
</template>

<script>
import { mapActions } from 'vuex'
export default {
  data: () => ({
    snackbar: false,
    message: 'Haloha',
  }),
  computed: {
    getStatusShowHideSnackbar() {
      return this.$store.getters['snackbars/statusShow']
    },
    getMsgSnackbar() {
      return this.$store.getters['snackbars/msgSnackbar']
    },
    getIsLogin() {
      return this.$store.getters['login/isLogin']
    },
    getRoleUser() {
      return this.$store.getters['login/roleUser']
    },
  },
  methods: {
    ...mapActions({
      showHideSnackbar: 'snackbars/showHideProcess',
      setStatusLogin: 'login/setLoginStatus',
    }),
    closeSnackbar() {
      this.showHideSnackbar({
        status: false,
        msg: null,
      })
    },
    logOut() {
      this.setStatusLogin({
        status: false,
        email: null,
      })
      this.$router.push('/')
    },
  },
}
</script>
