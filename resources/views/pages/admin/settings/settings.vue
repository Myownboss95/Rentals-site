<template>
  <Head title="Site Settings" />
  <breadcrumb
    title="Site Settings"
    :crumbs="['Dashboard', 'Settings', 'Admin', 'Site Settings']"
  />
  <div class="col-lg-5 m-auto">
    <div class="card">
      <div class="card-body">
        <form @submit.prevent="createPlan">
          <FormGroup
            name="phone"
            placeholder="Site Phone Number"
            label="Site Phone"
            v-model="form.phone"
          />
          <FormGroup
            name="email"
            placeholder="Site Email"
            label="Site Email"
            v-model="form.email"
          />
          <FormGroup
            name="notification_email"
            placeholder="Notification Email"
            label="Notification Email"
            v-model="form.notification_email"
          />
          <FormGroup
            name="twitter"
            placeholder="Twitter URL"
            label="Twitter URL"
            v-model="form.twitter"
          />
          <FormGroup
            name="facebook"
            placeholder="Facebook URL"
            label="Facebook URL"
            v-model="form.facebook"
          />
          <FormGroup
            name="instagram"
            placeholder="Instagram URL"
            label="Instagram URL"
            v-model="form.instagram"
          />

          <FormGroup
            name="chat_script"
            placeholder="Chat Script"
            label="Chat Script"
            v-model="form.chat_script"
          />

          <!-- <FormSelect
            id="demo"
            name="demo"
            label="Demo Plan"
            :options="{ '1': 'Yes', '0': 'No' }"
            v-model="form.demo"
          /> -->



          <FormButton
            type="submit"
            class="w-100 btn btn-outline-primary"
            :disabled="form.processing"
          >
          <ButtonLoader :text="buttonText()" :loading="form.processing" />
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
import { error } from '@/js/toast';

const props = defineProps([ 'settings' ]);

const buttonText = () => {
    let action = props.settings?.id ? 'Update' : 'Save';
    return `${action} Settings`;
}

  const form = useForm({
    phone: props.settings?.phone || '',
    email: props.settings?.email || '',
    notification_email: props.settings?.notification_email || '',
    twitter: props.settings?.twitter || '',
    facebook:props.settings?.facebook || '',
    instagram:props.settings?.instagram || '',
    chat_script:props.settings?.chat_script || '',
  });


    const createPlan = (_) => {
        if(props.settings?.id){
            form.put(route('admin.settings.update',props.settings.id),{
                onBefore: () => confirm('are you sure'),
            });
        }else{
            form.post(route('admin.settings.store'));
        }
  };
</script>

<style>
</style>
