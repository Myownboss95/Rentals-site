<template>
  <div class="auth-content my-auto">
    <div class="text-center">
      <div class="avatar-lg mx-auto">
        <div class="avatar-title rounded-circle bg-light">
          <i class="bx bx-lock h2 mb-0 text-primary"></i>
        </div>
      </div>
      <div class="p-2 mt-4">
        <h4>Success !</h4>
        <p class="text-muted">
          Your password has been reset successfully, you can now login with your new password.
        </p>
        <div class="mt-4">
          <inertia-link :href="route('login')" class="btn btn-primary w-100">Log In</inertia-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>

</script>
