<template>
<Head title="Subscriptions" />
<breadcrumb title="Subscriptions" :crumbs="['Dashboard', 'Subscriptions']" />

<div class="plans row">
     <div class="col-xl-3 col-sm-6 mb-3" v-for="(plan, key) in plans" :key="key">
        <div class="card mb-xl-0 shadow-lg">
            <div class="card-body">
                <div class="p-2">
                    <h5 class="font-size-16">{{plan.name}}</h5>
                    <h5 class="mt-3">{{format_money(plan.min_investment)}} <span class="text-muted font-size-16 fw-medium">/ Trade tenure</span></h5>
                    <!-- <p class="text-muted mt-3 font-size-15">For small teams trying out Minia for an unlimited
                        period of time</p> -->
                    <div class="mt-4 pt-2 text-muted">
                        <p class="mb-3 font-size-12">
                            <i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>
                            {{plan.tenure}} days trading tenure.
                        </p>
                        <p class="mb-3 font-size-12">
                            <i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>
                            {{plan.bonus}}% investment bonus
                        </p>
                        <p class="mb-3 font-size-12" v-for="(feature, fkey) in plan.features" :key="fkey">
                            <i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>
                            {{feature.name}}
                        </p>
                    </div>

                    <div class="mt-4 pt-2">
                        <FormButton class="btn btn-outline-primary w-100" @button-clicked="subscribe(plan.id)">
                            <ButtonLoader text="Choose Plan" />
                        </FormButton>
                            <!-- Choose Plan -->
                    </div>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
</div>

</template>

<script setup>
import breadcrumb from '@/views/components/layout/breadcrumb.vue';
import FormButton from '@/views/components/form/FormButton.vue';
import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps([ 'plans' ]);

const subscribe = id => {
    Inertia.post(route('user.subscriptions.subscribe', id));
}

</script>

<style>

</style>
