<template>
  <Head title="Trades" />
  <breadcrumb title="Trades" :crumbs="['Dashboard', 'Trades']" />
  <div class="card shadow-lg col-lg-10 mx-auto radius-20">
    <div class="card-body">
        <div class="table-responsive">
          <table class="table">
              <thead>
                  <tr>
                      <th>Amount</th>
                      <th>Type</th>
                      <th>Status</th>
                      <th>Returns</th>
                      <th>Asset</th>
                      <th>Asset Type</th>
                      <th>Stop loss</th>
                      <th>Date</th>
                      <th>Actions</th>
                  </tr>
              </thead>

              <tbody v-if="trades.length">
                  <tr v-for="(trade, key) in trades" :key="key">
                      <td>{{format_money(trade.amount)}}</td>
                      <td>{{trade.type}}</td>
                      <td>{{trade.status}}</td>
                      <td>{{format_money(trade.returns)}}</td>
                      <td>{{trade.tradeable.name}}</td>
                      <td>{{trade.tradeable.type}}</td>
                      <td>{{trade.stop_loss || 'none'}}</td>
                      <td>{{new Date(trade.created_at).toDateString()}}</td>
                      <td>
                          <FormButton @button-clicked="closeTrade(trade.id)" class="btn btn-outline-danger btn-sm">
                            <ButtonLoader text="<i class='fa fa-times'></i>  Close" :loading="form.processeing" />
                          </FormButton>

                          <!-- <InertiaLink method="delete" :href="route('admin.plans.destroy',plan.id)" class="btn btn-outline-danger btn-sm" as="button">
                              <i class="fa fa-trash"></i>
                          </InertiaLink> -->
                      </td>
                  </tr>
              </tbody>
              <tbody v-else>
                <tr>
                    <td colspan="10" class="text-muted text-center">No trades found</td>
                </tr>
              </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center" v-if="trades.length">
            <Paginator :links="links" />
        </div>
    </div>
  </div>
</template>

<script setup>
import breadcrumb from '@/views/components/layout/breadcrumb.vue';
import { computed } from 'vue';
import Paginator from '@/views/components/paginator.vue';
import FormButton from '@/views/components/form/FormButton.vue';
import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    trades: Object,
})
const trades = computed(() => props.trades.data);
const links = computed(() => props.trades.links);

const form = useForm({});


const closeTrade = id => {
    form.post(route('user.trades.close', id), {
        onBefore: () => confirm('Are you sure you want to close this trade'),
    });
}



</script>

<style>

</style>
