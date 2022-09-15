<template>
  <button :class="class" :type="type" @click="$emit('buttonClicked')" :disabled="disabled">
    <slot />
</button>
</template>

<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
    disabled: false,
    class: String,

})
defineEmits(['buttonClicked'])
</script>

<style>

</style>
