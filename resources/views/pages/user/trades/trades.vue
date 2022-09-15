<template>
  <Head title="Trades" />
  <breadcrumb title="Trades" :crumbs="['Dashboard', 'Trades']" />
  <div class="row mt-3">
    <div class="card shadow col-md-4 col-sm-12">
      <div class="card-body">
        <!-- Trading view widget -->
        <form>
          <FormGroup
            name="amount"
            placeholder="Enter Amount"
            label="Amount"
            v-model="form.amount"
          />

          <FormSelect
            id="tradeable_type"
            name="tradeable_type"
            label="Asset type"
            :options="{
              '': 'Select Asset type',
              crypto: 'Crypto Currency',
              commodity: 'Commodity',
              currency: 'Currency',
            }"
            v-model="form.tradeable_type"
          />

          <FormSelect
            class="mt-3"
            id="asset"
            name="tradeable_id"
            label="Asset"
            :options="assets"
            v-model="form.tradeable_id"
          />

          <FormSelect
            class="mt-3"
            id="stop_loss"
            name="stop_loss"
            label="Stop Loss"
            :options="{'':'Set stop loss', 5: '5%', 15: '15%', 25: '25%', 35: '35%', 50: '50%' }"
            v-model="form.stop_loss"
          />

          <div class="d-flex justify-content-between mt-2">
            <FormButton
              type="button"
              class="w-100 btn btn-success mt-3 m-1"
              :disabled="form.processing"
              @button-clicked="placeTrade('buy')"
            >
              <ButtonLoader text="Buy" :loading="form.processing && form.type == 'buy'" />
            </FormButton>
            <FormButton
              type="button"
              class="w-100 btn btn-danger mt-3 m-1"
              :disabled="form.processing"
              @button-clicked="placeTrade('sell')"
            >
              <ButtonLoader text="Sell" :loading="form.processing && form.type == 'buy'" />
            </FormButton>
          </div>
        </form>
      </div>
    </div>
    <div class="card shadow col-md-8 col-sm-12">
      <div class="card-body">
        <!-- Trading view widget -->
        <Chart
          :options="{ theme: theme.theme ?? 'light', autosize: true }"
          style="height: 400px; width: 100%"
        />
      </div>
    </div>
  </div>
</template>

<script setup>
  import { computed, ref, watch } from 'vue';
  import { useForm } from '@inertiajs/inertia-vue3';
  import FormGroup from '@/views/components/form/FormGroup.vue';
  import FormSelect from '@/views/components/form/FormSelect.vue';
  import FormButton from '@/views/components/form/FormButton.vue';
import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
  import breadcrumb from '@/views/components/layout/breadcrumb.vue';
  import { error } from '@/js/toast';
  import axios from 'axios';

  import { useTheme } from '@/stores/theme';

  import { Chart } from 'vue-tradingview-widgets';

  const theme = useTheme();

  const assets = ref({'':'Select Asset'});

  const props = defineProps({
    trades: Object,
  });
  const trades = computed(() => props.trades.data);
  const links = computed(() => props.trades.links);

  const form = useForm({
    amount: '',
    type: '',
    tradeable_type: '',
    stop_loss: '',
    tradeable_id: '',
  });

  watch(
    () => form.tradeable_type,
    (type) => {
      if (type != '') {
        axios
          .get(route('user.trades.getTradeables', { type }))
          .then((res) => {
              if (res.status != 200) throw Error();
              Object.assign(assets.value, res.data.data);
          })
          .catch((err) => {
            error('Failed to load assets, refresh page.');
          });
      }
    }
  );

  const placeTrade = (type) => {
    form.type = type;
    form.post(route('user.trades.store'));
  };
</script>

<style>
</style>
