<template>
    <Full title="Welcome">
        <div class="card-header">{{ __('Login') }}</div>

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
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" v-model="form.password" class="form-control"  :class="$page.errors.password ?'is-invalid':''">
                        <span class="invalid-feedback" role="alert" v-if="$page.errors.password">
                            <strong>{{ $page.errors.password }}</strong>
                        </span>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        <call-link v-if="route().check('password.request')" class="btn btn-link" :href="route('password.request')">
                            {{ __('Forgot Your Password?') }}
                        </call-link>
                    </div>
                </div>
            </form>
        </div>
    </Full>
</template>

<script>
    import Full from "../../layouts/Full";
    export default {
        name: "Login",
        components: {Full},
        data() {
            return {
                form: {
                    email: null,
                    password: null,
                    remember: false,
                },
            }
        },
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

