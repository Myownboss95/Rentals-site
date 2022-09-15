<template>
  <Head title="Plans" />
  <breadcrumb title="Plans" :crumbs="['Dashboard', 'Settings', 'Plans']" />
  <div class="card shadow col-lg-10 mx-auto">
    <div class="card-body">
        <div class="text-end">
            <InertiaLink :href="route('admin.plans.create')" class="btn btn-outline-primary">
                <i class="fa fa-plus"></i>
                Add Plan
            </InertiaLink>
        </div>
        <div class="table-responsive">
          <table class="table">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Tenure</th>
                      <th >Bonus</th>
                      <th>Min. Investment</th>
                      <th>Max. Investment</th>
                      <th class="d-none d-lg-block">Demo?</th>
                      <th>Date</th>
                      <th>Actions</th>
                  </tr>
              </thead>

              <tbody v-if="plans.length">
                  <tr v-for="(plan, key) in plans">
                      <td>{{plan.name}}</td>
                      <td>{{plan.tenure}}</td>
                      <td>{{plan.bonus}}</td>
                      <td>{{format_money(plan.min_investment)}}</td>
                      <td>{{format_money(plan.max_investment)}}</td>
                      <td class="d-none d-lg-block">{{plan.demo ? 'Yes' : 'No'}}</td>
                      <td>{{new Date(plan.created_at).toDateString()}}</td>
                      <td>
                          <InertiaLink :href="route('admin.plans.edit',plan.id)" class="btn btn-outline-primary btn-sm">
                              <i class="fa fa-edit"></i>
                          </InertiaLink>

                          <InertiaLink method="delete" :href="route('admin.plans.destroy',plan.id)" class="btn btn-outline-danger btn-sm" as="button">
                              <i class="fa fa-trash"></i>
                          </InertiaLink>
                      </td>
                  </tr>
              </tbody>
              <tbody v-else>
                <tr>
                    <td colspan="9" class="text-muted text-center">No plans found</td>
                </tr>
              </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center" v-if="plans.length">
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
    plans: Object,
})
const plans = computed(() => props.plans.data);
const links = computed(() => props.plans.links);


</script>

<style>

</style>
