<template>
  <Head title="Email verification" />

  <div class="auth-content my-auto">
    <div class="text-center">
      <div class="avatar-lg mx-auto">
        <div class="avatar-title rounded-circle bg-light">
          <i class="bx bxs-envelope h2 mb-0 text-primary"></i>
        </div>
      </div>
      <div class="p-2 mt-4">
        <h4>Verify your email</h4>
        <p>
          We have sent you verification email
          <span class="fw-bold">{{ $page.props.auth.user.email || '' }}</span
          >, Please check it
        </p>
        <div class="mt-4">
          <inertia-link :href="route('user.index')" class="btn btn-primary w-10"
            >Verify email</inertia-link
          >
        </div>
      </div>
    </div>
    <div class="mt-5 text-center">
      <p class="text-muted mb-0">
        Didn't receive an email ?<br/>
        <inertia-link
          as="button"
          method="post"
          :href="route('verification.send')"
          class="text-primary fw-semibold a-button"
        >
          Resend
        </inertia-link>
        or
        <span class="text-primary fw-bold cursor-pointer" @click="goBack">Go back</span>
      </p>
    </div>
  </div>
</template>

<script setup>
  import { info } from '@/js/toast';
import { Inertia } from '@inertiajs/inertia';
  import { usePage } from '@inertiajs/inertia-vue3';
  import { computed, watch } from 'vue';
import route from 'ziggy-js';

  const props = defineProps(['flash']);

  watch(
    () => props.flash,
    (value) => {
      if ('status' in value) {
        if (value.status === 'verification-link-sent') {
          info('We have sent you a new verification email');
        } else {
          info('We were unable to resend the verification email. Try again.');
        }
      }
    }
  );

const goBack = () => {
    Inertia.post(route('email.correct'), {
        replace: true,
    })
  }
</script>

<style>
</style>
