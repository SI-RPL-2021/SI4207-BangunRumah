<template>
  <v-container>
    <v-card>
      <v-toolbar color="blue" dark>
        <v-toolbar-title>Data User</v-toolbar-title>
        <v-spacer />
        <v-btn icon depressed @click.native="dialogFormAddNewUser = true">
          <v-icon>mdi-plus</v-icon>
        </v-btn>
      </v-toolbar>
      <v-data-table
        :headers="headersTableDataUser"
        :items="itemsTableDataUser"
        :items-per-page="5"
        class="elevation-1"
      ></v-data-table>
    </v-card>
    <v-dialog v-model="dialogFormAddNewUser" scrollable width="500">
      <v-card>
        <v-card-title class="headline blue white--text">
          Add new User
        </v-card-title>
        <v-card>
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
            <v-btn color="danger" text @click="dialogFormAddNewUser = false">
              Close
            </v-btn>
            <v-btn type="submit" color="blue" dark @click.prevent="register">
              Add new User
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-card>
    </v-dialog>
  </v-container>
</template>

<script>
import { mapActions } from 'vuex'
export default {
  name: 'Dashboard',
  middleware: 'isAdmin',
  data: () => ({
    headersTableDataUser: [
      {
        text: 'Nama',
        align: 'start',
        value: 'name',
      },
      {
        text: 'Email',
        align: 'start',
        value: 'email',
      },
      {
        text: 'Phone',
        align: 'start',
        value: 'phone',
      },
      {
        text: 'Role user',
        align: 'start',
        value: 'role_user',
      },
    ],
    itemsTableDataUser: [],
    dialogFormAddNewUser: false,
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

    async getDataUser() {
      const { data } = await this.$axios.get('user/data')
      this.itemsTableDataUser = data.dataUser
    },
    async register() {
      try {
        await this.$axios.post('register', {
          username: this.username,
          email: this.email,
          phone: this.phone,
          roleUser: this.roleUser,
          password: this.password,
        })
        this.dialogFormAddNewUser = false
        this.getDataUser()
        this.username = null
        this.email = null
        this.phone = null
        this.roleUser = null
        this.password = null
        this.reTypePassword = null
        this.showHideSnackbar({
          status: true,
          msg: 'Data user berhasil ditambah!',
        })
      } catch (e) {
        // console.log(e)
      }
    },
  },
  mounted() {
    this.getDataUser()
  },
}
</script>

<style scoped></style>
