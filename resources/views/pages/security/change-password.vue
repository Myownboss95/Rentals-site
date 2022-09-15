<template>
<Head title="Change password" />
<Breadcrumb title="Change Password" :crumbs="['Dashboard','Change Password']" />
<div class="col-md-4 m-auto mt-5">
    <div class="card">
        <div class="card-body">
            <form @submit.prevent="changePassword">
                <FormGroup type="password" name="old_password" label="Old password" placeholder="Enter old password" v-model="form.old_password" />
                <FormGroup type="password" name="password" label="New password" placeholder="Enter new password" v-model="form.password" />
                <FormGroup type="password" name="password_confirmation" label="Confirm new password" placeholder="Enter new password again" v-model="form.password_confirmation" />
                <FormButton type="submit" class="btn btn-outline-primary w-100">
                    <ButtonLoader :loading="form.processing" text="Change Password" />
                </FormButton>
            </form>
        </div>
    </div>
</div>

</template>

<script setup>
import Breadcrumb from '@/views/components/layout/breadcrumb.vue';
import FormGroup from '@/views/components/form/FormGroup.vue';
import FormButton from '@/views/components/form/FormButton.vue';
import ButtonLoader from '@/views/components/form/ButtonLoader.vue';
import { useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    old_password: '',
    password: '',
    password_confirmation: '',
});

const changePassword = () => {
    form.post(route('password.change'), {
        onSuccess: () => form.reset(),
    })
}

</script>

<style>

</style>
