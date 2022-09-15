<template>
<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-24 fw-bold">{{title}}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item" v-for="(crumb, key) in crumbs" :key="key" v-text="crumb"></li>
                        <!-- <li class="breadcrumb-item active">Starter Page</li> -->
                    </ol>
                </div>

            </div>
        </div>
    </div>
<!-- end page title -->
</template>

<script>
export default {
    props: {
        title: String,
        crumbs: Object
    }
}
</script>

<style>

</style>
