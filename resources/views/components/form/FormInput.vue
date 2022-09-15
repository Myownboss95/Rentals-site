<template>
    <input
        :name="name"
        :type="type"
        class="form-control"
        :id="id"
        :placeholder="placeholder"
        :value="modelValue"
        :disabled="disabled"
        @input="handleInput"
        @change="handleChange"
    />
</template>

<script setup>
import { watch } from 'vue';

const props = defineProps({
    type: {
        type: String,
        default: 'text'
    },
    name: String,
    id: String,
    placeholder: String,
    disabled: {
        type: Boolean,
        default: false,
    },
    modelValue: null,
    modelModifiers: { default: () => ({}) },
})

const emit = defineEmits([ 'update:modelValue' ]);

const handleInput = (event) => {
    if(!props.modelModifiers.lazy) emit('update:modelValue', event.target.value);
}

const handleChange = event => {
    if(props.modelModifiers.lazy) emit('update:modelValue', event.target.value);
}

</script>

<style>

</style>
