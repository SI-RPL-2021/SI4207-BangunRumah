<template>
  <v-container fill-height fluid>
    <v-row align="center" justify="center">
      <v-col xl="5" lg="5" md="5" sm="12" xs="12">
        <v-card flat tile class="transparent">
          <v-card-title class="justify-center headline">
            Email Verification
          </v-card-title>
          <v-card-text class="text-center">
            Tap this button to verify your account. Once you’re verified, you
            will be redirected to login page.
          </v-card-text>
          <v-card-actions class="justify-center">
            <v-btn to="/login" rounded color="blue" dark>
              Verificate your account
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: 'EmailVerification',
}
</script>

<style scoped></style>
