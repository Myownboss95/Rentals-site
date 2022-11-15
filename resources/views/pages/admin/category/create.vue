<template>
  <Head title="Create Category"/>
  <breadcrumb
    title="Create New Category"
    :crumbs="['Dashboard', 'Settings', 'Create Category', 'Create']"
  />
  <div class="col-lg-4 m-auto">
    <div class="card">
      <div class="card-body">
        <form @submit.prevent="createCategory">
          <FormGroup
            name="name"
            placeholder="Add Category Name"
            label="Add Category Name"
            v-model="form.name"
          />

          <FormGroup
            name="slug"
            placeholder="Enter Slug"
            label="Category Slug"
            v-model="form.slug"
            class="mt-3"
          />

         
          <FormButton
            type="submit"
            class="w-100 btn btn-outline-primary mt-3"
            :disabled="form.processing"
          >
            <ButtonLoader text="Create Category" :loading="form.processing" />
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
  import { ref, watch } from 'vue';
import axios from 'axios';
import { error } from '@/js/toast';
 
  const form = useForm({
    name: '',
    slug: '',
  });
  
  watch(()=> form.slug, (slug)=>{
    if (slug !='') {
      form.slug = slug.replace(/\s+/g, '-').toLowerCase();;
    } 
  })

    const createCategory = () => {
      // console.log(form.data())
        form.post(route('admin.categories.store'));
  };
</script>

<style>
</style>
