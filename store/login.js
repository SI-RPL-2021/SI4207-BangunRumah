export const state = () => ({
  isLogin: false,
  email: null,
  roleUser: null,
})

export const actions = {
  setLoginStatus({ commit }, { status, email, roleUser }) {
    commit('SET_LOGIN_STATUS', {
      status,
      email,
      roleUser,
    })
  },
}

export const mutations = {
  SET_LOGIN_STATUS(state, { status, email, roleUser }) {
    state.isLogin = status
    state.email = email
    state.roleUser = roleUser
  },
}

export const getters = {
  isLogin(state) {
    return state.isLogin
  },
  email(state) {
    return state.email
  },
  roleUser(state) {
    return state.roleUser
  },
}
