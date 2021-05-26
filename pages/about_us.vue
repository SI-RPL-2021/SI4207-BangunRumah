<template>
  <v-img :src="require(`~/assets/img/bgaboutus.png`)">
    <v-container>
      <v-row no-gutters justify="end" style="margin-top: 100px">
        <v-col>
          <v-img
            max-height="300"
            :src="require(`~/assets/img/logo_bangunrumahaboutus.png`)"
            contain
          ></v-img>
        </v-col>
        <v-col>
          <v-card class="pa-2 transparent mt-6 red text-center">
            <v-card-text
              style="
                font-size: 20px;
                padding-top: 80px;
                padding-bottom: 80px;
                color: white;
              "
            >
              Bangunrumah.id was created by six college students who attend
              Telkom University. The idea itself came when they undergo the
              software engineering sprint projects.
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-img>
</template>

<script>
export default {
  name: 'AboutUs',
}
</script>

<style scoped></style>
