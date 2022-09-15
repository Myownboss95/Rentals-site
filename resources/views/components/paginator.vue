<template>
  <div>
    <component
      v-for="(link, key) in links"
      :key="key"
      :is="link.url ? 'InertiaLink' : 'span'"
      :href="link.url"
      v-html="link.label"
      class="btn"
      :class="{
        'btn-primary': link.active,
        'btn-outline-primary': !link.active,
        'disabled' : !link.url
      }"
    />
  </div>
</template>

<script setup>
  const props = defineProps({
      links: Array,
      show:Boolean,
  });
</script>

<style>
.btn.disabled:hover {
    cursor:no-drop;
}
</style>
