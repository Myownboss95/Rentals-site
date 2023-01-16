<template>
  <Head title="Deposit" />
  <breadcrumb title="Deposit" :crumbs="['Dashboard', 'Deposits', 'Deposit']" />

  <div class="card shadow-lg radius-20 col-lg-7 mx-auto">
    <div class="card-body">
      <div class="row align-items-center py-3">
        <div class="col-md-6 border-end">
          <div class="row">
            <div
              class="col-6 text-center my-2"
              v-for="(method, key) in props.payment_methods"
              :class="{ selected: form.method_id == method.id }"
              @click="selectMethod(method.id, method.name, method.symbol)"
            >
              <div class="border p-4 w-100">
                <img :src="`/storage/payment_methods/${method.svg}`" alt="" class="img-fluid" style="width:100px;height:100px;"/>
                
                <h6>{{ method.name }}</h6>
              </div>
            </div>
            <div class="col-12">
              <FormGroup
                :disabled="disableElements"
                name="amount"
                placeholder="Amount"
                v-model="form.amount"
                class="mt-2"
              />
              <!-- <FormGroup
                disabled
                name="main_amount"
                placeholder="Amount in Naira"
                v-model="form.main_amount"
                class="mt-2"
              /> -->
              <!-- check -->
              <h6 v-if="form.name != ''">
               Amount in Naira: {{format_money(price[form.name.toLowerCase()]['ngn'] * form.amount)}}
              </h6>
              <!-- label="Amount" -->
              <FormButton
                :disabled="disableElements"
                class="btn btn-outline-primary w-100"
                @button-clicked="validate"
                v-if="!props.validated"
              >
                <ButtonLoader text="Continue" :loading="form.processing" />
              </FormButton>
            </div>
          </div>
        </div>
        <div class="col-md-6 align-text-top">
          <div class="">
            <div class="" v-if="!props.validated">
                <h4>Instructions:</h4>
                <p>Click on a payment option</p>
                <div class="mt-3" v-if="form.name != '' && form.amount!= ''">
               <p> Copy the wallet address or scan the Qrcode above and send the
                equivalent of <strong> {{format_money(price[form.name.toLowerCase()]['ngn'] * form.amount)}}</strong> or <strong>{{ parseFloat(form.amount) }} {{ method.symbol }}</strong> to the wallet address.</p>
               <p>After payment, upload your proof of payment.</p> 
                </div>
              
            </div>
            <div class="text-center" v-else>
              <div class="placeholder">
                <img :src="`/storage/payment_methods/${method.image}`" alt="" />
              </div>
              <strong class="font-size-16 my-1">{{method.wallet}} <span class="ml-2" @click="copy(method.wallet)"><i class="fa fa-copy"></i></span></strong>
              <p class="mt-3">
               Copy the wallet address or scan the Qrcode above and send the
                equivalent of <strong> {{format_money(price[form.name.toLowerCase()]['ngn'] * form.amount)}}</strong> or <strong>{{ parseFloat(form.amount) }} {{ method.symbol }}</strong> to the wallet address.</p>
               <p>After payment, upload your proof of payment.</p> 
              <input
                class="form-control"
                type="file"
                accept="image/*"
                @change="form.proof = $event.target.files[0]"
              />
              <Error name="proof" />
              <FormButton
                class="btn btn-outline-primary w-100 mt-3"
                @button-clicked="deposit"
              >
                <ButtonLoader
                  text="Complete Deposit"
                  :loading="form.processing"
                />
              </FormButton>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
  import breadcrumb from '@/views/components/layout/breadcrumb.vue';
  import { useForm } from '@inertiajs/inertia-vue3';
  import FormGroup from '@/views/components/form/FormGroup.vue';
  import FormSelect from '@/views/components/form/FormSelect.vue';
  import FormButton from '@/views/components/form/FormButton.vue';
  import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
  import Error from '@/views/components/alerts/error.vue';
  import { ref, watch, computed, reactive } from 'vue';
  import axios from 'axios';
import { info } from '@/js/toast';
import { copy } from '@/js/functions';

const getCoinUsdPrice = (coin, response) => {
  // coin = coin.toLowerCase();
  return response[coin.toLowerCase()].ngn
}

  const props = defineProps({
    payment_methods: Array,
    validated: {
      type: Boolean,
      default: false,
    },
    data: {
      type: Object,
      default: {},
    },
  });

  const form = useForm({
    method_id: '',
    amount: '',
    pay_with: 'main',
    proof: '',
    name: '',
    symbol: '',
    main_amount:''
  });

  const method = ref({});
  var price = ref({});
  

  const selectMethod = (id, name, symbol) => {
    if (!props.validated) {
      form.method_id = id;
      form.name = name;
      form.symbol = symbol;
      const reqPrice = form.name
      axios.get(`https://api.coingecko.com/api/v3/simple/price?ids=${form.name}&vs_currencies=ngn`)
        .then(response => {
            if (response.status == 200) {
                 price.value = response.data;
                 form.main_amount = price[form.name.toLowerCase()]['ngn'] * form.amount;
                console.log(response.data)
               
            } else {
                throw Error();
            }
        })
        .catch( error => {
           
        })
    } else {
      info('You cannot change method now. Refresh page.');
    }
  };

  // check2
  watch(
    ()=>form.amount,
    (amount)=>{
      axios.get(`https://api.coingecko.com/api/v3/simple/price?ids=${form.name}&vs_currencies=ngn`)
        .then(response => {
            if (response.status == 200) {
                 price.value = response.data;
                 form.main_amount = (response.data[form.name.toLowerCase()]['ngn'] * amount)
                // console.log(response.data)
               
            } else {
                throw Error();
            }
        })
        .catch( error => {
           
        })
      
    }
  );
  watch(
    () => form.method_id,
    (newMethod) => {
      let m = props.payment_methods.filter((item, index) => item.id == newMethod);
      method.value = m[0];
    }
  );

  const disableElements = computed(() => form.method_id == '' || props.validated);

  const validate = () => {
    form.post(route('user.deposits.validate'));
  };

  const deposit = () => {
  //  console.log( form.data())
    form.post(route('user.deposits.store'));
  };
</script>

<style>
  .selected div {
    border-color: #5156be !important;
  }

  .placeholder {
    height: 100px;
    width: 100px;
  }
  .placeholder img {
    width: 100%;
    height: 100%;
  }

</style>
