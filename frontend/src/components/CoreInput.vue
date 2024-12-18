<script setup lang="ts">
  const { 
    field = 'text',
    required = false
  } = defineProps<{
    field?: string,
    required?: boolean
  }>()

  const model = defineModel()
</script>

<template>
  <input 
    v-model="model"
    :type="field" 
    :required="required"
    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
  >
</template>
