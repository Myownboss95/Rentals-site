<template>
<span v-show="$page.props.errors[name]" class="font-size-12 text-danger d-block">{{$page.props.errors[name]}}</span>
</template>

<script setup>
defineProps(['name'])
</script>

<style>

</style>
