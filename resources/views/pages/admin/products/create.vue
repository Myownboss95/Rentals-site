<template>
  <Head title="Create Products" />
  <breadcrumb
    title="Create New Products"
    :crumbs="['Dashboard', 'Settings', 'Create Products', 'Products']"
  />
  <div class="col-lg-7 m-auto">
    <div class="card">
      <div class="card-body">
        <form @submit.prevent="createProducts">
          <FormGroup
            name="name"
            placeholder="Add Product Name"
            label="Add Product Name"
            v-model="form.name"
          />

          <FormGroup
            name="slug"
            placeholder="Enter Slug"
            label="Product Slug"
            v-model="form.slug"
            class="mt-3"
          />
          <FormGroup
            name="details"
            placeholder="Add Product Details"
            label="Add Product Details"
            v-model="form.details"
          />

          <FormGroup
            name="rent_price"
            placeholder="Enter Rent Price"
            label="Rent Price"
            v-model="form.rent_price"
          />
          <FormGroup
            name="sales_price"
            placeholder="Enter Sales Price"
            label="Sales Price"
            v-model="form.sales_price"
          />
          <FormGroup
            name="discount_price"
            placeholder="Enter Discount Price"
            label="Discount Price"
            v-model="form.discount_price"
          />
          <FormGroup
            name="discount_price"
            placeholder="Enter Quantity of Product"
            label="Quantity of Product"
            v-model="form.quantity"
          />
          <div class="mt-3 mb-3">
            <label>Primary Image</label>
            <input
              class="form-control"
              type="file"
              @input="form.image = $event.target.files[0]"
            />
          </div>
          <div class="mt-3 mb-3">
            <label>Other Images</label>
            <input
              class="form-control"
              type="file"
              @input="form.images = $event.target.files[0]"
            />
          </div>

          <div class="mt-3 mb-3">
            <label>Description</label>
            <textarea name="" id="" cols="30" rows="10" class="form-control"
              v-model="form.description">
            </textarea>
          </div>

          <FormSelect
            id="demo"
            name="rent_status"
            label="Rent Status"
            :options="{ 1: 'Enable', 0: 'Disable' }"
            v-model="form.rent_status"
          />

          <FormButton
            type="submit"
            class="w-100 btn btn-outline-primary mt-3"
            :disabled="form.processing"
          >
            <ButtonLoader text="Create Product" :loading="form.processing" />
          </FormButton>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import breadcrumb from "@/views/components/layout/breadcrumb.vue";
import FormGroup from "@/views/components/form/FormGroup.vue";
import FormSelect from "@/views/components/form/FormSelect.vue";
import FormButton from "@/views/components/form/FormButton.vue";
import ButtonLoader from "@/views/components/form/ButtonLoader.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import InputGroup from "@/views/components/form/InputGroup.vue";
import { ref, watch } from "vue";
import axios from "axios";
import { error } from "@/js/toast";

const form = useForm({
  name: "",
  slug: "",
});

watch(
  () => form.slug,
  (slug) => {
    if (slug != "") {
      form.slug = slug.replace(/\s+/g, "-").toLowerCase();
    }
  }
);

const createProducts = () => {
  // console.log(form.data())
  form.post(route("admin.products.store"));
};
</script>

<style>
</style>
