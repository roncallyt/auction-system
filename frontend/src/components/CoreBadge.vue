<script setup lang="ts">
  const { color = 'green' } = defineProps<{
    color: string
  }>()
</script>

<template>
  <p :class="`mt-0.5 rounded-md bg-${color}-50 px-1.5 py-0.5 text-xs font-medium text-${color}-700 ring-1 ring-inset ring-${color}-600/20`">
    <slot />
  </p>
</template>
