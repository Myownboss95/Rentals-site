<template>
  <div class="auth-content my-auto">
    <div class="text-center">
      <h5>Forgot your password?</h5>
    </div>
    <p class="pt-2 fw-semibold text-muted text-center">
      Enter your Email and instructions will be sent to you!
    </p>
    <form class="mt-4" @submit.prevent="sendInstructions">
      <FormGroup name="email" v-model="form.email" placeholder="Enter email" />
      <FormButton
        class="btn btn-primary w-100 waves-effect waves-light"
        type="submit"
        :disabled="form.processing"
      >
        <span
          class="spinner-border spinner-border-sm"
          v-if="form.processing"
        ></span>
        <span v-else>Send instructions</span>
      </FormButton>
    </form>

    <div class="mt-5 text-center">
      <p class="text-muted mb-0">
        Remembered It ?
        <inertia-link :href="route('login')" class="text-primary fw-semibold">
          Sign In
        </inertia-link>
      </p>
    </div>
  </div>
</template>

<script setup>
  import FormButton from '@/views/components/form/FormButton.vue';
  import { useForm } from '@inertiajs/inertia-vue3';
  import { watch } from 'vue';
  import { info } from '@/js/toast';
  import FormGroup from '@/views/components/form/FormGroup.vue';

  const props = defineProps(['flash']);

  watch(
    () => props.flash,
      (newValue) => {
          info(newValue.status);
    }
  );

  const form = useForm({
    email: '',
  });

  const sendInstructions = () => {
    form.post(route('password.email'));
  };
</script>


<style>
</style>
