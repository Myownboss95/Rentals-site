<template>
  <Head title="Two Factor Auth" />
  <Breadcrumb
    title="Two Factor Auth"
    :crumbs="['Dashboard', 'Two Factor Auth']"
  />
  <div class="col-lg-4 col-md-4 m-auto mt-5">
    <div class="card shadow">
      <div class="card-body">
        <div
          class="d-flex justify-content-center align-items-center"
          style="min-height: 300px"
        >
        <div v-if="$page.props.auth.user.two_factor_status" class="text-center">
            <p>
            Two factor authentication is enabled.
            </p>
            <FormButton
                class="btn btn-outline-danger"
                @button-clicked="disableTwoFactorAuth"
            >
                <ButtonLoader text="Disable Two Factor Auth" :loading="twoFactorAuthForm.processing" />
            </FormButton>
        </div>
        <div v-else>
          <form
            @submit.prevent="changePassword"
            v-if="$page.props.auth.user.two_factor_auth_status === false"
          >
            <div class="text-center">
              <p>
                To enable two factor authentication, click on the button below
                to get started on the process.
              </p>
              <form @submit.prevent="enableTwoFactorAuth">
                <FormButton class="btn btn-outline-primary" type="submit">
                  <ButtonLoader
                    text="Enable Two Factor Auth"
                    :loading="twoFactorAuthForm.processing"
                  />
                </FormButton>
              </form>
            </div>
          </form>

          <form v-else>
            <div class="text-center px-3 py-2">
              <p>
                Download the google authenticator app from App Store or
                Play store, scan the qr code below
              </p>
              <div class="d-flex justify-content-center py-3">
                <div
                  class="text-center mb-3 p-2 bg-white"
                  v-html="$page.props.auth.user.two_factor_qr_code_svg"
                ></div>
              </div>
              <div class="text-justify">
                  <p>
                    Alternatively you can use
                    <strong>
                      {{ $page.props.auth.user.two_factor_recovery_codes[0] }}
                      <i
                        class="fa fa-copy cursor-pointer"
                        @click="copy($page.props.auth.user.two_factor_recovery_codes[0])"
                      ></i>
                    </strong>
                    as a setup key to create a secure link from authenticator to your account.
                  </p>
                  <p>Copy your recovery codes and store them securely as they can be used to disable Two Factor Authentication.</p>
                  <div class="text-center">
                      <FormButton class="btn btn-outline-success mb-3" @button-clicked="()=>modalOpen = true">
                        <ButtonLoader text="Recovery Codes" />
                      </FormButton>
                  </div>
                  <p>
                    After set up click on the confirm status button below to enter code from the authenticator app to verify the setup.
                  </p>
              </div>

              <div class="">
                <FormButton
                  class="btn btn-outline-info mr-auto"
                  @button-clicked="()=>twoFactorAuthModal = true"
                >
                  <ButtonLoader text="Confirm 2FA Status" />
                </FormButton>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>

    <Modal
      title="Recovery codes"
      id="recoveryCodesModal"
      :open="modalOpen"
      @modeal-closed="
        () => {
          modalOpen = false;
        }
      "
    >
    <div class="modal-body">
        <ol class="list-group">
          <li
            class="list-group-item d-flex justify-content-between"
            v-for="(item, key) in props.auth.user.two_factor_recovery_codes"
            :key="key"
          >
            <span class="copy">{{ item }}</span>
            <span class="text-info" @click="copy(item)">
              <i class="fa fa-copy"></i>
              copy
            </span>
          </li>
        </ol>
    </div>
    </Modal>

    <Modal id="ConfirmTwoFactorModal" size="sm" title="Confirm two factor auth" :open="twoFactorAuthModal" @modeal-closed="() => twoFactorAuthModal = false">
        <div class="modal-body">
            <form class="pb-3" @submit.prevent="sendConfirmTwoFactorRequest">
                <p class="text-center">Enter the TOTP from the google authenticator app and click the confirm button</p>
                <FormGroup placeholder="TOTP code" v-model="confirmTwoFactorAuth.code" />
                <FormButton class="btn btn-outline-success w-100" type="submit">
                    <ButtonLoader text="Confirm" :loading="sendConfirmTwoFactorRequest.processing" />
                </FormButton>
            </form>
        </div>
    </Modal>
  </div>
</template>

<style>
  .list-group-item span {
    cursor: pointer;
  }

  .list-group-item span:last-child {
    display: none;
  }

  .list-group-item:hover span:last-child {
    display: inline-block;
  }
</style>

<script setup>
  import Breadcrumb from '@/views/components/layout/breadcrumb.vue';
  import FormGroup from '@/views/components/form/FormGroup.vue';
  import FormButton from '@/views/components/form/FormButton.vue';
  import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
  import { useForm } from '@inertiajs/inertia-vue3';
  import { onMounted } from '@vue/runtime-core';
  import Modal from '@/views/components/modal.vue';
  import { ref, watch } from 'vue';
    import { copy } from '@/js/functions';
  import { Modal as BootstrapModal } from 'bootstrap';
import { error } from '@/js/toast.js';

const twoFactorAuthForm = useForm();
const confirmTwoFactorAuth = useForm({
    code:''
});

const props = defineProps([ 'auth', 'errors' ]);

watch(
    () => props.errors,
    (errors) => {
        if ('confirmTwoFactorAuthentication' in errors) {
            error(errors.confirmTwoFactorAuthentication.code)
        }
    }
  )

let modalOpen  = ref(false);
let twoFactorAuthModal = ref(false);



  const enableTwoFactorAuth = () => {
    twoFactorAuthForm.post(route('two-factor.enable'));
  };

  const disableTwoFactorAuth = () => {
    twoFactorAuthForm.delete(route('two-factor.disable'));
  };

const sendConfirmTwoFactorRequest = () => {
    confirmTwoFactorAuth.post(route('two-factor.confirm'), {
        // preserveState: true,
        onSuccess: () => {
            document.querySelectorAll('.btn-close').forEach(element => {
                element.click();
            });
        }
    });
  }
</script>

<style>
</style>
