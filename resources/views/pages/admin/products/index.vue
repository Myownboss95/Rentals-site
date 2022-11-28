<template>
  <Head title="Categories" />
  <breadcrumb
    title="Add Categories"
    :crumbs="['Dashboard', 'Settings', 'Add Products']"
  />
  <div class="card shadow col-lg-8 mx-auto">
    <div class="card-body">
      <div class="text-end">
        <InertiaLink
          :href="route('admin.products.create')"
          class="btn btn-outline-primary"
        >
          <i class="fa fa-plus"></i>
          Add Products
        </InertiaLink>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr> 
              <th>Name</th>
              <th>Slug</th>
              <th>Amount[SKU]</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody v-if="products.length">
            <tr v-for="(product, key) in products" :key="key">
              <td>{{ product.name }}</td>

              <td>{{ product.slug }}</td>
              <td>{{ product.quantity }}</td>
              <td>
                <InertiaLink
                  :href="route('admin.products.edit', product.id)"
                  class="btn btn-outline-primary btn-sm"
                >
                  <i class="fa fa-edit"></i>
                </InertiaLink>
                <button
                  @click="delete_product(product.id)"
                  class="btn btn-outline-danger btn-sm cursor-pointer"
                >
                  <i class="fa fa-times"></i>
                  Delete Product
                </button>
                <!-- <InertiaLink
                  method="delete"
                  :href="route('admin.products.destroy', product.id)"
                  class="btn btn-outline-danger btn-sm"
                  as="button"
                >
                  <i class="fa fa-trash"></i>
                </InertiaLink> -->
              </td>
            </tr>
          </tbody>
          <tbody v-else>
            <tr>
              <td colspan="9" class="text-muted text-center">
                No Products found
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-center" v-if="products.length">
        <Paginator :links="links" />
      </div>
    </div>
  </div>
</template> 

<script setup>
import breadcrumb from "@/views/components/layout/breadcrumb.vue";
import { computed } from "vue";
import Paginator from "@/views/components/paginator.vue";
import { useForm } from '@inertiajs/inertia-vue3';

const form = useForm({});
const props = defineProps({
  products: Object,
});
// console.log(payment)
const products = computed(() => props.products.data);
const links = computed(() => props.products.links);
const delete_product = id => {
    form.delete(route('admin.products.destroy', id), {
        onBefore: () => confirm('Are you sure you want to Delete?'),
    })
}
</script>

<style>
</style>
