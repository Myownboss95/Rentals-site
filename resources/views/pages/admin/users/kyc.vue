<template>
  <Head title="KYC" />
  <breadcrumb title="KYC" :crumbs="['Dashboard', 'Users', 'KYC']" />
  <div class="card shadow-lg radius-20 col-lg-10 mx-auto">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th>User</th>
              <th>Email</th>
              <th>Phone number</th>
              <th>Country</th>
              <th>State</th>
              <th>City</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody v-if="users.length">
            <tr v-for="(user, key) in users" :key="key">
              <td>
                <img :src="profile_picture(user.image)" style="width: 30px; height: 30px; border-radius: 50%;" />
              </td>
              <td>{{ `${user?.first_name} ${user?.last_name}` }}</td>
              <td>{{ user?.phone }}</td>
              <td>{{ user?.email }}</td>
              <td>{{ user?.country }}</td>
              <td>{{ user?.state }}</td>
              <td>{{ user?.city }}</td>
              <td>{{ new Date(user?.created_at).toDateString() }}</td>
              <td>
                <span
                  @click="showModal(user?.id)"
                  class="btn btn-outline-primary btn-sm"
                >
                  <i class="fa fa-eye"></i>
                </span>
              </td>
            </tr>
          </tbody>
          <tbody v-else>
            <tr>
              <td colspan="10" class="text-muted text-center">
                No verifiable user found
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-center" v-if="users.length">
        <Paginator :links="links" />
      </div>
    </div>
  </div>
  <Modal title="Kyc Verification" :open="openModal" @modal-closed="openModal = false">
    <div class="modal-body">
      <div>
        <div class="text-center">
          <img
            v-if="modalUser.image"
            :src="profile_picture(modalUser.image)"
            style="width: 80px; height: 80px; border-radius: 50%;"
          />
        </div>
        <div class="row mt-3">
          <FormGroup
            class="col-md-6"
            label="Name"
            :model-value="`${modalUser.first_name} ${modalUser.last_name}`"
          />
          <FormGroup
            class="col-md-6"
            label="Email"
            :model-value="modalUser.email"
          />
        </div>
        <div class="row">
          <FormGroup
            class="col-md-6"
            label="Phone"
            :model-value="modalUser.phone"
          />
          <FormGroup
            class="col-md-6"
            label="Country"
            :model-value="modalUser.country"
          />
        </div>
        <div class="row">
          <FormGroup
            class="col-md-6"
            label="State/Region"
            :model-value="modalUser.state"
          />
          <FormGroup
            class="col-md-6"
            label="City/Town"
            :model-value="modalUser.state"
          />
        </div>

        <div class="row">
          <FormGroup
            class="col-md-9"
            label="Address"
            :model-value="modalUser.address"
          />
          <FormGroup
            class="col-md-3"
            label="Zip code"
            :model-value="modalUser.zip_code"
          />
        </div>

        <div v-for="(document, Dkey) in modalUser.documents" :key="Dkey">
          <strong class="d-block w-100 py-1"
            >Document type: {{ capitalize(document.type) }}</strong
          >
          <strong class="d-block w-100 py-1"
            >{{ guessDocumentType(document) }}:
            <a
            target="blank"
              class="btn btn-outline-primary btn-sm mx-3"
              :href="`/storage/documents/${document.document}`"
              ><i class="fa fa-eye"></i> view</a
            ></strong
          >
        </div>

        <div class="d-flex justify-content-between mt-3">
          <FormButton
            class="btn btn-outline-danger"
            :disabled="declineForm.processing"
            @button-clicked="decline(modalUser.id)"
          >
            <ButtonLoader
              text="<i class='fa fa-times'></i> Decline"
              :loading="declineForm.processing"
            />
          </FormButton>

          <FormButton
            class="btn btn-outline-success"
            :disabled="approveForm.processing"
            @button-clicked="approve(modalUser.id)"
          >
            <ButtonLoader
              text="Approve <i class='fa fa-check'></i>"
              :loading="approveForm.processing"
            />
          </FormButton>
        </div>
      </div>
    </div>
  </Modal>
</template>

<script setup>
  import breadcrumb from '@/views/components/layout/breadcrumb.vue';
  import { computed, ref } from 'vue';
  import Paginator from '@/views/components/paginator.vue';
  import { profile_picture, capitalize } from '@/js/functions';
  import Modal from '@/views/components/modal.vue';
  import FormGroup from '@/views/components/form/FormGroup.vue';
  import FormButton from '@/views/components/form/FormButton.vue';
  import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
  import { useForm } from '@inertiajs/inertia-vue3';

  const props = defineProps({
    users: Object,
  });
  const users = computed(() => props.users.data);
  const links = computed(() => props.users.links);
  const modalUser = ref({});
  const openModal = ref(false);

  const approveForm = useForm({});

  const declineForm = useForm({});

  const showModal = (id) => {
    modalUser.value = users.value.filter((item) => item.id == id)[0];
    openModal.value = true;
  };

const approve = id => {
    approveForm.post(route('admin.kyc.approve', id), {
        onBefore: () => confirm('Are you sure you want to approve this user?'),
         onSuccess: () => closeModal()
    });
}

  const decline = id => {
      declineForm.post(route('admin.kyc.decline', id), {
          onBefore: () => confirm('Are you sure you want to decline this user?'),
          onSuccess: () => closeModal()
    });
  }

const closeModal = () => {
    document.querySelectorAll('.btn-close').forEach(element => {
                element.click();
            });
  }

const guessDocumentType = document => {
    let doc = 'Document';
    if (document.type == 'passport') {
        doc += ' (Data page)'
    } else {
        if (document.front) {
            doc += ' (Front)'
        } else {
            doc += ' (Back)'
        }
    }
    return doc;
  };
</script>

<style>
</style>
