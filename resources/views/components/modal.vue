<template>
<div
      class="modal fade bs-example-modal-center"
      tabindex="-1"
      aria-hidden="true"
      :id="props.id"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
    >
      <!-- style="display: none" -->
      <div class="modal-dialog modal-dialog-centered" :class="props.size != '' ? `modal-${props.size}`:''">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{props.title}}</h5>
            <button
              type="button"
              class="btn-close"
              @click="closeModal"
            ></button>
              <!-- data-bs-dismiss="modal"
              aria-label="Close" -->
          </div>
            <slot />
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
</template>

<script setup>
import { onMounted } from '@vue/runtime-core';
import { Modal } from 'bootstrap';
import { watch } from 'vue';

const props = defineProps({
    open: {
        type: Boolean,
        default: false,
    },
    title: {
        type: String,
        default: '',
    },
    id: {
        type: String,
        default: 'myModal'
    },
    size: {
        type: String,
        default: '',
    }
})

const emit = defineEmits([ 'modalClosed' ]);

let myModal = null;

onMounted(() => {
    myModal = new Modal(document.getElementById(props.id, {
        backdrop: 'static',
        keyboard: false,
    }));
});

watch(() => props.open, (open) => {
    myModal.show();
})

const closeModal = () => {
    myModal.hide();
    emit('modalClosed');
}

</script>

<style>

</style>
