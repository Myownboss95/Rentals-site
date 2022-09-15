<template>
  <Head title="Trades" />
  <breadcrumb title="Trades" :crumbs="['Dashboard', 'Trades']" />
  <div class="card shadow col-lg-10 mx-auto">
    <div class="card-body">
        <div class="table-responsive">
          <table class="table">
              <thead>
                  <tr>
                      <th>User</th>
                      <th>Stop loss</th>
                      <th>Amount</th>
                      <th>Returns (Profit/Loss)</th>
                      <th>Type</th>
                      <th>Status</th>
                      <th>Asset</th>
                      <th>Asset Type</th>
                      <th>Date</th>
                      <th>Actions</th>
                  </tr>
              </thead>

              <tbody v-if="trades.length">
                  <tr v-for="(trade, key) in trades" :key="key">
                      <td>{{trade?.user?.first_name}}</td>
                      <td>{{trade.stop_loss}}</td>
                      <td>{{format_money(trade.amount)}}</td>
                      <td :class="{'text-danger':trade.returns < 0, 'text-success':trade.returns > 0 }">
                            {{format_money(trade.returns)}}
                    </td>
                      <td>{{trade.type}}</td>
                      <td>{{trade.status}}</td>
                      <td>{{trade.tradeable.name}}</td>
                      <td>{{trade.tradeable.type}}</td>
                      <td>{{new Date(trade.created_at).toDateString()}}</td>
                      <td>
                        <div v-if="trade.status == 'active'">
                            <FormButton class="btn btn-outline-primary btn-sm" @button-clicked="view(trade.id)">
                                <ButtonLoader text="<i class='fa fa-edit'></i>" />
                            </FormButton>

                            <FormButton @button-clicked="closeTrade(trade.id)" class="btn btn-outline-danger btn-sm ms-2">
                                <ButtonLoader text="<i class='fa fa-times'></i>  Close" :loading="form.processeing" />
                            </FormButton>
                        </div>
                        <div else>
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
  <Modal title="Modify Trade" :open="modalState" @modal-closed="modalState = false">
    <div class="modal-body">
        <form class="row" @submit.prevent="updateTrade">
            <FormGroup class="col-md-6" :disabled="true" name="user" label="User" :model-value="form.user" />
            <FormGroup class="col-md-6" :disabled="true" name="amount" label="Amount" :model-value="form.amount" />
            <FormGroup class="col-md-6" :disabled="true" name="type" label="Type" :model-value="form.type" />
            <FormGroup class="col-md-6" :disabled="true" name="status" label="Status" v-model="form.status" />
            <FormGroup class="col-md-6" :disabled="true" name="asset" label="Asset" v-model="form.asset" />
            <FormGroup class="col-md-6" :disabled="true" name="stop_loss" label="Stop Loss" v-model="form.stop_loss" />
            <FormGroup name="returns" label="Returns (Profit/Loss)" v-model="form.returns" />

            <div class="text-center">
                <FormButton type="submit" class="btn btn-outline-primary" :disabled="form.processing">
                    <ButtonLoader text="Update Trade" :loading="form.processing" />
                </FormButton>
            </div>
        </form>
    </div>
  </Modal>
</template>

<script setup>
import breadcrumb from '@/views/components/layout/breadcrumb.vue';
import { computed, ref } from 'vue';
import Paginator from '@/views/components/paginator.vue';
import FormButton from '@/views/components/form/FormButton.vue';
import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
import Modal from '@/views/components/modal.vue';
import FormGroup from '@/views/components/form/FormGroup.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    trades: Object,
})
const form = useForm({
    returns: '',
    asset: '',
    type: '',
    status: '',
    stop_loss: '',
    user: '',
    id: '',
});
const trades = computed(() => props.trades.data);
const links = computed(() => props.trades.links);
const trade = ref(null);
const modalState = ref(false);
const view = id => {
    let trade = trades.value.filter(item => item.id == id)[ 0 ];
    form.returns = trade.returns;
    form.amount = trade.amount;
    form.type = trade.type;
    form.status = trade.status;
    form.stop_loss = trade.stop_loss;
    form.asset = trade.tradeable.name;
    form.user = trade.user.first_name;
    form.id = trade.id;
    modalState.value = true;
}

const updateTrade = () => {
    form.put(route('admin.trades.update',form.id));
}

const closeTrade = id => {
    Inertia.post(route('admin.trades.close',id), {}, {
        onBefore: () => confirm('Are you sure you want to close this trade?')
    })
}


</script>

<style>

</style>
