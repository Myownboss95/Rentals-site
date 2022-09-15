<template>
  <Head title="Trade Bots" />
  <breadcrumb title="Trade Bots" :crumbs="['Dashboard', 'Trading', 'Trade Bots']" />

  <div class="card shadow col-lg-10 mx-auto">
    <div class="card-body">
        <div class="text-end">
            <InertiaLink :href="route('admin.bots.activation.requests')" class="btn btn-outline-info me-2">
                <i class="fa fa-link"></i>
                Activation request
            </InertiaLink>

            <InertiaLink :href="route('admin.bots.create')" class="btn btn-outline-primary">
                <i class="fa fa-plus"></i>
                Add Bot
            </InertiaLink>
        </div>
        <div class="table-responsive">
          <table class="table">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Profit %</th>
                      <th>Loss %</th>
                      <th>Trades / Day</th>
                      <th>Date</th>
                      <th>Actions</th>
                  </tr>
              </thead>

              <tbody v-if="bots.length">
                  <tr v-for="(bot, key) in bots" :key="key">
                      <td>{{bot.name}}</td>
                      <td>{{bot.profit_percentage}}</td>
                      <td>{{bot.loss_percentage}}</td>
                      <td>{{bot.trades_per_day}}</td>
                      <td>{{new Date(bot.created_at).toDateString()}}</td>
                      <td>
                          <InertiaLink :href="route('admin.bots.edit',bot.id)" class="btn btn-outline-primary btn-sm">
                              <i class="fa fa-edit"></i>
                          </InertiaLink>

                          <InertiaLink method="delete" :href="route('admin.bots.destroy',bot.id)" class="btn btn-outline-danger btn-sm" as="button">
                              <i class="fa fa-trash"></i>
                          </InertiaLink>
                      </td>
                  </tr>
              </tbody>
              <tbody v-else>
                <tr>
                    <td colspan="9" class="text-muted text-center">No bots found</td>
                </tr>
              </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center" v-if="bots.length">
            <Paginator :links="links" />
        </div>
    </div>
  </div>
</template>

<script setup>
import breadcrumb from '@/views/components/layout/breadcrumb.vue';
import { computed } from '@vue/runtime-core';
import Paginator from '@/views/components/paginator.vue';

const props = defineProps({
    bots: Object,
});

const links = computed(() => props.bots.links);
const bots = computed(() => props.bots.data);

</script>

<style>

</style>
