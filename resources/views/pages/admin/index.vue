<template>
  <Head title="Dashboard" />
  <breadcrumb title="Dashboard" :crumbs="['Dashboard']" />
  <div class="row m-1">
    <div class="p-2 col-md-3 col-sm-12">
      <div class="card shadow">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-6">
              <span class="text-muted mb-3 lh-1 d-block text-truncate"
                >Total Users</span
              >
              <h4 class="mb-3">
                <span class="counter-value" data-target="{{user_count}}">
                  {{ user_count }}</span
                >
              </h4>
            </div>
            <div class="col-6">
              <i data-feather="users" class="feather-50"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="p-2 col-md-3 col-sm-12">
      <div class="card shadow">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-6">
              <span class="text-muted mb-3 lh-1 d-block"
                >Total Deposits</span
              >
              <h4 class="mb-3">
                <span class="counter-value" data-target="{{deposits_count}}">
                  {{ deposits_count }}</span
                >
              </h4>
            </div>
            <div class="col-6">
              <i data-feather="dollar-sign" class="feather-50"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="p-2 col-md-3 col-sm-12">
      <div class="card shadow">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-6">
              <span class="text-muted mb-3 lh-1 d-block"
                >Total Stakes</span
              >
              <h4 class="mb-3">
                <span class="counter-value" data-target="{{withdrawals_count}}">
                  {{withdrawals_count}}</span>
              </h4>
            </div>
            <div class="col-6">
              <i data-feather="credit-card" class="feather-50"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bottom Section -->
  <div class="row m-1">
    

    
    <div class="p-2 col-md-6 col-sm-12">
      <div class="card shadow ">
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
                    <td>{{ withdrawal.amount }}</td>
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
            !isNaN(withdrawals_count) && withdrawals_count != 0 ?
             withdrawals_count - 6 : "0" }}
            more</span>
        </div>
        <inertia-link :href="route('admin.withdrawals.index')" class="btn btn-primary"
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
                    <td>{{ deposit.amount }}</td>
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
          <!-- <span class="ms-1 text-muted font-size-13"><a href="#" >View More</a></span> -->
        </div>
       <inertia-link :href="route('admin.deposits.index')" class="btn btn-primary"
          >View Deposits<i class="mdi mdi-arrow-right ms-1"></i
        ></inertia-link>
      </div>
      </div>
      
    </div>
    
    <div class="p-2 col-md-12 col-sm-12">
      <div class="card shadow">
        <div class="card-body m-3">
        <div class="row align-items-center">
          <h4 class="mb-3">Recent Users</h4>
          <div v-if="users.length">
            <div class="table-responsive">
              <table class="table mb-0">
                <thead class="table-light">
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(user, key) in users" :key="key">
                    <td>{{ `${user.first_name}` }}</td>
                    <td>{{user.last_name}}</td> 
                    <td>{{ user.email }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div v-else>
            <span class="ms-1 text-muted font-size-13"
              >No Users to Display</span
            >
          </div>
        </div>
        <div class="text-nowrap mb-2">
          <span class="badge bg-soft-success text-success">
            + {{ !isNaN(user_count) ? user_count - 6 : "0" }}
            more users</span
          >
        </div>
        <inertia-link :href="route('admin.users.index')" class="btn btn-primary"
          >View All Users <i class="mdi mdi-arrow-right ms-1"></i
        ></inertia-link>
      </div>
      </div>
      
    </div>
  </div>
</template>

<script setup>
import breadcrumb from "@/views/components/layout/breadcrumb.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { computed, onMounted } from "vue";
import feather from "feather-icons";

const props = defineProps({
  user_count: Number,
  users: Object,
  withdrawals_count: Number,
  withdrawals: Object,
  deposits_count: Number,
  deposits: Object,
  num_buyTrades: Number,
  buyTrades: Object,
  num_sellTrades: Number,
  sellTrades: Object,
});
onMounted(() => {
  // console.log(props.num_users);
  feather.replace();
});

const user_count = computed(() => props.user_count);
const users = computed(() => props.users);
const withdrawals_count = computed(() => props.withdrawals_count);
const withdrawals = computed(() => props.withdrawals);
const deposits_count = computed(() => props.deposits_count);
const deposits = computed(() => props.deposits);
const num_buyTrades = computed(() => props.num_buyTrades);
const buyTrades = computed(() => props.buyTrades);
const num_sellTrades = computed(() => props.num_sellTrades);
const sellTrades = computed(() => props.sellTrades);
</script>


<style>
.feather-50 {
  width: 50px;
  height: 50px;
}
</style>
