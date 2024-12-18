<script setup lang="ts">
</script>

<template>
  <Suspense>
    <component :is="$route.meta.layout">
      <RouterView />
    </component>
  </Suspense>
</template>
