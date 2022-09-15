<template>
  <Head title="Create Bot" />
  <breadcrumb
    title="Create Bot"
    :crumbs="['Dashboard', 'Trading', 'Trade Bots', 'Create']"
  />
  <div class="col-lg-4 m-auto">
    <div class="card shadow-lg radius-20">
      <div class="card-body">
        <form @submit.prevent="createBot">
          <FormGroup
            name="name"
            placeholder="Bot name"
            label="Bot name"
            v-model="form.name"
          />
          <FormGroup
            name="loss_percentage"
            placeholder="Loss %"
            label="Loss percentage"
            v-model="form.loss_percentage"
          />
          <FormGroup
            name="profit_percentage"
            placeholder="Profit %"
            label="Profit Percentage"
            v-model="form.profit_percentage"
          />
          <FormGroup
            name="trades_per_day"
            placeholder="Trades / Day"
            label="Trades per Day"
            v-model="form.trades_per_day"
          />

          <FormButton
            type="submit"
            class="w-100 btn btn-outline-primary"
            :disabled="form.processing"
          >
            <ButtonLoader text="Create Bot" :loading="form.processing" />
          </FormButton>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
  import breadcrumb from '@/views/components/layout/breadcrumb.vue';
  import FormGroup from '@/views/components/form/FormGroup.vue';
  import FormSelect from '@/views/components/form/FormSelect.vue';
  import FormButton from '@/views/components/form/FormButton.vue';
  import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
  import { useForm } from '@inertiajs/inertia-vue3';
  import InputGroup from '@/views/components/form/InputGroup.vue';
  import { error } from '@/js/toast';

  const form = useForm({
    name: '',
    loss_percentage: '',
    profit_percentage: '',
    trades_per_day: '',
  });
  const createBot = (_) => {
    form.post(route('admin.bots.store'));
  };
</script>

<style>
</style>
