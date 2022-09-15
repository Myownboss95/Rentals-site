<template>
  <Head title="Withdrawals" />
  <breadcrumb title="Withdrawals" :crumbs="['Dashboard', 'Withdrawals']" />
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

              <tbody v-if="withdrawals.length">
                  <tr v-for="(withdrawal, key) in withdrawals" :key="key">
                      <td>{{withdrawal?.user?.first_name}}</td>
                      <td>{{withdrawal.reference}}</td>
                      <td>{{withdrawal.amount}} {{withdrawal.symbol}}</td>
                      <td>{{withdrawal.status}}</td>
                      <td>{{new Date(withdrawal.created_at).toDateString()}}</td>
                      <td>
                        <div v-if="withdrawal.status == 'pending'">
                            <span @click="approve(withdrawal.id)" class="btn btn-outline-success btn-sm cursor-pointer me-2">
                              <i class="fa fa-check"></i>
                              Approve
                          </span>

                          <span @click="decline(withdrawal.id)" class="btn btn-outline-danger btn-sm cursor-pointer">
                              <i class="fa fa-times"></i>
                              Decline
                          </span>
                        </div>
                        <div v-else>
                                <p>-- --</p>
                        </div>
                          
                      </td>
                  </tr>
              </tbody>
              <tbody v-else>
                <tr>
                    <td colspan="10" class="text-muted text-center">No withdrawals found</td>
                </tr>
              </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center" v-if="withdrawals.length">
            <Paginator :links="links" />
        </div>
    </div>
  </div>
</template>

<script setup>
import breadcrumb from '@/views/components/layout/breadcrumb.vue';
import { computed } from 'vue';
import Paginator from '@/views/components/paginator.vue';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    withdrawals: Object,
})
const withdrawals = computed(() => props.withdrawals.data);
const links = computed(() => props.withdrawals.links);

const form = useForm({});

const approve = id => {
    form.post(route('admin.withdrawals.approve', id), {
        onBefore: () => confirm('Are you sure you want approve this withdrawal?'),
    })
}

const decline = id => {
    form.post(route('admin.withdrawals.decline', id), {
        onBefore: () => confirm('Are you sure you want decline this withdrawal?'),
    })
}


</script>

<style>

</style>
