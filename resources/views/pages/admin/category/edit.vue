<template>
  <Head title="Edit Category" />
  <breadcrumb
    title="Edit Category"
    :crumbs="['Category', 'Edit']"
  />
  <div class="col-lg-4 m-auto">
    <div class="card">
      <div class="card-body">
        <form @submit.prevent="updateCategory">
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
            <ButtonLoader text="Update Category" :loading="form.processing" />
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
  import {ref, watch} from 'vue'
import { error } from '@/js/toast';

const props = defineProps(['category']);
console.log(props.category.name)
  const form = useForm({
    name: props.category?.name,
    slug: props.category?.slug ,
  });

 
  watch(()=> form.slug, (slug)=>{
    if (slug !='') {
      form.slug = slug.replace(/\s+/g, '-').toLowerCase();;
    } 
  })

  



    const updateCategory = () => {
      // console.log(form.data()); 
        form.put(route('admin.categories.update', props.category.id));
  };
</script>

<style>
</style>
