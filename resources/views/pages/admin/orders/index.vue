 <template>
  <Head title="Dashboard" />
  <breadcrumb title="Dashboard" :crumbs="['Dashboard']" />

  <h4 class="mb-3">Recent Orders</h4>
  <div class="w-100 mb-3 d-flex justify-content-between">
      <div class="col-sm-8 col-md-3">
        <FormInput placeholder="Search..." v-model="form.search" class="w-100" />
      </div>

      
    </div>
  <div v-if="user_orders.length">
    <div class="row mt-3" v-for="(user_order, key) in user_orders" :key="key">
      <div class="card shadow col-md-4 col-sm-12">
          
        <div class="card-body">
            <img :src="profile_picture(user_order.user.image)" style="width: 30px; height: 30px; border-radius: 50%;" />
                
              <h6>{{ `${user_order.user?.first_name} ${user_order.user?.last_name}` }}</h6>  

            <p>Order Ref: <strong>{{ user_order.reference }}</strong> <br>
            Total Order Amount = <strong>{{ format_money(user_order.amount) }}</strong> </p>
        </div>
      </div>
      <div class="card shadow col-md-8 col-sm-12">
        <div class="card-body">
          <table class="table table-striped table-sm">
            <tr>
              <th>Product</th>
              <th>Purchase Details</th>
              <th>Rent Started</th>
              <th>Rent Ended</th>
            </tr>
            <tr v-for="(items, key) in user_order.order_items">
              <td>
                <img
                  :src="`/storage/products/${items.products.image}`"
                  class="img-thumbnail"
                  alt=""
                />
                {{ items.products.name }}
              </td>
              <td>
                Qty = {{ items.quantity }}, Amount =
                {{ format_money(items.amount) }}
                <br />
                Rented for {{ items.rent_duration }} days
              </td>
              <td>{{ items.rent_start }}</td>
              <td>{{ items.rent_stop }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div v-else>
    <div class="row mt-3">
        <div class="col-12">
            <h3>Nothing to Display</h3>
        </div>
    </div>
  </div>

  <div class="d-flex justify-content-center" v-if="user_orders.length">
            <Paginator :links="links" />
        </div>
</template>
  
  <script setup>
import breadcrumb from "@/views/components/layout/breadcrumb.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { computed, onMounted, ref, watch, reactive, onBeforeMount } from "vue";
import axios from "axios";
import feather from "feather-icons";
import { profile_picture, capitalize } from '@/js/functions';
import { useForm } from "@inertiajs/inertia-vue3";
import FormInput from '../../../components/form/FormInput.vue';
import FormGroup from "@/views/components/form/FormGroup.vue";
import FormSelect from "@/views/components/form/FormSelect.vue";
import Error from "@/views/components/alerts/error.vue";
import Paginator from '@/views/components/paginator.vue';

const props = defineProps({
  user_orders: Object,
});
const form = useForm({
    
    search: route().params.search || '',
  });
onMounted(() => {
  feather.replace();
});

const user_orders = computed(() => props.user_orders.data);
const links = computed(() => props.user_orders.links);
watch(
    () => form.data(),
    () => {
      form
        .transform((data) => {
          if (data.search == '') {
            delete data.search;
          }
          return data;
        })
        .get(route('admin.order.all_orders'), {
          preserveState: true,
        });
    }
  );
</script>
  
  
  <style>
.feather-50 {
  width: 50px;
  height: 50px;
}
img.img-thumbnail {
  width: 80px;
  height: 80px;
}
</style>
  