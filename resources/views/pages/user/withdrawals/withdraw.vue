<template>
  <Head title="Withdraw" />
  <breadcrumb
    title="Withdraw"
    :crumbs="['Dashboard', 'Withdrawals', 'Withdraw']"
  />

  <div class="card shadow-lg radius-20 col-lg-7 mx-auto">
    <div class="card-body">
      <div class="row align-items-center py-3">
        <div class="col-md-6">
          <div class="px-3">
            <div class="">
              <h4>Instructions:</h4>
              <ul>
                <li>Select a withdraw method.</li>
                <li>Enter amount you want.</li>
                <li>
                  Enter your wallet address. Make sure your address type is the
                  same as the deposit method.
                </li>
                <li>Click on withdraw.</li>
              </ul>
              <p>
                <i
                  >Please note, withdrawals take upto 3 hours during week days
                  to be processed.</i
                >
              </p>
            </div>
          </div>
        </div> 
        <div class="col-md-6 border-start">
          <div class="row">
            <div
              class="col-6 text-center my-2"
              v-for="(method, key) in props.payment_methods"
              :class="{ selected: form.method_id == method.symbol }"
              @click="selectMethod(method.symbol)"
            >
              <div class="border p-4 w-100">
                <h6>{{ method.name }}</h6>
              </div>
            </div>
            <div class="col-12">
              <hr />

              <FormSelect
                :disabled="disableElements"
                class="my-3"
                name="amount"
                :options="{
                  main: 'Main Balance',
                  referral: 'Referral Balance',
                }"
                v-model="form.account"
              />
              <FormGroup
                :disabled="disableElements"
                name="amount"
                placeholder="Amount"
                v-model="form.amount"
                class="mt-2"
              />
              <FormGroup
                :disabled="disableElements"
                name="address"
                placeholder="Wallet Address"
                v-model="form.address"
              />

              <FormButton
                :disabled="disableElements"
                class="btn btn-outline-primary w-100"
                @button-clicked="withdraw"
              >
                <ButtonLoader text="Withdraw" :loading="form.processing" />
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
  import { info,error } from '@/js/toast';

  const props = defineProps({
      payment_methods: Array,
    flash: {
      type: Object,
      default: {},
    },
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
    account: 'main',
    address: '',
  });

  const method = ref({});

  const selectMethod = symbol => form.method_id = symbol;


  watch(
    () => props.flash,
    (flash) => {
        if ('error' in flash && flash.error != '') {
            error(flash.error);
        }
        console.log(flash.error);
    }
  );

  const disableElements = computed(() => form.method_id == '');

  const validate = () => {
    form.post(route('user.deposits.validate'));
  };

  const withdraw = () => {
    form.post(route('user.withdrawals.store'));
  };
</script>

<style>
  .selected div {
    border-color: #1d6828 !important;
    border-width: 3px ;
  
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
