<template>
  <div class="auth-content my-auto">
    <div class="text-center">
      <h5 class="mb-0">Reset Password</h5>
    </div>
    <p class="text-center">
      Now you can reset your password by filling the form below.
    </p>
    <form class="mt-4" @submit.prevent="resetPassword">
      <FormGroup
        label="New password"
        placeholder="Enter new password"
        name="password"
        type="password"
        v-model="form.password"
      />
      <FormGroup
        label="Confirm new password"
        placeholder="Confirm new password"
        name="password"
        type="password"
        v-model="form.password_confirmation"
      />
      <ButtonVue
        class="btn btn-primary w-100 waves-effect waves-light"
        type="submit"
        :disabled="form.processing"
      >
        <span
          class="spinner-border spinner-border-sm"
          v-if="form.processing"
        ></span>
        <span v-else>Reset</span>
      </ButtonVue>
    </form>

    <div class="mt-5 text-center">
      <p class="text-muted mb-0">
        Remembered It ?
        <inertia-link :href="route('login')" class="text-primary fw-semibold">
          Log In
        </inertia-link>
      </p>
    </div>
  </div>
</template>

<script setup>
  import authVue from '@/views/layouts/auth.vue';
  import FormGroup from '@/views/components/form/FormGroup.vue';
    import ButtonVue from '@/views/components/form/FormButton.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import route from 'ziggy-js';
import { watch } from 'vue';
import { error } from '@/js/toast';

const props = defineProps([ 'errors' ])

watch(
    () => props.errors,
    (errors) => {
        console.log(errors);
        if ('email' in errors) {
            error(errors.email);
        }
    }
)

const resetPassword = () => {
    const routeParams = route().params;

    form.transform(data => ({
        ...data,
        email: routeParams.email,
        token: routeParams.token
    })).post(route('password.update'))
}

const form = useForm({
    password: '',
    password_confirmation: '',
  })
</script>

<style>
</style>
