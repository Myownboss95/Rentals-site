<template>
    <Head title="Returned Products" />
    <breadcrumb title="Returned Products" :crumbs="['Dashboard', 'Returned Products']" />
    <div class="card shadow col-lg-10 mx-auto">
      <div class="card-body">
          <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Product</th>
                        <th>Order Ref</th>
                        <th>Details</th>
                        <th>Actions</th>
                    </tr>
                </thead>
  
                  <tbody v-if="orders.length">
                    <tr v-for="(order, key) in orders" :key="key">
                        <td>{{order?.user?.first_name}} {{order?.user?.last_name}}</td>
                        <td><img
                  :src="`/storage/products/${order.products.image}`"
                  class="img-thumbnail"
                  alt=""
                />
                {{ order.products.name }}</td>
                        <td>{{order?.order.reference}}</td>
                        <td><strong>Rented</strong> - {{moment(order.rent_start).format("dddd, MMMM Do YYYY")}}
                            <br/>
                            <strong>Due</strong> - {{moment(order.rent_stop).format("dddd, MMMM Do YYYY")}}
                           
                        </td>
                        
                        <td>
                          <div v-if="order.return_confirmed == 0">
                              <InertiaLink :href="route('admin.order.return.approve',order?.id)" class="btn btn-outline-success btn-sm me-2">
                                  <i class="fa fa-check"></i>
                                  Approve
                              </InertiaLink>
                        </div>
                        <div v-else-if="order.return_confirmed == 1">
                              <InertiaLink :href="route('admin.order.return.decline',order?.id)" class="btn btn-outline-danger btn-sm">
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
                      <td colspan="10" class="text-muted text-center">No orders found</td>
                  </tr>
                </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-center" v-if="orders.length">
              <Paginator :links="links" />
          </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import breadcrumb from '@/views/components/layout/breadcrumb.vue';
  import { computed } from 'vue';
  import Paginator from '@/views/components/paginator.vue';
  import moment from 'moment';
  
  const props = defineProps({
      orders: Object,
  })
  const orders = computed(() => props.orders.data);
  const links = computed(() => props.orders.links);
  
  
  </script>
  
  <style>
  img.img-thumbnail {
  width: 80px;
  height: 80px;
}
  </style>
  