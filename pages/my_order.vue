<template>
  <v-container>
    <v-card>
      <v-data-table :headers="headersTableMyOrder" :items="itemsTableMyOrder">
        <template #[`item.approve`]="{ item }">
          <v-tooltip top>
            <template #activator="{ on, attrs }">
              <v-btn
                color="orange"
                icon
                v-bind="attrs"
                v-on="on"
                @click="openDialogInputListProgress(item)"
              >
                <v-icon> mdi-eye </v-icon>
              </v-btn>
            </template>
            <span>Lihat Progress</span>
          </v-tooltip>
        </template>
      </v-data-table>
    </v-card>
    <v-dialog v-model="dialogListProgress" width="700" scrollable>
      <v-card>
        <v-card-title class="headline">
          <span style="font-size: 18px !important">
            List Progress Project {{ projectName }}
          </span>
          <v-spacer />
          <v-btn icon color="red" @click.native="dialogListProgress = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-divider />
        <v-card-text>
          <v-timeline :reverse="true" :dense="$vuetify.breakpoint.smAndDown">
            <v-timeline-item
              v-for="progress in listProgress"
              :key="progress.id"
            >
              <span slot="opposite">{{ new Date(progress.created_at) }}</span>
              <v-card class="elevation-2">
                <v-card-title class="headline">
                  {{ progress.keterangan }}
                </v-card-title>
                <v-card-text>
                  Persentase Pengerjaan {{ progress.persentase }} %
                </v-card-text>
              </v-card>
            </v-timeline-item>
          </v-timeline>
        </v-card-text>
      </v-card>
    </v-dialog>
  </v-container>
</template>

<script>
export default {
  name: 'MyOrder',
  data: () => ({
    headersTableMyOrder: [
      { text: 'Project Name', value: 'projectName' },
      { text: 'Project Address', value: 'projectAddress' },
      { text: 'Project Address', value: 'projectPirce' },
      { text: 'Actions', value: 'approve', sortable: false },
    ],
    itemsTableMyOrder: [],
    dialogListProgress: false,
    projectName: null,
    listProgress: [],
  }),
  mounted() {
    this.getOrder()
  },
  methods: {
    async getOrder() {
      const userData = JSON.parse(window.localStorage.vuex)
      const { data } = await this.$axios.post('order/data/user', {
        email: userData.login.email,
      })
      this.itemsTableMyOrder = data.dataOrder
    },
    async openDialogInputListProgress(dataOrder) {
      const { data } = await this.$axios.post('progress/data', {
        idProject: dataOrder.id,
      })
      this.listProgress = data.dataProgress
      console.log(this.listProgress)
      this.dialogListProgress = true
      this.projectName = dataOrder.projectName
    },
  },
}
</script>

<style scoped></style>
