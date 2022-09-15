<template>
  <Head title="Send Mail" />
  <breadcrumb
    title="Send Mail"
    :crumbs="['Dahsboard', 'Communications', 'Mail', 'Send']"
  />

  <div class="col-md-8 mx-auto">
    <div class="card shadow-lg radius-20">
      <div class="card-body">
        <form @submit.prevent="sendMail">
          <FormSelect
            name="user"
            id="user"
            label="Select user"
            v-model="form.user"
            :options="users"
          />
          <div class="bg-white mt-3">
            <vue-editor v-model="form.message" />
          </div>
            <Error name="message" />
          <FormLabel label="Attachment" class="mt-3" />
          <input
            type="file"
            name="attachment"
            id="attachment"
            class="form-control"
            @change="form.attachment = $event.target.files[0]"
          />
          <Error name="attachment" />

          <div class="text-center mt-3">
              <FormButton type="submit" class="btn btn-outline-primary btn-block px-5">
                <ButtonLoader text="Send  <i class='fa fa-envelope'></i>" :loading="form.processing" />
              </FormButton>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
  import breadcrumb from '@/views/components/layout/breadcrumb.vue';
  import FormSelect from '@/views/components/form/FormSelect.vue';
  import { VueEditor } from 'vue3-editor';
  import { useForm } from '@inertiajs/inertia-vue3';
  import { computed, ref, watch } from 'vue';
  import Error from '@/views/components/alerts/error.vue';
import FormButton from '@/views/components/form/FormButton.vue';
import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
import FormLabel from '@/views/components/form/FormLabel.vue';
import route from 'ziggy-js';

  const props = defineProps({
    users: Array,
  });

  const users = computed({
    get() {
      let filtered = { '': 'Select User' };
      // filtered[0] = 'Select User';
      props.users.forEach((item) => {
        if (!item.is_admin) {
          filtered[item.id] = `${item.first_name} ${item.last_name}`;
        }
      });
      return filtered;
    },
  });

const user = ref(null);

  const form = useForm({
    user: '',
    message: '',
    attachment: '',
  });


const sendMail = () => {
    form.post(route('admin.mail.send'), {
        onSuccess: () => {
            form.reset();
            document.querySelector('form').reset();
        }
    });
  }
</script>

<style>
  body[data-layout-mode='dark'] .ql-toolbar {
    background-color: rgb(233, 223, 223);
  }

  body[data-layout-mode='dark'] .ql-editor{
    color: black;
  }
</style>
