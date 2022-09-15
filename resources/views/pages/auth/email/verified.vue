<template>
  <div class="auth-content my-auto">
    <div class="text-center">
      <div class="avatar-lg mx-auto">
        <div class="avatar-title rounded-circle bg-light">
          <i class="bx bx-mail-send h2 mb-0 text-primary"></i>
        </div>
      </div>
      <div class="p-2 mt-4">
        <h4>Success !</h4>
        <p class="text-muted">
          Congratulations, you have successfully verified your email address, you can now provide information about you.
        </p>
        <div class="mt-4">
          <inertia-link :href="route($page.props.auth.user.is_admin ?'admin.index':'user.index')" class="btn btn-primary w-100">Take me to my account</inertia-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>

</script>
