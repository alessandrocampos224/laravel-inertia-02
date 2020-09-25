<template>
    <Full title="Register">
        <div class="row m-0">
            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                <img src="/_dist/admin/images/pages/register.jpg" alt="branding logo">
            </div>
            <div class="col-lg-6 col-12 p-0">
                <div class="card rounded-0 mb-0 px-2">
                    <div class="card-header pb-1">
                        <div class="card-title">
                            <h4 class="mb-0">{{ __('Create Account')}}</h4>
                        </div>
                    </div>
                    <p class="px-2">{{ __('Fill the below form to create a new account.')}}</p>
                    <div class="card-content">
                        <div class="card-body pt-0">
                            <form @submit.prevent="submit">
                                <FormRendererText :column="column.name" :form="form" :errors="$page.errors.name"/>
                                <FormRendererText :column="column.email" :form="form" :errors="$page.errors.email"/>
                                <FormRendererText :column="column.password" :form="form" :errors="$page.errors.password"/>
                                <FormRendererText :column="column.password_confirmation" :form="form" :errors="$page.errors.password_confirmation"/>
                                <div class="form-group d-flex justify-content-between align-items-center">
                                    <div class="text-left">
                                        <FormRendererCheckBox :column="column.remember" :form="form" :errors="$page.errors.remember" />
                                    </div>
                                </div>
                                <call-link href="login"  class="btn btn-outline-primary float-left btn-inline">{{ __('Login') }}</call-link>
                                <button type="submit" class="btn btn-primary float-right btn-inline">{{ __('Register') }}</button>
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
        name: "Register",
        components: {Full, SocialMediaComponent},
        props:['form','column'],
        methods: {
            submit() {
                this.$call.post(this.$route('register'), this.form)
            },
            __(value){
                return value;
            }
        }
    }
</script>

<style scoped>

</style>
