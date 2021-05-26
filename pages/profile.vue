<template>
  <v-container>
    <v-row style="margin-top: 5%">
      <v-col>
        <v-card tile flat>
          <v-card-text>
            <v-row>
              <v-col
                align="center"
                class="mx-auto"
                xl="3"
                lg="3"
                md="3"
                sm="12"
                xs="12"
              >
                <v-avatar size="200">
                  <v-img :src="require(`~/assets/img/img_user.png`)" />
                </v-avatar>
                <v-btn block dark text rounded class="mt-3" color="orange">
                  Change Photo
                </v-btn>
              </v-col>
              <v-col xl="9" lg="9" md="9" sm="12" xs="12">
                <v-row>
                  <v-col xs="12" sm="12" md="6" lg="6" xl="6">
                    <v-text-field v-model="username" label="Name" />
                  </v-col>
                  <v-col xs="12" sm="12" md="6" lg="6" xl="6">
                    <v-text-field v-model="email" label="Email" />
                  </v-col>
                  <v-col xs="12" sm="12" md="6" lg="6" xl="6">
                    <v-text-field v-model="phone" label="Phone" />
                  </v-col>
                  <v-col xs="12" sm="12" md="6" lg="6" xl="6">
                    <v-text-field v-model="address" label="Address" />
                  </v-col>
                  <v-col xs="12" sm="12" md="6" lg="6" xl="6">
                    <v-text-field v-model="newPass" label="New password" />
                  </v-col>
                  <v-col xs="12" sm="12" md="6" lg="6" xl="6">
                    <v-text-field
                      v-model="reTypeNewPass"
                      label="Retype new password"
                    />
                  </v-col>
                </v-row>
              </v-col>
            </v-row>
          </v-card-text>
          <v-card-actions>
            <v-spacer />
            <v-btn color="orange" dark text @click="updateDataUser">
              Save change
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { mapActions } from 'vuex'
export default {
  name: 'Profile',
  data: () => ({
    username: null,
    email: null,
    phone: null,
    address: null,
    newPass: null,
    reTypeNewPass: null,
  }),
  mounted() {
    this.getDataUserByEmail()
  },
  methods: {
    ...mapActions({
      showHideSnackbar: 'snackbars/showHideProcess',
    }),
    async getDataUserByEmail() {
      const userData = await JSON.parse(window.localStorage.vuex)
      const { data } = await this.$axios.post('user/data/filter/email', {
        emailUser: userData.login.email,
      })
      this.username = data.dataUser.name
      this.email = data.dataUser.email
      this.phone = data.dataUser.phone
      this.address = data.dataUser.address
    },
    async updateDataUser() {
      const userData = await JSON.parse(window.localStorage.vuex)
      const { data } = await this.$axios.post('user/data/update', {
        name: this.username,
        email: this.email,
        phone: this.phone,
        address: this.address,
        password: this.newPass,
        emailBefore: userData.login.email,
      })
      this.getDataUserByEmail()
      this.showHideSnackbar({
        status: true,
        msg: data.msg,
      })
    },
  },
}
</script>

<style scoped></style>
