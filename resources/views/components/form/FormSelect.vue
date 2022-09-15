<template>
<div>
    <FormLabel :for="id" :label="label" v-if="label" />
    <select :name="name" :id="id" class="form-select" @change="handleChange" :disabled="disabled">
        <option :value="key" v-for="(option, key) in options" :key="key" :selected="key == modelValue" > {{option}} </option>
    </select>
    <Error :name="name" v-if="name" />

</div>
</template>

<script setup>
import FormLabel from './FormLabel.vue';
import Error from '../alerts/error.vue';
const props = defineProps({
    name: {
        type: String,
        default: 'select',
    },
    id: {
        type: String,
        default: 'selectId',
    },
    options: {
        type: Object,
        default: {},
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    label: String,
    modelValue: null,

})
const emit = defineEmits(['update:modelValue']);

const handleChange = event => {
    emit('update:modelValue', event.target.value);
}

</script>

<style>

</style>
