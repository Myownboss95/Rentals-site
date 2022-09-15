<template>
  <div class="mb-3">
    <LabelVue :for="id" :label="label" v-if="label" />
    <InputVue :name="name" :type="type" :placeholder="placeholder" :value="modelValue" @update:model-value="handleInput" :disabled="disabled"  />
    <ErrorVue :name="name" />
    </div>
</template>

<script setup>
import LabelVue from './FormLabel.vue';
import InputVue from './FormInput.vue';
import ErrorVue from '@/views/components/alerts/error.vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { computed } from 'vue';

const props = computed(() => usePage().props.value)

defineProps({
    type: {
        type: String,
        default: 'text'
    },
    label: String,
    name: String,
    id: String,
    placeholder: String,
    disabled: {
        type: Boolean,
        default: false,
    },
    modelValue: null,
})

const emit = defineEmits([ 'update:modelValue' ])

const handleInput = (payload) => {
    emit('update:modelValue',payload)
}
</script>

<style>

</style>
