<template>
  <div class="auth-content my-auto">
    <div class="text-center">
      <div class="avatar-xl mx-auto">
        <div class="avatar-title bg-soft-light text-primary h1 rounded-circle">
          <i class="bx bxs-user"></i>
        </div>
      </div>

      <div class="mt-4 pt-2">
        <h5>Confirm you are you!</h5>
        <p class="text-center">
            You need to enter your password as the action you about to perform requires security clearance.
        </p>
        <div class="mt-4">
            <form @submit.prevent="confirmPassword">
                <FormGroup placeholder="Enter your password" name="password" v-model="form.password" type="password"  />
                <FormButton class="btn btn-primary w-100 waves-effect waves-light" type="submit">
                    <ButtonLoader :loading="form.processing" text="Confirm Password" />
                </FormButton>
            </form>
        </div>
      </div>
    </div>

    <div class="mt-5 text-center">
      <p class="text-muted mb-0">
        <FormButton
          class="btn btn-outline-warning"
          @button-clicked="goBack"
        >
           Or cancel and go back
        </FormButton>
      </p>
    </div>
  </div>
</template>

<script setup>
import FormGroup from '@/views/components/form/FormGroup.vue';
import FormButton from '@/views/components/form/FormButton.vue';
import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';

const form = useForm({
    password: '',
});

const confirmPassword = () => {
    form.post(route('password.confirm'), {
        replace:true,
    });
}

const goBack = () => {
    let previousUrl = usePage().props.value.url.previous;
    if (previousUrl != null && previousUrl != '') {
        Inertia.visit(previousUrl, {
            replace: true,
        })
    } else {
        window.history.back();
    }
}

</script>
<style>
</style>
