<template>
  <Head title="View Rented Products" />
  <breadcrumb
    title="Rented Products"
    :crumbs="['Dashboard', 'Rented Products']"
  />
  <div class="card shadow-lg col-lg-10 mx-auto radius-20">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Product</th>
              <th>Qty</th>
              <th>Status</th>
              <th>Rent Starts</th>
              <th>Rent Ends</th>
            </tr>
          </thead>

          <tbody v-if="user_rent.length">
            <tr
              v-for="(user_renteds, key) in user_rent"
              :key="key"
              :class="
                moment().isSameOrAfter(user_renteds.rent_stop) == true
                  ? 'bg-danger text-dark bg-opacity-10'
                  : ''
              "
            >
              <td>
                <img
                  :src="`/storage/products/${user_renteds.products.image}`"
                  class="img-thumbnail"
                  alt=""
                />
                {{ user_renteds.products.name }} Rented for
                {{ user_renteds.rent_duration }} days
                <br />
                <a
                  target="_blank"
                  :href="route('shop.show', user_renteds.products.slug)"
                  class="btn btn-outline-info btn-sm mb-2"
                  as="button"
                >
                  View Product
                  <i class="mdi mdi-arrow-right ms-1"></i>
                </a>
              </td>
              <td>{{ user_renteds.quantity }}</td>
              <td>
                <div
                  v-if="moment().isSameOrAfter(user_renteds.rent_stop) == true"
                >
                  <span class="badge bg-danger p-1">
                    <h6 class="text-white">
                      Expired by
                      {{
                        moment(user_renteds.rent_stop).diff(moment(), "days")
                      }}
                      day(s) <i class="fa fa-exclamation-triangle"></i>
                    </h6>
                  </span>
                  <div class="alert alert-light my-2" role="alert">
                    Please Return Item <i class="fa fa-exclamation-triangle"></i>
                    </div>
                </div>
                <div v-else>
                    <span
                    class="badge bg-success p-1"
                    v-if="
                      moment(user_renteds.rent_stop).diff(moment(), 'days') >2
                    "
                  >
                    <h6 class="text-white d-inline">
                        In Use,
                      {{
                        moment(user_renteds.rent_stop).diff(moment(), "days")
                      }}
                      Day(s) more</h6
                  ></span>
                  <span
                    class="badge bg-warning p-1"
                    v-if="
                      moment(user_renteds.rent_stop).diff(moment(), 'days') == 2
                    "
                  >
                    <h6 class="text-white d-inline">
                      {{
                        moment(user_renteds.rent_stop).diff(moment(), "days")
                      }}
                      Day(s) to Expiry
                      <i class="fa fa-exclamation-triangle"></i></h6
                  ></span>
                  <span
                    class="badge bg-warning p-1"
                    v-if="
                      moment(user_renteds.rent_stop).diff(moment(), 'days') == 1
                    "
                    ><h6 class="text-white d-inline">
                      {{
                        moment(user_renteds.rent_stop).diff(moment(), "days")
                      }}
                      Day(s) to Expiry
                      <i class="fa fa-exclamation-triangle"></i></h6
                  ></span>
                </div>
              </td>
              <td>
                {{
                  moment(user_renteds.rent_start).format("dddd, MMMM Do YYYY")
                }}
              </td>
              <td>
                {{
                  moment(user_renteds.rent_stop).format("dddd, MMMM Do YYYY")
                }}
              </td>
            </tr>
          </tbody>
          <tbody v-else>
            <tr>
              <td colspan="10" class="text-muted text-center">
                <h4>No Orders Yet,</h4>
                <a :href="route('shop.index')" class="btn btn-primary"
                  >Shop Now<i class="mdi mdi-arrow-right ms-1"></i
                ></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-center" v-if="links.length">
        <Paginator :links="links" />
      </div>
    </div>
  </div>
</template>
  
  <script setup>
import breadcrumb from "@/views/components/layout/breadcrumb.vue";
import { computed } from "vue";
import Paginator from "@/views/components/paginator.vue";
import FormButton from "@/views/components/form/FormButton.vue";
import ButtonLoader from "@/views/components/form/ButtonLoader.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import moment from "moment";

const form = useForm({});
const props = defineProps({
  user_rented: Object,
});

const user_rent = computed(() => props.user_rented.data);
// console.log(wishlists);
const links = computed(() => props.user_rented.links);
</script>
  
  <style>
img.img-thumbnail {
  width: 80px;
  height: 80px;
}
</style>
  