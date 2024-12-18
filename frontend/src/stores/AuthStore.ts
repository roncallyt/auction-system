import { ref } from 'vue'
import { defineStore } from 'pinia'
import axios from '../helpers/axios'
import { LoginAttributesInterface } from '../types'

export const useAuthStore = defineStore('AuthStore', () => {
  const user = ref(null)

  const getUser = async () => {
    await axios.get('/sanctum/csrf-cookie')

    const { data: { data } } = await axios.get('/api/user')

    user.value = data
  }

  async function login(attributes: LoginAttributesInterface) {
    axios
      .get('/sanctum/csrf-cookie')
      .then(() => {
        axios
          .post('/login', attributes)
          .then(({ data }) => {
            console.log(data)
          })
      })
  }

  async function logout() {
    await axios.post('/logout')

    user.value = null
  }

  return {
    // Properties
    user,

    // Methods
    getUser,
    login,
    logout
  }
})