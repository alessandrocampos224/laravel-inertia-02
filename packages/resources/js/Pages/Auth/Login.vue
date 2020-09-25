<template>
    <Full title="Login">
        <div class="row m-0">
            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                <img src="/_dist/admin/images/pages/login.png" alt="branding logo">
            </div>
            <div class="col-lg-6 col-12 p-0">
                <div class="card rounded-0 mb-0 px-2">
                    <div class="card-header pb-1">
                        <div class="card-title">
                            <h4 class="mb-0">{{ __('Login')}}</h4>
                        </div>
                    </div>
                    <p class="px-2">{{ __('Welcome back, please login to your account.')}}</p>
                    <div class="card-content">
                        <div class="card-body pt-1">
                            <form @submit.prevent="submit">
                                <FormRendererText :column="column.email" :form="form" :errors="$page.errors.email"/>
                                <FormRendererText :column="column.password" :form="form" :errors="$page.errors.password"/>
                                <div class="form-group d-flex justify-content-between align-items-center">
                                    <div class="text-left">
                                        <FormRendererCheckBox :column="column.remember" :form="form" :errors="$page.errors.remember" />
                                    </div>
                                    <div class="text-right">
                                        <call-link href="password.request">{{ __('Forgot Password?') }}</call-link>
                                    </div>
                                </div>
                                <call-link href="register"  class="btn btn-outline-primary float-left btn-inline">{{ __('Register') }}</call-link>
                                <button type="submit" class="btn btn-primary float-right btn-inline">{{ __('Login') }}</button>
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
        components: {Full, SocialMediaComponent},
        props:['form','column'],
        methods: {
            submit() {
                this.$call.post(this.$route('login'), this.form)
            },
            __(value){
                return value;
            },
        },
    }
</script>
