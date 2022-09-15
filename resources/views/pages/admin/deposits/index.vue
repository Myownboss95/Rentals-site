<template>
  <Head title="Deposits" />
  <breadcrumb title="Deposits" :crumbs="['Dashboard', 'Deposits']" />
  <div class="card shadow col-lg-10 mx-auto">
    <div class="card-body">
        <div class="table-responsive">
          <table class="table">
              <thead>
                  <tr>
                      <th>User</th>
                      <th>Reference</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Actions</th>
                  </tr>
              </thead>

                <tbody v-if="deposits.length">
                  <tr v-for="(deposit, key) in deposits" :key="key">
                      <td>{{deposit?.user?.first_name}}</td>
                      <td>{{deposit?.reference}}</td>
                      <td>{{deposit?.amount}} {{deposit?.symbol}} </td>
                      <td>{{deposit?.status}}</td>
                      <td>{{new Date(deposit?.created_at).toDateString()}}</td>
                      <td>
                        <div v-if="deposit.status == 'pending'">
                            <InertiaLink :href="route('admin.deposits.approve',deposit?.id)" class="btn btn-outline-success btn-sm me-2">
                                <i class="fa fa-check"></i>
                                Approve
                            </InertiaLink>

                            <InertiaLink :href="route('admin.deposits.decline',deposit?.id)" class="btn btn-outline-danger btn-sm">
                                <i class="fa fa-times"></i>
                                Decline
                            </InertiaLink>
                        </div>
                        <div v-else>
                            --
                        </div>

                          <!-- <InertiaLink method="delete" :href="route('admin.plans.destroy',plan.id)" class="btn btn-outline-danger btn-sm" as="button">
                              <i class="fa fa-trash"></i>
                          </InertiaLink> -->
                      </td>
                  </tr>
              </tbody>
              <tbody v-else>
                <tr>
                    <td colspan="10" class="text-muted text-center">No deposits found</td>
                </tr>
              </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center" v-if="deposits.length">
            <Paginator :links="links" />
        </div>
    </div>
  </div>
</template>

<script setup>
import breadcrumb from '@/views/components/layout/breadcrumb.vue';
import { computed } from 'vue';
import Paginator from '@/views/components/paginator.vue';

const props = defineProps({
    deposits: Object,
})
const deposits = computed(() => props.deposits.data);
const links = computed(() => props.deposits.links);


</script>

<style>

</style>
