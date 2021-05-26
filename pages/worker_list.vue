<template>
  <div>
    <v-img :src="require(`~/assets/img/headerfinddesigner.png`)">
      <v-container>
        <v-row no-gutters justify="center">
          <v-col></v-col>
          <v-col align-self="center">
            <v-card class="pa-2 transparent mt-6" flat tile>
              <v-card-title
                class="blue--text headline justify-center"
                style="font-size: 25px !important"
              >
                Booking Our Designers!
              </v-card-title>
              <v-card-text style="font-size: 17px" class="text-center">
                Your can start searching by filtering about your main interest
                home design, home style, and many more so we can offer the best
                option for you.
              </v-card-text>
            </v-card>
          </v-col>
          <v-col></v-col>
        </v-row>
      </v-container>
    </v-img>

    <v-container>
      <v-row>
        <v-col xl="4" lg="4" md="4" sm="12" xs="12">
          <v-card>
            <v-card-title>
              <v-text-field
                append-icon="mdi-magnify"
                single-line
                hide-details
                label="Search"
                filled
                rounded
              />
            </v-card-title>
            <v-divider />
            <v-card-text>
              <span>Filter</span>
              <v-checkbox
                v-model="selectedCheckBoxAddress"
                label="Jakarta"
                color="blue"
                value="jakarta"
                hide-details
                @click="selectedAddress"
              />
              <v-checkbox
                v-model="selectedCheckBoxAddress"
                label="Bandung"
                color="blue"
                value="bandung"
                hide-details
                @click="selectedAddress"
              />
              <v-checkbox
                v-model="selectedCheckBoxAddress"
                label="Solo"
                color="blue"
                value="solo"
                hide-details
                @click="selectedAddress"
              />
            </v-card-text>
          </v-card>
        </v-col>
        <v-col xl="8" lg="8" md="8" sm="12" xs="12">
          <v-row>
            <v-col
              v-for="worker in dataWorker"
              :key="worker.id"
              xl="4"
              lg="4"
              md="4"
              sm="12"
              xs="12"
            >
              <v-card max-width="344">
                <v-img
                  :src="require(`~/assets/img/findarchitect.png`)"
                  height="200px"
                />

                <v-card-title>
                  {{ worker.name }}
                </v-card-title>

                <v-card-subtitle>
                  <v-rating hover length="5" size="14" :value="4.6" />
                </v-card-subtitle>

                <v-card-actions>
                  <v-btn
                    color="orange lighten-2"
                    class="text-center"
                    dark
                    block
                    @click="selectedWorker(worker)"
                  >
                    Contact
                  </v-btn>
                </v-card-actions>
              </v-card>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
    <v-dialog v-model="showDetailDataWorker" width="500">
      <v-card>
        <v-card-title class="headline">
          Contact Worker
          <v-spacer />
          <v-btn icon color="red" @click.native="showDetailDataWorker = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-divider />
        <v-card-text>
          <v-text-field v-model="name" label="Name" disabled />
          <v-text-field v-model="email" label="Email" disabled />
          <v-text-field v-model="address" label="Address" disabled />
          <v-text-field v-model="phone" label="Phone" disabled />
        </v-card-text>
        <v-card-actions>
          <v-spacer />
          <v-btn dark color="orange" @click="openDialogOrder">Order</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-dialog v-model="dialogOrder" width="500">
      <v-form>
        <v-card>
          <v-card-title class="headline">
            Order
            <v-spacer />
            <v-btn icon color="red" @click.native="dialogOrder = false">
              <v-icon>mdi-close</v-icon>
            </v-btn>
          </v-card-title>
          <v-divider />
          <v-card-text>
            <v-text-field v-model="projectName" label="Project Name" />
            <v-text-field v-model="owner" label="Owner" />
            <v-text-field v-model="ownerPhone" label="Owner Phone" />
            <v-text-field v-model="projectAddress" label="Project Address" />
            <v-text-field v-model="projectPirce" label="Project Price" />
          </v-card-text>
          <v-card-actions>
            <v-spacer />
            <v-btn type="submit" dark color="blue" @click.prevent="createOrder">
              Send Order
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-form>
    </v-dialog>
  </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
  name: 'WorkerList',
  data: () => ({
    dataWorker: [],
    showDetailDataWorker: false,
    name: null,
    email: null,
    address: null,
    phone: null,
    selectedCheckBoxAddress: null,
    dialogOrder: false,
    projectName: null,
    owner: null,
    ownerPhone: null,
    projectAddress: null,
    projectPirce: null,
    idWorker: null,
  }),
  mounted() {
    this.getDataWorker()
  },
  methods: {
    ...mapActions({
      showHideSnackbar: 'snackbars/showHideProcess',
    }),
    async getDataWorker() {
      const { data } = await this.$axios.get('worker/data')
      this.dataWorker = data.dataWorker
    },
    selectedWorker(data) {
      this.idWorker = data.id
      this.name = data.name
      this.email = data.email
      this.address = data.address
      this.phone = data.phone
      this.showDetailDataWorker = true
    },
    async selectedAddress() {
      const { data } = await this.$axios.post('worker/data/filter/city', {
        city: this.selectedCheckBoxAddress,
      })
      this.dataWorker = data.dataWorker
    },
    openDialogOrder() {
      this.dialogOrder = true
      this.showDetailDataWorker = false
    },
    async createOrder() {
      const userData = JSON.parse(window.localStorage.vuex)
      if (!userData.login.isLogin) {
        return this.redirectLogin()
      }
      try {
        const { data } = await this.$axios.post('order', {
          email: userData.login.email,
          owner: this.owner,
          projectName: this.projectName,
          ownerPhone: this.ownerPhone,
          projectAddress: this.projectAddress,
          projectPirce: this.projectPirce,
          idWorker: this.idWorker,
          typeProject: 'Builder',
        })
        this.showHideSnackbar({
          status: true,
          msg: data.msg,
        })
        this.owner = null
        this.projectName = null
        this.ownerPhone = null
        this.projectAddress = null
        this.projectPirce = null
        this.dialogOrder = false
      } catch (e) {
        // console.log(e)
      }
    },
    redirectLogin() {
      if (!this.isLogin) {
        this.showHideSnackbar({
          status: true,
          msg: 'Silahkan login terlebih dahulu untuk order!',
        })
        return this.$router.push('/login')
      }
    },
  },
}
</script>

<style scoped></style>
