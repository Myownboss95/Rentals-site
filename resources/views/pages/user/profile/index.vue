<template>
  <Head title="Profile" />
  <breadcrumb title="Profile" :crumbs="['Dashboard', 'Profile']" />

  <div class="row">
    <div class="col-xl-9 col-lg-8 mx-auto">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm order-2 order-sm-1">
              <div class="d-flex align-items-start mt-3 mt-sm-0">
                <div class="flex-shrink-0">
                  <div class="avatar-xl me-3 mr-3">
                    <img
                      :src="profile_picture(user.image)"
                      alt=""
                      class="rounded-circle header-profile-user mr-1"
                      style="width: 80px; height: 80px"
                    />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <div class="ml-3">
                    <h5 class="font-size-16 mb-1">
                      {{ user.first_name }} {{ user.last_name }}
                    </h5>
                    <p class="text-muted font-size-13">
                      {{ user.email }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="col-sm-auto order-1 order-sm-2">
              <div class="d-flex align-items-start justify-content-end gap-2">
                <div>
                  <button type="button" class="btn btn-soft-light">
                    <i class="me-1"></i> Message
                  </button>
                </div>
                <div>
                  <div class="dropdown">
                    <button
                      class="
                        btn btn-link
                        font-size-16
                        shadow-none
                        text-muted
                        dropdown-toggle
                      "
                      type="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      <i class="bx bx-dots-horizontal-rounded"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="dropdown-item" href="#">Action</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">Another action</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#"
                          >Something else here</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div> -->
          </div>

          <ul
            class="nav nav-tabs-custom card-header-tabs border-top mt-4"
            id="pills-tab"
            role="tablist"
          >
            <li class="nav-item">
              <a
                class="nav-link px-3 active"
                data-bs-toggle="tab"
                href="#overview"
                role="tab"
                >Bio</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link px-3"
                data-bs-toggle="tab"
                href="#about"
                role="tab"
                >Transactions</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link px-3"
                data-bs-toggle="tab"
                href="#kyc"
                role="tab"
                >Referrals</a
              >
            </li>
          </ul>
        </div>
        <!-- end card body -->
      </div>
      <!-- end card -->
 
      <div class="tab-content">
        <div class="tab-pane active" id="overview" role="tabpanel">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title mb-0">Bio</h5>
            </div>
            <div class="card-body">
              <div>
                <div class="pb-3">
                  <div class="row">

                    <div class="col-xl">
                      <div class="text-muted">
                       <form class="py-3 px-2" @submit.prevent="submit">

                <div class="row">
                    <FormGroup class="col-md-6" placeholder="First name" label="First name" v-model="form.first_name" name="first_name" />
                    <FormGroup class="col-md-6" placeholder="Last name" label="Last name" v-model="form.last_name" name="last_name" />
                </div>
                <div class="row mt-4">
                    <FormGroup class="col-md-6" placeholder="Phone" label="Phone number" v-model="form.phone" name="phone"/>
                    <FormSelect class="col-md-6" placeholder="Country" label="Country" v-model="form.country" name="country" :options="countries" />
                </div>
                <div class="row mt-4">
                    <FormSelect class="col-md-6" placeholder="State/Region" label="State/Region" v-model="form.state" name="state" :options="states" />
                    <FormGroup class="col-md-6" placeholder="City/Town" label="City/Town" v-model="form.city" name="city" />
                </div>
                <div class="row mt-4">
                    <FormGroup class="col-md-8" placeholder="Address" label="Address" v-model="form.address" name="address" />
                    <FormGroup class="col-md-4" placeholder="Postal/Zip code" label="Postal/Zip code" v-model="form.zip_code" name="zip_code" />
                </div>
                <div class="row mt-4">
                  <h6>Referral Code</h6>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-7 border p-1">
                        <strong class="font-size-16 my-1">{{hostname}}ref/{{form.referral_code}}</strong>
                      </div>
                      <div class="col-5 border p-1 ref">
                        <span class="ml-2" @click="copy('https://'+hostname+'ref/'+form.referral_code)"><i class="fa fa-copy"></i>
                         <strong> Click to Copy</strong>
                        </span>
                        
                      </div>
                    </div>
                  </div>

                </div>
                

                <div class="d-flex justify-content-center mt-3">
                    <FormButton class="btn btn-primary px-5" type="submit" :disable="form.processing">
                        <ButtonLoader text="Submit" :loading="form.processing" />
                    </FormButton>
                </div>

            </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end card body -->
          </div>
          <!-- end card -->

          <!-- end card -->
        </div>
        <!-- end tab pane -->

        <div class="tab-pane" id="about" role="tabpanel">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title mb-0">Transactions</h5>
            </div>
            <div class="card-body">
              <div>
                <div class="pb-3">
                  <div v-if="transactions.length">
              <div class="table-responsive">
                <table class="table mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>Reference</th>
                      <th>Amount</th>
                      <th>Type</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(transaction, key) in transactions" :key="key">
                      <td>{{ transaction.reference }}</td>
                      <td>{{ transaction.amount }}</td>
                      <td>{{ transaction.type }}</td>
                      <td>{{ transaction.status }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div v-else>
              <span class="ms-1 text-muted font-size-13"
                >No Transactions to Display</span
              >
            </div>

                </div>

              </div>
            </div>
            <!-- end card body -->
          </div>
          <!-- end card -->
        </div>
        <!-- end tab pane -->

        <div class="tab-pane" id="kyc" role="tabpanel">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title mb-0">Referrals</h5>
            </div>
            <div class="card-body">
              <div>
                <div class="row justify-content-center">
                  <div class="row">
                      <div class="col-md-5 col-sm-12 border p-1">
                        <strong class="font-size-16 my-1">{{hostname}}ref/{{form.referral_code}}</strong>
                      </div>
                      <div class="col-md-3 col-sm-12 border p-1 ref">
                        <span class="ml-2" @click="copy('https://'+hostname+'ref/'+form.referral_code)"><i class="fa fa-copy"></i>
                         <strong> Click to Copy</strong>
                        </span>
                        
                      </div>
                    </div>
                    <div class="pb-3">
                  <div v-if="referrals.length">
              <div class="table-responsive">
                <table class="table mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>Reference</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(referral, key) in referrals" :key="key">
                      <td>{{ referral.last_name? referral.last_name:'-' }} {{ referral.first_name ? referral.first_name:'-' }}</td>
                      <td>{{ referral.email }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div v-else>
              <span class="ms-1 text-muted font-size-13"
                >No Transactions to Display</span
              >
            </div>

                </div>

                </div>

              </div>
            </div>
          </div>
        </div>
        <!-- end tab pane -->
      </div>
      <!-- end tab content -->
    </div>
    <!-- end col -->

    <!-- <div class="col-xl-3 col-lg-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-3">Skills</h5>

          <div class="d-flex flex-wrap gap-2 font-size-16">
            <a href="#" class="badge badge-soft-primary">Photoshop</a>
          </div>
        </div>
      </div>
    </div> -->
    <!-- end col -->
  </div>
  <!-- end row -->
</template>

<script setup>
import breadcrumb from "@/views/components/layout/breadcrumb.vue";
import { computed } from "@vue/runtime-core";
import FormInput from '@/views/components/form/FormInput.vue';
import FormGroup from '@/views/components/form/FormGroup.vue';
import FormSelect from '@/views/components/form/FormSelect.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { ref, watch } from "vue";
import axios from 'axios';
import route from "ziggy-js";
import { profile_picture } from "@/js/functions";
import FormButton from '@/views/components/form/FormButton.vue';
import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
import { info } from '@/js/toast';
import { copy } from '@/js/functions';


const props = defineProps({
   user: Object,
  countries: Object,
  transactions: Object,
  hostname: Object,
  referrals: Object
});
// console.log(props.referrals);
const user = computed(() => props.user);
const countries = computed(() => props.countries);
const transactions = computed(()=>props.transactions);
const referrals = computed(()=>props.referrals);
const hostname = computed(()=>props.hostname);

const form = useForm({
    first_name: props.user?.first_name ||'',
    last_name: props.user?.last_name ||'',
    phone: props.user?.phone ||'',
    country: props.user?.country ||'',
    state: props.user?.state ||'',
    city: props.user?.city ||'',
    address: props.user?.address ||'',
    zip_code: props.user?.zip_code ||'',
    referral_code: props.user?.referral_code || '',
})

let states = ref({});

watch(() => form.country, (country) => {
    if (country != '') {
        axios.get(route('location.states', {
            country: props.countries[country]
        }))
        .then(response => {
            if (response.status == 200) {
                states.value = response.data.states;
            } else {
                throw Error();
            }
        })
        .catch(error => {
            error('Failed to load states, please refresh this page');
        })
    }
})

const submit = () => {
    form.post(route('user.profile.update'));
}

</script>


<style scoped>
.card .user-img-wrapper {
  height: 3rem;
  width: 3rem;
  border-radius: 50%;
  overflow: hidden;
}

.user-img-wrapper img {
  object-fit: cover;
}

.card {
  border-radius: 25px;
}
.ref{
  cursor: pointer;
}
</style>
