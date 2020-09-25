<template>
    <layout title="Welcome">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form With Label Placeholder with Icons</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form">
                                    <div class="form-body">
                                        <div class="row" v-if="column">
                                            <div class="col-12" v-for="(item, index) in column">
                                                <component :is="currentTabComponent(item.formRenderFramework)"  :column="item" :form="form" :errors="$page.errors[item.name]" :key="index"></component>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1">{{ __('Submit') }}</button>
                                                <call-link :href="options.redirect_url" class="btn btn-outline-warning mr-1 mb-1">{{ __('Reset') }}</call-link>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>
<script>
    import Layout from "@/layouts/Layout";
    export default {
        name: "Edit",
        components: {Layout},
        props:['form','column','options'],
        methods: {
            submit() {
                this.$call.post(this.$route('login'), this.form)
            },
            __(value){
                return value;
            },
            currentTabComponent: function(Component) {
                return Component;
            },
        },
    }
</script>

<style scoped>

</style>
