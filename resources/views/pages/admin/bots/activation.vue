<template>
  <Head title="Trade Bots" />
  <breadcrumb title="Trade Bots" :crumbs="['Dashboard', 'Trading', 'Trade Bots']" />

  <div class="card radius-20 shadow-lg col-lg-6 mx-auto">
    <div class="card-body">
        <div class="text-start">
            <InertiaLink :href="route('admin.bots.index')" class="mb-3 ms-2 fw-bolder">
                <i class="fa fa-arrow-left"></i>
                 Back
            </InertiaLink>
        </div>
        <div class="table-responsive">
          <table class="table" style="vertical-align: middle">
              <thead>
                  <tr>
                      <th>User</th>
                      <th>Bot Name</th>
                      <th>Actions</th>
                  </tr>
              </thead>

              <tbody v-if="requests.length">
                  <tr v-for="(request, key) in requests" :key="key">
                      <td>
                        <img :src="profile_picture(request.image)" style="width:50px; height: 50px; border-radius: 50%; margin-right: 20px" alt="">
                         <span>{{`${request.first_name} ${request.last_name}`}}</span>
                        </td>
                      <td>{{request.bot_name}}</td>
                      <td>
                          <InertiaLink v-if="!request.token" as="button" method="post" :href="route('admin.bots.activation.token-generate',request.id)" class="btn btn-outline-primary btn-sm">
                              <i class="fa fa-key"></i>
                              Create token
                          </InertiaLink>
                          <span v-else>-- Created --</span>

                          <!-- <InertiaLink method="delete" :href="route('admin.bots.destroy',bot.id)" class="btn btn-outline-danger btn-sm" as="button">
                              <i class="fa fa-trash"></i>
                          </InertiaLink> -->
                      </td>
                  </tr>
              </tbody>
              <tbody v-else>
                <tr>
                    <td colspan="9" class="text-muted text-center">No activation request yet</td>
                </tr>
              </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center" v-if="requests.length">
            <Paginator :links="links" />
        </div>
    </div>
  </div>
</template>

<script setup>
import breadcrumb from '@/views/components/layout/breadcrumb.vue';
import { computed } from '@vue/runtime-core';
import Paginator from '@/views/components/paginator.vue';
import { profile_picture } from '@/js/functions';

const props = defineProps({
    requests: Object,
});

console.log(props);

const links = computed(() => props.requests.links);
const requests = computed(() => props.requests.data);

</script>

<style>

</style>
