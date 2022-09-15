<template>
  <label class="form-label" :for="props.for">{{label}}</label>
</template>

<script setup>
const props = defineProps({
    for: String,
    label: String,
})
</script>

<style>

</style>
