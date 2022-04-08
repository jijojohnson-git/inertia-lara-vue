<template>
  <div>
    <Component
      v-for="link in links"
      :key="link.label"
      :is="link.url ? 'Link' : 'span'"
      v-html="link.label"
      :href="link.url"
      class="px-3 py-2"
      :class="{ 'font-bold': link.active, 'text-gray-400': !link.url }"
    >
    </Component>
  </div>
</template>

<script setup>
defineProps({ links: Array });
</script>

<style>
</style>
