<template>
    <Head title="Login" />

    <div class="text-center">
      <h5 class="mb-0">Welcome Back !</h5>
      <p class="text-muted mt-2">Sign in to continue to {{ $appName }}.</p>
    </div>
    <form
      class="mt-4 pt-2"
      @submit.prevent="login"
    >
        <form-group id="email" name="email" placeholder="Email address" label="Email Address" v-model="form.email"  />

      <div class="mb-3">
        <div class="d-flex align-items-start">
          <div class="flex-grow-1">
            <FormLabel label="Password" />
          </div>
          <div class="flex-shrink-0">
            <div class="">
              <inertia-link :href="route('password.request')" class="text-muted">Forgot password?</inertia-link>
            </div>
          </div>
        </div>

        <InputGroup v-model="form.password" :type="type" name="password" :icon="icon" @button-clicked="toggleType" />

      </div>
      <div class="row mb-4">
        <div class="col">
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="remember-check"
            />
            <label class="form-check-label" for="remember-check">
              Remember me
            </label>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <ButtonVue class="btn btn-primary w-100 waves-effect waves-light" type="submit" :disabled="form.processing">
        <span class="spinner-border spinner-border-sm" v-if="form.processing"></span>
        <span v-else>Log In</span>
        </ButtonVue>
      </div>
    </form>

    <div class="mt-5 text-center">
      <p class="text-muted mb-0">
        Don't have an account ?
        <inertia-link :href="route('register')" class="text-primary fw-semibold">
          Signup now
        </inertia-link>
      </p>
    </div>
</template>

<script setup>
import {ref } from 'vue';
import ButtonVue from '@/views/components/form/FormButton.vue'
import FormGroup from '@/views/components/form/FormGroup.vue'
import FormLabel from '@/views/components/form/FormLabel.vue';
import {useForm} from '@inertiajs/inertia-vue3'
import InputGroup from '@/views/components/form/InputGroup.vue';


let type = ref('password');
let icon = ref('mdi mdi-eye-outline')

const toggleType = _ => {
    type.value = type.value == 'password' ? 'text': 'password'
    icon.value = icon.value == 'mdi mdi-eye-outline' ? 'mdi mdi-eye-off-outline': 'mdi mdi-eye-outline'
}

const form = useForm({
    email: '',
    password: '',
    remember: false,
});


const login = () => {
    form
        .transform(data => ({
            ...data,
        remember: data.remember?'on':''
        }))
        .post(route('login'), {
            replace:true,
        })
}

</script>

<style>
</style>
