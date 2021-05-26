export const state = () => ({
  show: false,
  message: null,
})

export const actions = {
  showHideProcess({ commit }, { status, msg }) {
    commit('SET_SNACKBAR', {
      status,
      msg,
    })
  },
}

export const mutations = {
  SET_SNACKBAR(state, { status, msg }) {
    state.show = status
    state.message = msg
  },
}

export const getters = {
  statusShow(state) {
    return state.show
  },
  msgSnackbar(state) {
    return state.message
  },
}
