<template>
  <div id="layout-wrapper">
    <HeaderVue />
    <SidebarVue />

    <!-- Main content -->
    <div class="main-content">
      <div class="page-content">
        <div class="container-fluid">
          <!-- Page Content -->
          <slot />
          <!-- End page content -->
        </div>
        <!-- container-fluid -->
      </div>

      <!-- End Page-content -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="text-end">{{ new Date().getFullYear() }} © Minia.</div>
        </div>
      </footer>
    </div>
  </div>
</template>

<script setup>
    import HeaderVue from '../components/layout/Header.vue';
    import SidebarVue from '../components/layout/sidebar.vue';
    import { watch } from 'vue';

  import { error, success } from '@/js/toast';

  const props = defineProps(['errors','flash']);
  watch(
    () => props.errors,
    (errors) => {
      if ('error' in errors && errors.error != null && errors.error != '') {
          error(errors.error);
      }
    }
  );

watch(
    () => props.flash,
    (flashes) => {
        if ('success' in flashes && flashes.success != null && flashes.success != '')
        {
            success(flashes.success);
        } else if ('error' in flashes && flashes.error != null && flashes.error != '') {
            error(flashes.error);
        }
    }
  )
</script>


<style>
</style>

