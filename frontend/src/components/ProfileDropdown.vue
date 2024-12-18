<script setup lang="ts">
  import { ref } from 'vue'
  import { storeToRefs } from 'pinia'
  import { onClickOutside } from '@vueuse/core'
  import { useAuthStore } from '../stores/AuthStore'

  const authStore = useAuthStore()

  const { user } = storeToRefs(authStore)

  const opened = ref(false)

  function toggle() {
    opened.value = ! opened.value
  }

  const target = ref(null)

  onClickOutside(target, () => {
    opened.value = false
  })
</script>

<template>
  <div 
    ref="target"
    class="relative ml-3 shrink-0"
  >
    <div>
      <button 
        @click="toggle" 
        type="button" 
        class="relative flex rounded-full bg-indigo-600 text-sm text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600" 
        id="user-menu-button" 
        aria-expanded="false" 
        aria-haspopup="true"
      >
        <span class="absolute -inset-1.5"></span>
        <span class="sr-only">Open user menu</span>
        <img class="size-8 rounded-full" :src="user.avatar" alt="">
      </button>
    </div>

    <Transition
      enter-active-class="transition ease-out duration-100"
      enter-from-class="transform opacity-0 scale-95"
      enter-to-class="transform opacity-100 scale-100"
      leave-active-class="transition ease-in duration-75"
      leave-from-class="transform opacity-100 scale-100"
      leave-to-class="transform opacity-0 scale-95"
    >
      <div 
        v-show="opened" 
        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none" 
        role="menu" 
        aria-orientation="vertical" 
        aria-labelledby="user-menu-button" 
        tabindex="-1"
      >
        <!-- Active: "bg-gray-100 outline-none", Not Active: "" -->
        <a 
          href="#" 
          class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 outline-none" 
          role="menuitem" 
          tabindex="-1" 
          id="user-menu-item-0"
        >
          Your Profile
        </a>
        <a 
          href="#" 
          class="block px-4 py-2 text-sm text-gray-700" 
          role="menuitem" 
          tabindex="-1" 
          id="user-menu-item-2"
        >
          Sign Out
        </a>
      </div>
    </Transition>
  </div>
</template>
