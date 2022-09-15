<template>
<span>
    <span class="spinner-border spinner-border-sm" v-if="props.loading"></span>
    <span v-else v-html="props.text"></span>
</span>
</template>

<script setup>
const props = defineProps({
    loading: false,
    text: null,
})
</script>

<style>

</style>
