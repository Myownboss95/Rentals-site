<template>
    <div class="alert alert-dismissible alert-outline fade show" :class="{'alert-dismissible': dismisable, 'alert-success': type == 'success', 'alert-danger' : type == 'error' }" role="alert">
        {{message}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" v-if="dismisable"></button>
    </div>
</template>

<script setup>
defineProps({
    message: String,
    type: {
        type: String,
        default: 'success'
    },
    dismisable: false,
    })
</script>

<style>

</style>
