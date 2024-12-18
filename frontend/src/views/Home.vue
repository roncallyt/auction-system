<script setup lang="ts">
  import { useRouter } from 'vue-router'
  import { useAuthStore } from '../stores/AuthStore'

  const router = useRouter()
  const authStore = useAuthStore()

  async function logout() {
    await authStore.logout()

    router.push({
      name: 'Login'
    })
  }
</script>

<template>
  Home

  <div>
    <button @click="logout">
      Sair
    </button>
  </div>
</template>
