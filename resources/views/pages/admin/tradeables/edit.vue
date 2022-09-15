<template>
  <Head title="Edit Tradeable Asset" />
  <breadcrumb
    title="Edit Tradeable Asset"
    :crumbs="['Dashboard', 'Settings', 'Tradeable assets', 'Edit']"
  />
  <div class="col-lg-4 m-auto">
    <div class="card">
      <div class="card-body">
        <form @submit.prevent="createAsset">
          <FormGroup
            name="name"
            placeholder="Asset name"
            label="Asset name"
            v-model="form.name"
          />


          <FormSelect
            id="demo"
            name="type"
            label="Demo Plan"
            :options="{ 'crypto': 'Crypto Currency', 'commodity': 'Commodity', 'currency':'Currency' }"
            v-model="form.type"
          />
          <FormButton
            type="submit"
            class="w-100 btn btn-outline-primary mt-3"
            :disabled="form.processing"
          >
            <ButtonLoader text="Update Tradeable Asset" :loading="form.processing" />
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

const props = defineProps(['tradeable']);
  const form = useForm({
    name: props.tradeable?.name || '',
    type: props.tradeable?.type || 'crypto',
  });


    const createAsset = () => {
        form.put(route('admin.tradeables.update', props.tradeable.id));
  };
</script>

<style>
</style>
