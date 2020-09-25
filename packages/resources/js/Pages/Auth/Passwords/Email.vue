<template>
    <Full title="Recover your password">
        <div class="row m-0">
            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                <img src="/_dist/admin/images/pages/forgot-password.png" alt="branding logo">
            </div>
            <div class="col-lg-6 col-12 p-0">
                <div class="card rounded-0 mb-0 px-2">
                    <div class="card-header pb-1">
                        <div class="card-title">
                            <h4 class="mb-0">{{ __('Recover your password')}}</h4>
                        </div>
                    </div>
                    <p class="px-2">{{ __('Please enter your email address and we\'ll send you instructions on how to reset your password.')}}</p>
                    <div class="card-content">
                        <div class="card-body pt-1">
                            <form @submit.prevent="submit">
                                <FormRendererText :column="column.email" :form="form" :errors="$page.errors.email"/>
                                <call-link href="login"  class="btn btn-outline-primary float-left btn-inline">{{ __('Back to Login') }}</call-link>
                                <button type="submit" class="btn btn-primary float-right btn-inline">{{ __('Recover Password') }}</button>
                            </form>
                        </div>
                    </div>
                    <SocialMediaComponent />
                </div>
            </div>
        </div>
    </Full>
</template>
<script>
    import Full from "@/layouts/Full";
    import SocialMediaComponent from "@/components/SocialMediaComponent";
    export default {
        name: "Login",
        components: {SocialMediaComponent, Full},
        props:['form','column'],
        methods: {
            submit() {
                this.$call.post(this.$route('password.email'), this.form)
            },
            __(value){
                return value;
            },
        },
    }
</script>

