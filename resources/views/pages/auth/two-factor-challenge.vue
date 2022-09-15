<template>
  <Head title="Two Factor Athentication Challenge" />

  <div class="text-center">
    <div class="avatar-lg mx-auto">
      <div class="avatar-title rounded-circle bg-light">
        <i class="bx bxs-user h2 mb-0 text-primary"></i>
      </div>
    </div>
    <div class="p-2 mt-4">
      <h4>Verify it's you</h4>
      <p class="mb-5">
        Please enter the 6 digit token from the google authenticator app.
      </p>

      <form @submit.prevent="twoFactorLogin">
        <FormGroup name="code" placeholder="TOTP token" v-model="form.code" />
        <FormButton class="btn btn-primary w-100" type="submit" :disabled="form.processing">
            <ButtonLoader text="Authenticate" :loading="form.processing" />
        </FormButton>
      </form>
    </div>
  </div>

  <div class="mt-5 text-center">
    <p class="text-muted mb-0">
      Don't have a two factor auth device? <br/>
      <a href="#" class="text-primary fw-semibold"> Enter recovery code </a>
    </p>
  </div>
</template>

<script setup>
  import { ref } from 'vue';
  import FormButton from '@/views/components/form/FormButton.vue';
  import FormGroup from '@/views/components/form/FormGroup.vue';
  import FormLabel from '@/views/components/form/FormLabel.vue';
  import { useForm } from '@inertiajs/inertia-vue3';
  import InputGroup from '@/views/components/form/InputGroup.vue';
  import ButtonLoader from '@/views/components/form/ButtonLoader.vue';

  const form = useForm({
    code:''
  });

  const twoFactorLogin = () => {
    form.post(route('two-factor.login'), {
      replace: true,
    });
  };
</script>

<style>
</style>
