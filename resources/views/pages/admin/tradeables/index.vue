<template>
  <Head title="Plans" />
  <breadcrumb title="Plans" :crumbs="['Dashboard', 'Settings', 'Plans']" />
  <div class="card shadow col-lg-8 mx-auto">
    <div class="card-body">
        <div class="text-end">
            <InertiaLink :href="route('admin.tradeables.create')" class="btn btn-outline-primary">
                <i class="fa fa-plus"></i>
                Add Asset
            </InertiaLink>
        </div>
        <div class="table-responsive">
          <table class="table">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Date</th>

                      <th>Actions</th>
                  </tr>
              </thead>

              <tbody v-if="tradeables.length">
                  <tr v-for="(tradeable, key) in tradeables" :key="key">
                      <td>{{tradeable.name}}</td>
                      <td>{{tradeable.type}}</td>
                      <td>{{new Date(tradeable.created_at).toDateString()}}</td>
                      <td>
                          <InertiaLink :href="route('admin.tradeables.edit',tradeable.id)" class="btn btn-outline-primary btn-sm">
                              <i class="fa fa-edit"></i>
                          </InertiaLink>

                          <InertiaLink method="delete" :href="route('admin.tradeables.destroy',tradeable.id)" class="btn btn-outline-danger btn-sm" as="button">
                              <i class="fa fa-trash"></i>
                          </InertiaLink>
                      </td>
                  </tr>
              </tbody>
              <tbody v-else>
                <tr>
                    <td colspan="9" class="text-muted text-center">No assets found</td>
                </tr>
              </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center" v-if="tradeables.length">
            <Paginator :links="links" />
        </div>
    </div>
  </div>
</template>

<script setup>
import breadcrumb from '@/views/components/layout/breadcrumb.vue';
import { computed } from 'vue';
import Paginator from '@/views/components/paginator.vue';

const props = defineProps({
    tradeables: Object,
})
const tradeables = computed(() => props.tradeables.data);
const links = computed(() => props.tradeables.links);


</script>

<style>

</style>
