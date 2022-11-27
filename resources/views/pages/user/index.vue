<template>
  <Head title="Dashboard" />
  <breadcrumb title="Dashboard" :crumbs="['Dashboard']" />

  

  <div v-if="payment_methods.length">
    <div class="row m-1">
      <div
        class="p-2 col-md-3 col-sm-12"
        v-for="(payment_method, key) in payment_methods"
        :key="key"
      >
        <div class="card shadow-lg radius-20">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-8">
                <span
                  class="text-muted mb-3 lh-1 d-block text"
                  style="text-transform: capitalize"
                  >{{ payment_method.type }}</span
                >
                <h4 class="mb-3">
                  <span
                    class="counter-value"
                    data-target="{{ payment_method.account }}"
                  >
                    {{ payment_method.account }}
                    {{ payment_method.symbol }}</span
                  >
                </h4>
                <inertia-link
                  :href="route('user.deposits.create')"
                  class="btn btn-primary"
                  >Deposit<i class="mdi mdi-arrow-right ms-1"></i
                ></inertia-link>
              </div>
              <div class="col-4">
                <img
                  :src="`/storage/payment_methods/${payment_method.svg}`"
                  alt=""
                  class="img-fluid"
                  style="width: 100px"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div v-else>
    <div class="p-2 col-md-3 col-sm-12">
      <div class="card shadow-lg radius-20">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-8">
              <span class="text-muted mb-3 lh-1 d-block text"
                >No Coins Set</span
              >
              <h4 class="mb-3">Nothing to Display</h4>
            </div>
            <div class="col-4">
              <i data-feather="shopping-bag" class="feather-50"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- main balance -->
  <!-- <div class="row m-1">
    <div class="p-2 col-md-6 col-sm-12">
      <div class="card shadow-lg radius-20">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-8">
              <span class="text-muted mb-3 lh-1 d-block text"
                >Main Balance</span
              >
              <h4 class="mb-3">
                <span class="counter-value" data-target="{{userMainBalance}}">
                  {{ format_money(userMainBalance) }}</span
                >
              </h4>
            </div>
            <div class="col-4">
              <i data-feather="shopping-bag" class="feather-50"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    

  </div> -->

  <!-- Bottom Section -->
  <div class="row m-1">
    <div class="p-2 col-md-6 col-sm-12">
      <div class="card shadow">
        <div class="card-body m-3">
          <div class="row align-items-center">
            <h4 class="mb-3">Recent Withdrawals</h4>
            <div v-if="withdrawals.length">
              <div class="table-responsive">
                <table class="table mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>Reference</th>
                      <th>Amount</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(withdrawal, key) in withdrawals" :key="key">
                      <td>{{ withdrawal.reference }}</td>
                      <td>{{ withdrawal.amount }}{{ withdrawal.symbol }}</td>
                      <td>{{ withdrawal.status }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div v-else>
              <span class="ms-1 text-muted font-size-13"
                >No Transactions to Display</span
              >
            </div>
          </div>
          <div class="text-nowrap mb-2">
            <span class="badge bg-soft-success text-success">
              {{
                !isNaN(withdrawals_count) && withdrawals_count != 0
                  ? withdrawals_count - 6
                  : "0"
              }}
              more</span
            >
            <!-- <span class="ms-1 text-muted font-size-13"><inertia-link href="#" >View More</inertia-link></span> -->
          </div>
          <inertia-link
            :href="route('user.withdrawals.index')"
            class="btn btn-primary"
            >View Withdrawals<i class="mdi mdi-arrow-right ms-1"></i
          ></inertia-link>
        </div>
      </div>
    </div>

    <div class="p-2 col-md-6 col-sm-12">
      <div class="card shadow">
        <div class="card-body m-3">
          <div class="row align-items-center">
            <h4 class="mb-3">Recent Deposits</h4>
            <div v-if="deposits.length">
              <div class="table-responsive">
                <table class="table mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>Reference</th>
                      <th>Amount</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(deposit, key) in deposits" :key="key">
                      <td>{{ deposit.reference }}</td>
                      <td>{{ deposit.amount }} {{ deposit.symbol }}</td>
                      <td>{{ deposit.status }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div v-else>
              <span class="ms-1 text-muted font-size-13"
                >No Transactions to Display</span
              >
            </div>
          </div>
          <div class="text-nowrap mb-2">
            <span class="badge bg-soft-success text-success">
              {{
                !isNaN(deposits_count) && deposits_count != 0
                  ? deposits_count - 6
                  : "0"
              }}
              more</span
            >
            <!-- <span class="ms-1 text-muted font-size-13"><inertia-link href="#" >View More</inertia-link></span> -->
          </div>
          <inertia-link
            :href="route('user.deposits.index')"
            class="btn btn-primary"
            >View Deposits<i class="mdi mdi-arrow-right ms-1"></i
          ></inertia-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import breadcrumb from "@/views/components/layout/breadcrumb.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { computed, onMounted, ref, watch, reactive, onBeforeMount } from "vue";
import axios from "axios";
import feather from "feather-icons";
import { useForm } from "@inertiajs/inertia-vue3";
import FormGroup from "@/views/components/form/FormGroup.vue";
import FormSelect from "@/views/components/form/FormSelect.vue";
import Error from "@/views/components/alerts/error.vue";

const props = defineProps({
  userMainBalance: Number,
  userRefBalance: Number,
  userInvestedBalance: Number,
  withdrawals_count: Number,
  withdrawals: Object,
  deposits_count: Number,
  deposits: Object,
  num_buyTrades: Number,
  buyTrades: Object,
  num_sellTrades: Number,
  sellTrades: Object,
  trade_profits: Number,
  active_trades: Number,
  payment_methods: Object,
});
onMounted(() => {
  feather.replace();
});

const userMainBalance = computed(() => props.userMainBalance);
const userRefBalance = computed(() => props.userRefBalance);
const userInvestedBalance = computed(() => props.userInvestedBalance);

const withdrawals_count = computed(() => props.withdrawals_count);
const withdrawals = computed(() => props.withdrawals);
const deposits_count = computed(() => props.deposits_count);
const deposits = computed(() => props.deposits);
const num_buyTrades = computed(() => props.num_buyTrades);
const buyTrades = computed(() => props.buyTrades);
const num_sellTrades = computed(() => props.num_sellTrades);
const sellTrades = computed(() => props.sellTrades);
const trade_profits = computed(() => props.trade_profits);
const activeTrades = computed(() => props.active_trades);
const payment_methods = computed(() => props.payment_methods);

const pm = computed(() => {
  let pms = {'':'Choose Coin'};
  props.payment_methods.forEach(function (method) {
    
    pms[method.type] = method.type;
    // console.log(pms);
  });
  return pms;
});





const form = useForm({
  name:'',
  amount: '',
});

// watch(() => form, (name) => {
//   console.log(name);
// })

const calculatedPrice = ref(0);

var price = ref([]);

// onBeforeMount(() => {
//   selectMethod('bitcoin');
// })

// onMounted(() => {
//   selectMethod('bitcoin');
// })

const selectMethod = (amount, name) => {
  if(name == '') return;
  // console.log(allrois)
  axios
    .get(
      `https://api.coingecko.com/api/v3/simple/price?ids=${form.name}&vs_currencies=usd`
    )
    .then((response) => {
      if (response.status == 200) {
        price.value = response.data;
        calculatedPrice.value = price.value[name.toLowerCase()]['usd'] * calculatedAmount;

      } else {
        throw Error();
      }
    })
    .catch((error) => {
      // error('Failed to load states, please refresh this page');
      console.log(error);
    });
};

// const getPrice = () => computed(() => {
//   if(price.value.length >0 ){
//     return parseFloat(price.value[form.name.toLowerCase()]['usd'] * form.amount);
//   }
//   return 0;
// })
let calculatedAmount = '';
watch(()=>form.amount, (amount)=>{
  calculatedAmount = amount
})
</script>


<style>
.feather-50 {
  width: 50px;
  height: 50px;
}
</style>
