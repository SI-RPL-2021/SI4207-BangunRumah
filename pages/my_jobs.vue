<template>
  <v-container>
    <v-card>
      <v-data-table :headers="headersTableMyJobs" :items="itemsTableMyJob">
        <template #[`item.approve`]="{ item }">
          <v-btn
            v-if="item.approve === 'N' && item.finished === 'N'"
            color="blue"
            icon
            @click="approveOrder(item.id)"
          >
            <v-icon> mdi-check </v-icon>
          </v-btn>
          <v-btn
            v-if="item.approve === 'N' && item.finished === 'N'"
            color="red"
            icon
            @click="deleteOrder(item.id)"
          >
            <v-icon> mdi-delete </v-icon>
          </v-btn>
          <v-tooltip v-if="item.approve === 'Y' && item.finished === 'N'" top>
            <template #activator="{ on, attrs }">
              <v-btn
                color="orange"
                icon
                v-bind="attrs"
                v-on="on"
                @click="openDialogInputProgress(item.id)"
              >
                <v-icon> mdi-progress-upload </v-icon>
              </v-btn>
            </template>
            <span>Input Progress</span>
          </v-tooltip>
          <v-btn v-if="item.finished === 'Y'" small disabled color="red">
            Project Finished
          </v-btn>
        </template>
      </v-data-table>
    </v-card>
    <v-dialog v-model="dialogInputProgress" width="500">
      <v-form>
        <v-card>
          <v-form>
            <v-card-title>
              Input Progress
              <v-spacer />
              <v-btn
                color="red"
                icon
                depressed
                @click.native="dialogInputProgress = false"
              >
                <v-icon>mdi-close</v-icon>
              </v-btn>
            </v-card-title>
            <v-card-text>
              <v-text-field v-model="keteranganProgress" label="Keterangan" />
              <v-text-field
                v-model="persentaseProgress"
                type="number"
                label="Persentase"
              />
            </v-card-text>
          </v-form>
          <v-card-actions>
            <v-spacer />
            <v-btn small dark color="orange" @click="projectFinished">
              Finish progress
            </v-btn>
            <v-btn
              type="submit"
              small
              dark
              color="blue"
              @click.prevent="saveProgress"
            >
              Save progress
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-form>
    </v-dialog>
  </v-container>
</template>

<script>
import { mapActions } from 'vuex'

export default {
  name: 'MyJobs',
  data: () => ({
    headersTableMyJobs: [
      { text: 'Project Name', value: 'projectName' },
      { text: 'Project Owner', value: 'owner' },
      { text: 'Owner Phone', value: 'ownerPhone' },
      { text: 'Project Address', value: 'projectAddress' },
      { text: 'Project Address', value: 'projectPirce' },
      { text: 'Actions', value: 'approve', sortable: false },
    ],
    itemsTableMyJob: [],
    dialogInputProgress: false,
    idJobsSelected: null,
    keteranganProgress: null,
    persentaseProgress: null,
  }),
  mounted() {
    this.getDataOrder()
  },
  methods: {
    ...mapActions({
      showHideSnackbar: 'snackbars/showHideProcess',
    }),
    async getDataOrder() {
      const userData = JSON.parse(window.localStorage.vuex)
      const { data } = await this.$axios.post('order/data', {
        email: userData.login.email,
      })
      this.itemsTableMyJob = data.dataOrder
    },
    async approveOrder(idOrder) {
      const { data } = await this.$axios.post('order/approve', {
        idOrder,
      })
      this.showHideSnackbar({
        status: true,
        msg: data.msg,
      })
      this.getDataOrder()
    },
    async deleteOrder(idOrder) {
      const { data } = await this.$axios.post('order/delete', {
        idOrder,
      })
      this.showHideSnackbar({
        status: true,
        msg: data.msg,
      })
      this.getDataOrder()
    },
    openDialogInputProgress(id) {
      this.dialogInputProgress = true
      this.idJobsSelected = id
    },
    async saveProgress() {
      const { data } = await this.$axios.post('project/data/progress', {
        idProject: this.idJobsSelected,
        keterangan: this.keteranganProgress,
        persentase: this.persentaseProgress,
      })
      this.dialogInputProgress = false
      this.keteranganProgress = null
      this.persentaseProgress = null
      this.showHideSnackbar({
        status: true,
        msg: data.msg,
      })
    },
    async projectFinished() {
      const { data } = await this.$axios.post('project/finished', {
        idProject: this.idJobsSelected,
      })
      this.showHideSnackbar({
        status: true,
        msg: data.msg,
      })
      this.dialogInputProgress = false
      this.getDataOrder()
    },
  },
}
</script>

<style scoped></style>
