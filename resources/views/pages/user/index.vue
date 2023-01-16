<template>
  <Head title="Dashboard" />
  <breadcrumb title="Dashboard" :crumbs="['Dashboard']" />

  <div class="row m-1">
    <div class="p-2 col-md-3 col-sm-12">
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

    

  </div> 

  <!-- Bottom Section -->
  <div class="row m-1">
   

    <div class="p-2 col-md-12 col-sm-12">
      <div class="card shadow">
        <div class="card-body m-3">
          <div class="row align-items-center">
            <h4 class="mb-3">Recent Orders</h4>
            <div v-if="user_orders.length">
              <div class="table-responsive">
                <table class="table mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>Order Ref</th>
                      <th>Total Order Amount</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(user_order, key) in user_orders" :key="key">
                      <td><h5>Order ID = {{ user_order.reference }}</h5>
                        <table class="table table-sm ">
                          <tr>
                            <th>Product</th>
                            <th>Purchase Details</th>
                          </tr>
                          <tr v-for="(items, key) in user_order.order_items">
                            <td><img :src="`/storage/products/${items.products.image}`" class="img-thumbnail" alt="" />
                              {{ items.products.name }}</td>
                            <td> Qty = {{ items.quantity }}, Amount = {{ format_money(items.amount) }}
                              <br>
                              Rented for {{ items.rent_duration }} days
                            </td>
                          </tr>
                        </table>
                      </td>
                      <td>{{ format_money(user_order.amount) }} </td>
                      
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
            :href="route('user.orders')"
            class="btn btn-primary"
            >View All Orders<i class="mdi mdi-arrow-right ms-1"></i
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
                      <td>{{ format_money(deposit.amount) }} </td>
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
  deposits_count: Number,
  deposits: Object,
  user_orders: Object,
  
});
onMounted(() => {
  feather.replace();
});

const userMainBalance = computed(() => props.userMainBalance);
const deposits_count = computed(() => props.deposits_count);
const deposits = computed(() => props.deposits);
const user_orders = computed(()=> props.user_orders);

</script>


<style>
.feather-50 {
  width: 50px;
  height: 50px;
}
img.img-thumbnail{
  width: 80px;
  height: 80px;
}
</style>
