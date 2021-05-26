export default function ({ redirect }) {
  const roleUser = JSON.parse(window.localStorage.vuex)
  if (roleUser.login.roleUser !== 'Admin') {
    return redirect('/admin')
  }
}
