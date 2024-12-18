<script setup lang="ts">
  import { ref } from 'vue'
  import { useRouter } from 'vue-router'
  import { useAuthStore } from '../stores/AuthStore'

  const router = useRouter()
  const authStore = useAuthStore()

  const email = ref('')
  const password = ref('')

  async function login() {
    await authStore.login({
      email: email.value,
      password: password.value
    })

    router.push({
      name: 'Home'
    })
  }
</script>

<template>
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <Icon icon="hugeicons:auction" class="w-auto h-16 mx-auto text-indigo-600" />
      <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">
        Sign in to your account
      </h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form 
        @submit.prevent="login" 
        class="space-y-6" 
        action="#" 
        method="POST"
      >
        <CoreInputGroup label="Email">
          <CoreInput 
            v-model="email"
            field="email" 
            required
          />
        </CoreInputGroup>

        <CoreInputGroup label="Password">
          <template #actions>
            <a tabindex="-1" href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">
              Forgot password?
            </a>
          </template>

          <CoreInput 
            v-model="password"
            field="password" 
            required
          />
        </CoreInputGroup>

        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Sign in
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
