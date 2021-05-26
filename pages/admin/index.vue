<template>
  <v-container fill-height fluid>
    <v-row align="center" justify="center">
      <v-col xl="5" lg="5" md="5" sm="12" xs="12">
        <v-form>
          <v-card>
            <v-card-title class="headline red white--text">
              Login Admin
            </v-card-title>
            <v-divider />
            <v-card-text>
              <v-text-field
                v-model="email"
                filled
                rounded
                label="Email Address"
                type="email"
                color="red"
              />
              <v-text-field
                v-model="password"
                filled
                rounded
                label="Password"
                type="password"
                color="red"
              />
            </v-card-text>
            <v-divider />
            <v-card-actions>
              <v-spacer />
              <v-btn
                type="submit"
                color="red"
                dark
                @click.prevent="loginProcess"
              >
                Login
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
  name: 'AdminLogin',
  data: () => ({
    email: null,
    password: null,
  }),
  methods: {
    ...mapActions({
      showHideSnackbar: 'snackbars/showHideProcess',
      setStatusLogin: 'login/setLoginStatus',
    }),
    async loginProcess() {
      try {
        const { data } = await this.$axios.post('login', {
          email: this.email,
          password: this.password,
        })
        if (data.status === 200) {
          this.setStatusLogin({
            status: true,
            email: this.email,
            roleUser: data.dataUser.role_user,
          })
          this.showHideSnackbar({
            status: true,
            msg: data.msg,
          })
          this.$router.push('/admin/dashboard')
        } else if (data.status === 400) {
          this.showHideSnackbar({
            status: true,
            msg: data.msg,
          })
        }
      } catch (e) {
        alert(e)
      }
    },
  },
}
</script>

<style scoped></style>
