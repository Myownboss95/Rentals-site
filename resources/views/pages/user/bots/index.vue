<template>
  <Head title="Trade Bot" />
  <breadcrumb
    title="Trade Bot"
    :crumbs="['Dashboard', 'Trading', 'Trade Bot']"
  />

  <div class="col-md-4 mx-auto">
    <div class="card shadow shadow-lg radius-20">
      <div class="card-body">
        <div
          class="d-flex justify-content-center align-items-center"
          style="min-height: 300px"
          v-if="!props.bot"
        >
          <div>
            <p class="">You do no have an active trade bot.</p>
            <inertia-link
              :href="route('user.bots.create')"
              class="btn btn-outline-success w-100"
              >Link a Bot</inertia-link
            >
          </div>
        </div>
        <div class="text-center" v-else>
          <i class="fa fa-robot font-size-24 my-3"></i>
          <h6 class="my-3">Linked Bot: {{ props.bot.name }}</h6>
          <h6 class="my-3">Trades per day: {{ props.bot.trades_per_day }}</h6>
          <h6 class="my-3">
            Bot status:
            <span
              :class="{
                'text-info': props.bot.pivot.status == 'pending',
                'text-success': props.bot.pivot.status == 'success',
                'text-warning': props.bot.pivot.status == 'requested',
                'text-danger': props.bot.pivot.status == 'inactive',
              }"
              >{{ props.bot.pivot.status }}</span
            >
          </h6>
          <div class="my-4">
            <FormButton
              class="btn btn-outline-info mx-1"
              @button-clicked="requestActivation"
              v-if="props.bot.pivot.status == 'pending'"
            >
              <ButtonLoader text="Request Activation" />
            </FormButton>

            <FormButton
              class="btn btn-outline-warning mx-1"
              @button-clicked="deactivateBot()"
              v-if="props.bot.pivot.status == 'active'"
            >
              <ButtonLoader text="Deactivate" />
            </FormButton>

            <FormButton
              class="btn btn-outline-success mx-1"
              @button-clicked="activateModalState = true"
              v-if="props.bot.pivot.status == 'requested'"
            >
              <ButtonLoader text="Activate with token" />
            </FormButton>

            <FormButton
              class="btn btn-outline-success mx-1"
              @button-clicked="reactivateBot"
              v-if="props.bot.pivot.status == 'inactive'"
            >
              <ButtonLoader text="Activate" />
            </FormButton>

            <FormButton
              class="btn btn-outline-danger mx-1"
              @button-clicked="unlinkBot()"
            >
              <ButtonLoader text="Unlink" />
            </FormButton>
          </div>
        </div>
      </div>
    </div>
  </div>
  <Modal
    title="Request Bot Activation"
    id="request_bot_activation"
    :open="requested == true"
    @modal-closed="requested = false"
    size="sm"
  >
    <div class="modal-body">
      <p>
        We recieved your request and our agents will generate the activation
        token. The token will be sent to your email..
      </p>
    </div>
  </Modal>

  <Modal
    title="Activate Trade Bot"
    id="activate_trade_bot"
    :open="activateModalState == true"
    @modal-closed="activateModalState = false"
  >
    <div class="modal-body">
        <form class="p-5" @submit.prevent="activateBot">
            <p class="text-center">To activate this trade bot, enter token sent to your email address.</p>
            <FormGroup id="token" v-model="form.token" name="token"  />
            <FormButton type="submit" class="btn btn-outline-primary w-100">
              <ButtonLoader text="Activate" :loading="form.processing" />
            </FormButton>
        </form>
    </div>
  </Modal>
</template>

<script setup>
  import breadcrumb from '@/views/components/layout/breadcrumb.vue';
  import FormButton from '@/views/components/form/FormButton.vue';
  import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
  import { Inertia } from '@inertiajs/inertia';
  import { useForm } from '@inertiajs/inertia-vue3';
  import Modal from '@/views/components/modal.vue';
  import { computed, reactive, ref } from 'vue';
  import FormGroup from '@/views/components/form/FormGroup.vue';

  const props = defineProps(['bot', 'requested']);
const form = useForm({
    token: ''
  });
  let requested = computed(() => props.requested);
  let activateModalState = ref(false);

  const unlinkBot = () => {
    form.delete(route('user.bots.destroy', props.bot?.id), {
      onBefore: () => confirm('Are you sure you want to unlink this trade bot?'),
    });
  };

  const requestActivation = () => {
    form.post(route('user.bots.activation.request'));
  };

const activateBot = () => {
    form.post(route('user.bots.activate'), {
        onSuccess: () => document.querySelectorAll('.btn-close').forEach(element => {
                element.click();
            })
    });
}

const reactivateBot = () => {
    form.post(route('user.bots.reactivate', props.bot?.pivot?.id));
}

const deactivateBot = () => {
    form.post(route('user.bots.deactivate', props.bot?.pivot?.id), {
        onBefore: () => confirm('Are you sure you want to deactivate this bot?')
    });
}



</script>


<style>
</style>
