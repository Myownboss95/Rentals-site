<template>
  <Head title="Edit Category" />
  <breadcrumb title="Edit Category" :crumbs="['Category', 'Edit']" />
  <div class="col-lg-7 m-auto">
    <div class="card">
      <div class="card-body">
        <form @submit.prevent="updateProducts">
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
            name="max_rent_duration"
            placeholder="Add Max Rent Duration"
            label="Add Maximum Rent Duration"
            v-model="form.max_rent_duration"
          />
          <FormGroup
            name="details"
            placeholder="Add Product Details"
            label="Add Product Details"
            v-model="form.details"
          />
          <FormSelect
            id="categories"
            name="categories"
            label="Product Category"
            :options="categories"
            v-model="form.category_id"
          />

          <FormSelect
            id="rent_status"
            name="rent_status"
            label="Rent Status"
            :options="{ 1: 'Enable', 0: 'Disable' }"
            v-model="form.rent_status"
          />
          <FormSelect
            id="featured"
            name="featured"
            label="Make Featured Product"
            :options="{ 1: 'Enable', 0: 'Disable' }"
            v-model="form.featured"
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
          <div v-if="viewImage">
            <img alt="" height="170" :src="`/storage/products/${viewImage}`" class="img-fluid w-50 border border-dark rounded">
          </div>
          
          <div class="mt-3 mb-3">
            <label>Other Images</label>
            <input
              class="form-control"
              type="file"
              multiple="multiple"
              @input="form.images = $event.target.files"
            />
          </div>
          <div v-if="viewImages.length" class="row">
            <div class="col-sm-2 col-md-3" v-for="(image, key) in viewImages" :key="key">
              <img alt="" height="140" :src="`/storage/products/${image}`" class="img-fluid border border-dark rounded">
            </div>
          </div>
          <!-- <upload-media /> -->

          <div class="mt-3 mb-3">
            <label>Description</label>
            <textarea
              name="description"
              id=""
              cols="30"
              rows="10"
              class="form-control"
              v-model="form.description"
            >
            </textarea>
          </div>

          <FormButton
            type="submit"
            class="w-100 btn btn-outline-primary mt-3"
            :disabled="form.processing"
          >
            <ButtonLoader text="Update Product" :loading="form.processing" />
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
import { computed, ref, watch } from "vue";
import { error } from "@/js/toast";

const props = defineProps(["product","categories"]);
// console.log(props.categories);
const form = useForm({
  name: props.product?.name,
  slug: props.product?.slug,
  details: props.product?.details,
  category_id: props.product?.category_id,
  rent_status: props.product?.rent_status,
  max_rent_duration: props.category?.max_rent_duration,
  rent_price: props.product?.rent_price,
  sales_price: props.product?.sales_price,
  discount_price: props.product?.discount_price,
  quantity: props.product?.quantity,
  image: props.product?.image,
  featured:props.product?.featured,
  images: props.product?.images,
  description: props.product?.description,
});

const categories = computed({
  get() {
      let filtered = { '': 'Select Category' };
      props.categories.forEach((item) => {
        filtered[item.id] = `${item.name}`;
      });
      return filtered;
    },
})
const viewImages = computed(()=>props.product.images)
const viewImage = computed(()=>props.product.image)
watch(
  () => form.slug,
  (slug) => {
    if (slug != "") {
      form.slug = slug.replace(/\s+/g, "-").toLowerCase();
    }
  }
);

const updateProducts = () => {
  // console.log(form.data());
  form.put(route("admin.products.update", props.product.id));
};
</script>

<style>
</style>
