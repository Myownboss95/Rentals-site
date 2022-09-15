<template>
  <Head title="Create Plan" />
  <breadcrumb
    title="Create Plan"
    :crumbs="['Dashboard', 'Settings', 'Plans', 'Create']"
  />
  <div class="col-lg-5 m-auto">
    <div class="card">
      <div class="card-body">
        <form @submit.prevent="createPlan">
          <FormGroup
            name="name"
            placeholder="Plan name"
            label="Plan name"
            v-model="form.name"
          />
          <FormGroup
            name="tenure"
            placeholder="Trade Tenure in days"
            label="Trade Tenure"
            v-model="form.tenure"
          />
          <FormGroup
            name="bonus"
            placeholder="Bonus eg. 25"
            label="Bonus"
            v-model="form.bonus"
          />
          <FormSelect
            id="demo"
            name="demo"
            label="Demo Plan"
            :options="{ '1': 'Yes', '0': 'No' }"
            v-model="form.demo"
          />
          <FormGroup
            name="min_investment"
            placeholder="Minimum investment"
            label="Minimum investment"
            v-model="form.min_investment"
          />
          <FormGroup
            name="max_investment"
            placeholder="Maximum investment"
            label="Maximum investment"
            v-model="form.max_investment"
          />
          <hr />
          <div class="d-flex justify-content-between">
            <h5>Plan Features</h5>
            <FormButton
              class="btn btn-outline-primary btn-sm"
              @button-clicked="addFeature"
            >
              <i class="fa fa-plus"></i>
              Add
            </FormButton>
          </div>
          <div>
            <InputGroup
              :placeholder="`Plan feature ${key + 1}`"
              class="my-2"
              :name="`features.${key}`"
              v-for="(feature, key) in form.features"
              icon="fa fa-times"
              @button-clicked="removeFeature(key)"
              v-model="form.features[key]"
            />
          </div>
          <hr />
          <FormButton
            type="submit"
            class="w-100 btn btn-outline-primary"
            :disabled="form.processing"
          >
            <ButtonLoader text="Create Plan" :loading="form.processing" />
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
    tenure: '',
    min_investment: '',
      max_investment: '',
    bonus:'',
    demo: 0,
    features: [],
  });

  const addFeature = () => form.features.push('');

  const removeFeature = (key) =>
    (form.features = form.features.filter((item, k) => form.features[key] != k));

    const createPlan = (_) => {
        if (!form.features.length) return error('At least a plan feature is required');
        form.post(route('admin.plans.store'));
  };
</script>

<style>
</style>
