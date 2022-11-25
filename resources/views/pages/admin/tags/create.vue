<template>
  <Head title="Create Tags"/>
  <breadcrumb
    title="Create New Tags"
    :crumbs="['Dashboard', 'Settings', 'Create Tags', 'Create']"
  />
  <div class="col-lg-4 m-auto">
    <div class="card">
      <div class="card-body">
        <form @submit.prevent="createTags">
          <FormGroup
            name="name"
            placeholder="Add Tag Name"
            label="Add Tag Name"
            v-model="form.name"
          />
          <FormSelect
            id="categories"
            name="categories"
            label="Tag Category"
            :options="categories"
            v-model="form.category_id"
          />

          <FormGroup
            name="slug"
            placeholder="Enter Slug"
            label="Tag Slug"
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
  import { computed } from "@vue/reactivity";
import axios from 'axios';
import { error } from '@/js/toast';
 
  const form = useForm({
    name: '',
    slug: '',
    category_id: ''
  });
  const props = defineProps({
  categories: Array,
                    })
const categories = computed({
  get() {
      let filtered = { '': 'Select Category' };
      props.categories.forEach((item) => {
        filtered[item.id] = `${item.name}`;
      });
      return filtered;
    },
})
  watch(()=> form.slug, (slug)=>{
    if (slug !='') {
      form.slug = slug.replace(/\s+/g, '-').toLowerCase();;
    } 
  })

    const createTags = () => {
      // console.log(form.data())
        form.post(route('admin.tags.store'));
  };
</script>

<style>
</style>
