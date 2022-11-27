<template>
  <Head title="View Wish List" />
  <breadcrumb title="Wish List" :crumbs="['Dashboard', 'Wish List']" />
  <div class="card shadow-lg col-lg-10 mx-auto radius-20">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Product</th>
              <th>Details</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody v-if="wishlists.length">
            <tr v-for="(wishlist, key) in wishlists" :key="key">
              <td>{{ wishlist.name }}</td>
              <td>{{ wishlist.details }}</td>
              <td>
                <a
                  :href="route('shop.show', wishlist.slug)"
                  class="btn btn-outline-info btn-sm mb-2"
                  as="button"
                >
                  <i class="fa fa-archive"></i>
                  View Product </a
                ><br />
                <button
                  @click="delete_wishlist(wishlist.id)"
                  class="btn btn-outline-danger btn-sm cursor-pointer"
                >
                  <i class="fa fa-times"></i>
                  Remove
                </button>
              </td>
            </tr>
          </tbody>
          <tbody v-else>
            <tr>
              <td colspan="10" class="text-muted text-center">
                No Wish List found
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-center" v-if="wishlists.length">
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

const form = useForm({});
const props = defineProps({
  wishlists: Object,
});

// const wishlists = computed(() => props.wishlists.data);
// console.log(wishlists);
const links = computed(() => props.wishlists.links);

const delete_wishlist = (id) => {
  form.delete(route("user.wishlist.destroy", id), {
    onBefore: () => confirm("Are you sure you want to Delete?"),
  });
};
</script>

<style>
</style>
