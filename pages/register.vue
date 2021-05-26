<template>
  <v-container fill-height fluid>
    <v-row align="center" justify="center">
      <v-col xl="5" lg="5" md="5" sm="12" xs="12">
        <v-form>
          <v-card>
            <v-card-title class="headline blue white--text">
              Register
            </v-card-title>
            <v-divider />
            <v-card-text>
              <v-text-field
                v-model="username"
                filled
                rounded
                label="username"
                type="text"
              />
              <v-text-field
                v-model="email"
                filled
                rounded
                label="Email Address"
                type="email"
              />
              <v-text-field
                v-model="phone"
                filled
                rounded
                label="Phone Number"
                type="text"
              />
              <v-select
                v-model="roleUser"
                filled
                rounded
                label="Role"
                :items="itemsRoleSelect"
              />
              <v-text-field
                v-model="password"
                filled
                rounded
                label="Password"
                type="password"
              />
              <v-text-field
                v-model="reTypePassword"
                filled
                rounded
                label="Retype Password"
                type="password"
              />
            </v-card-text>
            <v-divider />
            <v-card-actions>
              <v-spacer />
              <v-btn type="submit" color="blue" dark @click.prevent="register">
                Register
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-form>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { mapActions } from 'vuex'
export default {
  name: 'Register',
  data: () => ({
    itemsRoleSelect: ['User', 'Builder', 'Architect', 'Designer'],
    username: null,
    email: null,
    phone: null,
    roleUser: null,
    password: null,
    reTypePassword: null,
  }),
  methods: {
    ...mapActions({
      showHideSnackbar: 'snackbars/showHideProcess',
    }),
    async register() {
      try {
        const { data } = await this.$axios.post('register', {
          username: this.username,
          email: this.email,
          phone: this.phone,
          roleUser: this.roleUser,
          password: this.password,
        })
        this.$router.push('email_verification')
        this.showHideSnackbar({
          status: true,
          msg: data,
        })
      } catch (e) {
        // console.log(e)
      }
    },
  },
}
</script>

<style scoped></style>
