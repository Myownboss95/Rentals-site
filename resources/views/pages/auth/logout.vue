<template>
  <div class="auth-content my-auto">
    <div class="text-center">
      <div class="avatar-xl mx-auto">
        <div class="avatar-title bg-soft-light text-primary h1 rounded-circle">
          <i class="bx bxs-user"></i>
        </div>
      </div>

      <div class="mt-4 pt-2">
        <h5>You are Logged Out</h5>
        <div class="mt-4">
          <inertia-link
            :href="route('login')"
            class="btn btn-primary w-100 waves-effect waves-light"
            replace
            >
                Login Again
            </inertia-link>
        </div>
      </div>
    </div>

    <div class="mt-5 text-center">
      <p class="text-muted mb-0">
        <inertia-link
          class="text-primary fw-semibold"
          :href="route('front.index')"
          replace
        >
          Or go home <i class="bx bx-home"></i>
        </inertia-link>
      </p>
    </div>
  </div>
</template>

<script setup>
  import authVue from '@/views/layouts/auth.vue';
</script>

<script>
  export default {
    layout: authVue,
  };
</script>
<style>
</style>
