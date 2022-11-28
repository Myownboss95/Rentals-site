<template>
  <Head title="Categories" />
  <breadcrumb
    title="Add Categories"
    :crumbs="['Dashboard', 'Settings', 'Add Categories']"
  />
  <div class="card shadow col-lg-8 mx-auto">
    <div class="card-body">
      <div class="text-end">
        <InertiaLink
          :href="route('admin.categories.create')"
          class="btn btn-outline-primary"
        >
          <i class="fa fa-plus"></i>
          Add Category
        </InertiaLink>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Slug</th>
              <th>Amount</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody v-if="categories.length">
            <tr v-for="(category, key) in categories" :key="key">
              <td>{{ category.name }}</td>

              <td>{{ category.slug }}</td>
              <td>0</td>
              <td>
                <InertiaLink
                  :href="route('admin.categories.edit', category.id)"
                  class="btn btn-outline-primary btn-sm"
                >
                  <i class="fa fa-edit"></i>
                </InertiaLink>
                <button
                  @click="delete_category(category.id)"
                  class="btn btn-outline-danger btn-sm cursor-pointer"
                >
                  <i class="fa fa-times"></i>
                  Delete Category
                </button>
                <!-- <InertiaLink
                  method="delete"
                  :href="route('admin.categories.destroy', category.id)"
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
                No categories found
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-center" v-if="categories.length">
        <Paginator :links="links" />
      </div>
    </div>
  </div>
</template>

<script setup>
import breadcrumb from "@/views/components/layout/breadcrumb.vue";
import { computed } from "vue";
import Paginator from "@/views/components/paginator.vue";
import { useForm } from "@inertiajs/inertia-vue3";

const form = useForm({});
const props = defineProps({
  categories: Object,
});
// console.log(payment)
const categories = computed(() => props.categories.data);
const links = computed(() => props.categories.links);
const delete_category = id => {
    form.delete(route('admin.categories.destroy', id), {
        onBefore: () => confirm('Are you sure you want to Delete?'),
    })
}
</script>

<style>
</style>
