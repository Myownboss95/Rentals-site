<template>
    <Head title="Expired Products" />
    <breadcrumb title="Expired Products" :crumbs="['Dashboard', 'Expired Products']" />
    <div class="card shadow-lg radius-20 col-lg-10 mx-auto">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th></th>
                <th>User</th>
                <th>Order Ref</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Details</th>
                <th>Actions</th>
              </tr>
            </thead>
  
            <tbody v-if="expired_products_list.length">
              <tr v-for="(ep, key) in expired_products_list" :key="key">
                <td>
                  <img :src="profile_picture(ep.user.image)" style="width: 30px; height: 30px; border-radius: 50%;" />
                </td>
                <td>{{ `${ep.user?.first_name} ${ep.user?.last_name}` }}</td>
                <td>{{ ep?.order?.reference }}</td>
                <td>
                    <img
                  :src="`/storage/products/${ep.products.image}`"
                  class="img-thumbnail"
                  alt=""
                />
                {{ ep.products.name }}    
                </td>
                <td>{{ ep?.quantity }}</td>
                <td>
                    <strong>Rented</strong> - {{moment(ep.rent_start).format("dddd, MMMM Do YYYY")}}
                            <br/>
                            <strong>Due</strong> - {{moment(ep.rent_stop).format("dddd, MMMM Do YYYY")}}    
                </td>
                <td>
                  <span
                    @click="showModal(ep?.user?.id, ep.id)"
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
                  No Expired Orders found
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center" v-if="expired_products_list.length">
          <Paginator :links="links" />
        </div>
      </div>
    </div>
    <Modal title="User Details" :open="openModal" @modal-closed="openModal = false">
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
              disabled
            />
            <FormGroup
              class="col-md-6"
              label="Email"
              :model-value="modalUser.email"
              disabled
            />
          </div>
          <div class="row">
            <div class="col-md-12">
                <div class="bg-white mt-3">
                   <textarea class="form-control" v-model="modalUser.message">

                    </textarea>
                </div>
            </div>
        </div>
          
        <div class="d-flex justify-content-between mt-3">
            <FormButton
              class="btn btn-outline-danger"
              :disabled="emailForm.processing"
              @button-clicked="sendEmail(modalOrder_id, modalUser.email, modalUser.message)"
            >
              <ButtonLoader
                text="<i class='fa fa-mail'></i> Send"
                :loading="emailForm.processing"
              />
            </FormButton>
  
            <a :href="`tel:`+modalUser.phone" class="btn btn-outline-success">
            Call <i class="fa fa-phone"></i>
            </a>
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
    import moment from 'moment';
    import { VueEditor } from 'vue3-editor';
  
    const props = defineProps({
        expired_products: Object,
        users: Object
    });
    const expired_products_list = computed(() => props.expired_products.data);
    const all_users = computed(() => props.users);
    const links = computed(() => props.expired_products.links);
    const modalUser = ref({});
    const modalOrder_id = ref('');
    const openModal = ref(false);
  
    const approveForm = useForm({});
  
    const emailForm = useForm({});
  
    const showModal = (id,order_id) => {
    
        // console.log(order_id)
      modalUser.value = all_users.value.filter((item) => item.id == id)[0];
      modalOrder_id.value = order_id;
      openModal.value = true;
    };
  
    const sendEmail = (id, email, message) => {
        // console.log(id)
        emailForm.post(route(`admin.order.sendmail`, {id:id,email:email,message:message.replaceAll(/<\/?[^>]+(>|$)/gi, "")}), {
            onBefore: () => confirm('Send mail to this user?'),
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
  img.img-thumbnail {
  width: 80px;
  height: 80px;
}
  </style>
  