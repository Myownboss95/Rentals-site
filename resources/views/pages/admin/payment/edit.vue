<template>
  <Head title="Edit Payment Method" />
  <breadcrumb
    title="Edit Payment Method"
    :crumbs="['Dashboard', 'Settings', 'Payment Method', 'Edit']"
  />
  <div class="col-lg-4 m-auto">
    <div class="card">
      <div class="card-body">
        <form @submit.prevent="updatePayment">
          <FormGroup
            name="name"
            placeholder="Asset name"
            label="Asset name"
            v-model="form.name"
          />
          <FormGroup
            name="symbol"
            placeholder="Coin Symbol"
            label="Coin Symbol"
            v-model="form.symbol"
            class="mt-3"
          />
          <FormGroup
            name="roi"
            placeholder="ROI"
            label="Rewards"
            v-model="form.roi"
            class="mt-3"
          />

          <FormSelect
            id="demo"
            name="status"
            label="Enable/Disable"
            :options="{ 1: 'Enable', 0: 'Disable' }"
            v-model="form.status"
            />
          <FormGroup
            name="wallet"
            placeholder="Wallet Address"
            label="Wallet Address"
            v-model="form.wallet"
            class="mt-3"
          />
          <div class="form-group" v-if="form.image">
              <img :src='photo' class="img-fluid p-5"/>
          </div>
          <div class="form-group" v-else>
              <h4>No Image Uploaded Yet</h4>
          </div>
          <div class="form-group" v-if="form.svg">
              <img :src='logo' class="img-fluid p-5"/>
          </div>
          <div class="form-group" v-else>
              <h4>No Logo Uploaded Yet</h4>
          </div>

          <div class="mt-3 mb-3">
          <label >Coin Logo</label>
          <input class="form-control" type="file" @input="form.svg = $event.target.files[0]" />
          </div>
          <div class="mt-3 mb-3">
          <label >QR Code Upload</label>
          <input class="form-control" type="file" @input="form.image = $event.target.files[0]" />
          </div>

          <FormButton
            type="submit"
            class="w-100 btn btn-outline-primary mt-3"
            :disabled="form.processing"
          >
            <ButtonLoader text="Update Payment Method" :loading="form.processing" />
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

const props = defineProps(['payment']);
// console.log(props.payment.status)
  const form = useForm({
    id: props.payment?.id,
    name: props.payment?.name,
    status: props.payment?.status ,
    symbol: props.payment?.symbol ,
    wallet: props.payment?.wallet ,
    image:props.payment?.image,
    logo:props.payment?.logo,
    svg:props.payment?.svg,
    roi:props.payment?.roi,
  });

  let photo = ref(null);
  let svg = ref(null);

  watch(()=> form.symbol, (symbol)=>{
    if (symbol !='') {
      form.symbol = symbol.toUpperCase();
    } 
  })

  watch(()=> form.image, (newPhoto) => {
    if(newPhoto != undefined || newPhoto !='' ){
      photo.value= URL.createObjectURL(newPhoto)
    }
  })
  watch(()=> form.svg, (newSvg) => {
    if(newSvg != undefined || newSvg !='' ){
      svg.value= URL.createObjectURL(newSvg)
    }
  })



    const updatePayment = () => {
      // console.log(form.data()); 
        form.put(route('admin.payment-method.update', props.payment.id));
  };
</script>

<style>
</style>
