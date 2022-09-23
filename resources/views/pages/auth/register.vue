<template>
<Head title="Register" />
  <div class="auth-content my-auto">
    <div class="text-center">
      <h5 class="mb-0">Register Account</h5>
      <p class="text-muted mt-2">Get a trading account with us.</p>
    </div>
    <form
      class="mt-4 pt-2"
      @submit.prevent="submit"
    >

    <FormGroup label="Email" placeholder="you@example.com" v-model="form.email" name="email" />

    <InputGroup :type="type" class="mb-3" label="Password" placeholder="Enter password" v-model="form.password" :icon="icon" @button-clicked="handleButtonClicked" name="password" />

    <InputGroup :type="type" class="mb-3" label="Confirm password" placeholder="Confirm password" v-model="form.password_confirmation" :icon="icon" @button-clicked="handleButtonClicked" name="password_confirmation" />


      <div class="mb-4">
        <p class="text-muted">
          By registering you agree to our
          <a href="#" class="text-primary">Terms of Use</a>
        </p>
      </div>

        <FormButton type="submit" class="btn btn-primary w-100 waves-effect waves-light" >
            <span class="spinner-border spinner-border-sm" v-if="form.processing"></span>
            <span v-else>Register</span>
        </FormButton>

    </form>



    <div class="mt-5 text-center">
      <p class="text-muted mb-0">
        Already have an account ?
        <inertia-link :href="route('login')" class="text-primary fw-semibold"> Login </inertia-link>
      </p>
    </div>
  </div>
</template>

<script setup>
import FormGroup from '@/views/components/form/FormGroup.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import InputGroup from '@/views/components/form/InputGroup.vue';
import FormButton from '@/views/components/form/FormButton.vue';
import { ref } from '@vue/reactivity';

const type = ref('password');
const icon = ref('mdi mdi-eye-outline');

const handleButtonClicked = () => {
    console.log('here')
    type.value = type.value == 'password' ? 'text' : 'password';
    icon.value = icon.value == 'mdi mdi-eye-outline'? 'mdi mdi-mdi-eye-off-outline':'mdi mdi-mdi-eye-outline';
}

const props = defineProps([ 'flash','data' ]);

const form = useForm({
    email: props.flash?.email || '',
    referral_code: props.data?.regToken || '',
    password: '',
    password_confirmation:''
})

const submit = () => {
  // console.log(form.data())
    form.post((route('register')));
}

</script>

<style>
</style>
