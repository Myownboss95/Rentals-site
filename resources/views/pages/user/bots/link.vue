<template>
<Head title="Trade Bots" />
<breadcrumb title="Trade Bots" :crumbs="['Dashboard', 'Trading','Trade Bots', 'Link']" />

<div class="container">

    <div class="plans row">
         <div class="col-xl-3 col-sm-6 mb-3" v-for="(bot, key) in bots" :key="key">
            <div class="card mb-xl-0 shadow-lg radius-20">
                <div class="card-body">
                    <div class="p-2">
                        <h5 class="font-size-16">
                            <i class="fas fa-robot"></i>
                            {{bot.name}}
                            </h5>
                        <!-- <h5 class="mt-3">{{format_money(plan.min_investment)}} <span class="text-muted font-size-16 fw-medium">/ Trade tenure</span></h5> -->
                        <!-- <p class="text-muted mt-3 font-size-15">For small teams trying out Minia for an unlimited
                            period of time</p> -->
                        <div class="mt-4 pt-2 text-muted">
                            <p class="mb-3 font-size-12">
                                <!-- <i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i> -->
                                Can generate <strong>{{bot.trades_per_day}}</strong> Trades a day.
                            </p>
                            <p class="mb-3 font-size-12">
                                <!-- <i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i> -->
                                Can manage profit percentage up to <strong>{{bot.profit_percentage}}%</strong> per trade.
                            </p>
                            <!-- <p class="mb-3 font-size-12">
                                <i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>
                                {{plan.bonus}}% investment bonus
                            </p> -->

                        </div>

                        <div class="mt-4 pt-2">
                            <FormButton class="btn btn-outline-primary w-100" @button-clicked="linkBot(bot.id)">
                                <ButtonLoader text="Link Bot" />
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
</div>

</template>

<script setup>
import breadcrumb from '@/views/components/layout/breadcrumb.vue';
import FormButton from '@/views/components/form/FormButton.vue';
import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps([ 'bots' ]);

const linkBot = id => {
    Inertia.post(route('user.bots.store', {bot_id:id}));
}

</script>

<style>

</style>
