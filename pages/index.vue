<template>
  <div>
    <v-img
      v-if="getIsLogin == false"
      :src="require(`~/assets/img/bghomepage.png`)"
    >
      <v-container>
        <v-row no-gutters justify="end">
          <v-col></v-col>
          <v-col align-self="end">
            <v-card class="pa-2 transparent mt-6" flat tile>
              <v-card-title
                class="blue--text headline"
                style="font-size: 40px !important"
              >
                One Stop Building Solution
              </v-card-title>
              <v-card-text style="font-size: 20px">
                This app help you to findout the best design, the best architect
                and the best artisan for your own home.
              </v-card-text>
              <v-card-actions>
                <v-spacer />
                <v-btn
                  color="blue text-right"
                  style="margin-right: 60px !important"
                  rounded
                  class="mr-6"
                  dark
                >
                  Consult
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-img>
    <v-img
      v-if="getIsLogin == false"
      :src="require(`~/assets/img/imghomepagealur.jpeg`)"
    />
    <v-img
      v-if="getIsLogin == true"
      :src="require(`~/assets/img/bghomefindworker.png`)"
    >
      <v-container>
        <v-row no-gutters justify="center">
          <v-col></v-col>
          <v-col align-self="center">
            <v-card
              class="pa-2 transparent mt-6"
              flat
              tile
              style="margin-top: 50% !important"
            >
              <v-card-title
                class="blue--text headline justify-center"
                style="font-size: 25px !important"
              >
                Hire Worker
              </v-card-title>
              <v-card-text style="font-size: 17px" class="text-center">
                Check and hire our professional worker to build your buildings.
              </v-card-text>
              <v-card-actions class="justify-center">
                <v-btn to="worker_list" color="blue" rounded dark>
                  Start Hiring
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
          <v-col></v-col>
        </v-row>
      </v-container>
    </v-img>
    <v-img
      v-if="getIsLogin == true"
      :src="require(`~/assets/img/bghomefindarchitect.png`)"
    >
      <v-container>
        <v-row no-gutters justify="center">
          <v-col></v-col>
          <v-col align-self="center">
            <v-card
              class="pa-2 transparent mt-6"
              flat
              tile
              style="margin-top: 50% !important"
            >
              <v-card-title
                class="blue--text headline justify-center"
                style="font-size: 25px !important"
              >
                Find a Furniture
              </v-card-title>
              <v-card-text style="font-size: 17px" class="text-center">
                Find the perfect furniture that suited with your buildings’
                style.
              </v-card-text>
              <v-card-actions class="justify-center">
                <v-btn to="/designer_list" color="blue" rounded dark>
                  Start Finding
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
          <v-col></v-col>
        </v-row>
      </v-container>
    </v-img>
    <v-img
      v-if="getIsLogin == true"
      :src="require(`~/assets/img/bghomefinddesigner.png`)"
    >
      <v-container>
        <v-row no-gutters justify="center">
          <v-col></v-col>
          <v-col align-self="center">
            <v-card
              class="pa-2 transparent mt-6"
              flat
              tile
              style="margin-top: 50% !important"
            >
              <v-card-title
                class="blue--text headline justify-center"
                style="font-size: 25px !important"
              >
                Design Your Own Buildings
              </v-card-title>
              <v-card-text style="font-size: 17px" class="text-center">
                Create your own unique buildings with help from our professional
                teams.
              </v-card-text>
              <v-card-actions class="justify-center">
                <v-btn to="/architect_list" color="blue" rounded dark>
                  Start Building
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
          <v-col></v-col>
        </v-row>
      </v-container>
    </v-img>
  </div>
</template>

<script>
export default {
  name: 'Index',
  computed: {
    getIsLogin() {
      return this.$store.getters['login/isLogin']
    },
  },
}
</script>
