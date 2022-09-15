<template>
  <Head title="Payment Methods" />
  <breadcrumb title="Add Coins" :crumbs="['Dashboard', 'Settings', 'Add Coins']" />
  <div class="card shadow col-lg-8 mx-auto">
    <div class="card-body">
        <div class="text-end">
            <InertiaLink :href="route('admin.payment-method.create')" class="btn btn-outline-primary">
                <i class="fa fa-plus"></i>
                Add Coin 
            </InertiaLink>
        </div>
        <div class="table-responsive">
          <table class="table">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Symbol</th>
                      <th>ROI</th>
                      <th>Enabled</th>
                      <th>Date</th>

                      <th>Actions</th>
                  </tr>
              </thead>

              <tbody v-if="payment.length">
                  <tr v-for="(payments, key) in payment" :key="key">
                      <td>{{payments.name}}</td>
                      
                      <td>{{payments.symbol}}</td>
                      <td>{{payments.roi}}%</td>
                      <td>{{(payments.status == 1)? 'Yes': 'No'}}</td>
                      <td>{{new Date(payments.created_at).toDateString()}}</td>
                      <td>
                          <InertiaLink :href="route('admin.payment-method.edit',payments.id)" class="btn btn-outline-primary btn-sm">
                              <i class="fa fa-edit"></i>
                          </InertiaLink>

                          <InertiaLink method="delete" :href="route('admin.payment-method.destroy',payments.id)" class="btn btn-outline-danger btn-sm" as="button">
                              <i class="fa fa-trash"></i>
                          </InertiaLink>
                      </td>
                  </tr>
              </tbody>
              <tbody v-else>
                <tr>
                    <td colspan="9" class="text-muted text-center">No assets found</td>
                </tr>
              </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center" v-if="payment.length">
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
    payment: Object,
})
// console.log(payment)
const payment = computed(() => props.payment.data);
const links = computed(() => props.payment.links);


</script>

<style>

</style>
