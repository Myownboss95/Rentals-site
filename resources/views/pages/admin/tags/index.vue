<template>
  <Head title="Tags" />
  <breadcrumb
    title="View Tags"
    :crumbs="['Dashboard', 'Settings', 'Add Tags']"
  />
  <div class="card shadow col-lg-8 mx-auto">
    <div class="card-body">
      <div class="text-end">
        <InertiaLink
          :href="route('admin.tags.create')"
          class="btn btn-outline-primary"
        >
          <i class="fa fa-plus"></i>
          Add Tags
        </InertiaLink>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Slug</th>
              <th>Category</th>
              
              <th>Actions</th>
            </tr>
          </thead>

          <tbody v-if="tag.length">
            <tr v-for="(tags, key) in tag" :key="key">
              <td>{{ tags.name }}</td>

              <td>{{ tags.slug }}</td>
              <td>{{ tags.category.name }}</td>
              <td>
                <InertiaLink
                  :href="route('admin.tags.edit', tags.id)"
                  class="btn btn-outline-primary btn-sm"
                >
                  <i class="fa fa-edit"></i>
                </InertiaLink>

                <InertiaLink
                  method="delete"
                  :href="route('admin.tags.destroy', tags.id)"
                  class="btn btn-outline-danger btn-sm"
                  as="button"
                >
                  <i class="fa fa-trash"></i>
                </InertiaLink>
              </td>
            </tr>
          </tbody>
          <tbody v-else>
            <tr>
              <td colspan="9" class="text-muted text-center">
                No tags found
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-center" v-if="tag.length">
        <Paginator :links="links" />
      </div>
    </div>
  </div>
</template>

<script setup>
import breadcrumb from "@/views/components/layout/breadcrumb.vue";
import { computed } from "vue";
import Paginator from "@/views/components/paginator.vue";

const props = defineProps({
  tags: Object,
});
// console.log(props.tags)
const tag = computed(() => props.tags.data);
const links = computed(() => props.tags.links);
</script>

<style>
</style>
