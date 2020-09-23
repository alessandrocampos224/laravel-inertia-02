<template>
    <Full title="Reset Password">
        <div class="card-header">{{ __('Reset Password') }}</div>
        <div class="card-body">
            <form @submit.prevent="submit">
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" v-model="form.email" class="form-control"  :class="$page.errors.email ?'is-invalid':''">
                        <span class="invalid-feedback" role="alert" v-if="$page.errors.email">
                            <strong>{{ $page.errors.email }}</strong>
                        </span>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                        <call-link v-if="route().check('login')" class="btn btn-link" :href="route('login')">
                            {{ __('Login?') }}
                        </call-link>
                    </div>
                </div>
            </form>
        </div>
    </Full>
</template>

<script>
    import Full from "@/layouts/Full";
    export default {
        name: "Login",
        components: {Full},
        data() {
            return {
                form: {
                    email: null
                },
            }
        },
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

