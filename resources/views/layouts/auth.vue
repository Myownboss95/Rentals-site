<template>
  <div class="auth-page">
    <div class="container-fluid p-0">
      <div class="row g-0 d-flex justify-content-center">
        <div class="col-xxl-6 col-lg-6 col-md-6 mx-auto ">
          <div class="auth-full-page-content d-flex p-sm-5 p-4">
            <div class="w-100">
              <div class="d-flex flex-column h-100 ">
                <div class="mb-4 mb-md-5 text-center">
                  <a href="/" class="d-block auth-logo">
                    <img src="@/assets/images/logo-sm.png" alt="" height="28" />
                    <span class="logo-txt">{{ $appName }}</span>
                  </a>
                </div>
                <div class="card p-5">
                  <div class="auth-content my-auto">
                  <!-- Auth content -->
                  <slot />

                  <div class="text-center pt-5">
                    <div @click="toggleTheme" class="cursor-pointer">
                      <i data-feather="moon" class="icon-lg dark"></i>
                      <i data-feather="sun" class="icon-lg light"></i>
                    </div>
                  </div>
                </div>
                </div>
                
                

                <div class="mt-4 mt-md-5 text-center">
                  <p class="mb-0">
                    ©
                    {{ new Date().getFullYear() }}
                    {{ $appName }}
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- end auth full page content -->
        </div>
        <!-- end col -->
        
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container fluid -->
  </div>
</template>

<script setup>
  import { onMounted, watch } from 'vue';
  import feather from 'feather-icons';
  import { useTheme } from '@/stores/theme';
  import { error, success } from '@/js/toast';

  const theme = useTheme();

  const toggleTheme = theme.toggleTheme;

  const props = defineProps(['errors']);
  watch(
    () => props.errors,
    (errors) => {
      if ('error' in errors) {
          error(errors.error);
          delete errors.error;
      }
    }
  );

  onMounted(() => {
    theme.initTheme();
    feather.replace();
  });
</script>

<style></style>
