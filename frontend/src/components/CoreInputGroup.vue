<script setup lang="ts">
  import { useSlots } from 'vue'

  defineProps<{
    label: string
  }>()

  const slots = useSlots()
</script>

<template>
  <div>
    <div class="flex items-center justify-between">
      <label 
        for="email" 
        class="block text-sm/6 font-medium text-gray-900"
      >
        {{ label }}
      </label>

      <div v-if="slots.actions" class="text-sm">
        <slot name="actions" />
      </div>
    </div>
    <div class="mt-2">
      <slot />
    </div>
  </div>
</template>
