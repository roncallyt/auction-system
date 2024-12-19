<script setup lang="ts">
  import { ref } from 'vue'
  import { onClickOutside } from '@vueuse/core'

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
    class="relative flex-none"
  >
    <button 
      @click="toggle"
      type="button" 
      class="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900" 
      id="options-menu-0-button" 
      aria-expanded="false" 
      aria-haspopup="true"
    >
      <span class="sr-only">Open options</span>
      <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
        <path d="M10 3a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM10 8.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM11.5 15.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
      </svg>
    </button>

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
        class="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none" 
        role="menu" 
        aria-orientation="vertical" 
        aria-labelledby="user-menu-button" 
        tabindex="-1"
      >
        <slot />
      </div>
    </Transition>
  </div>
</template>
