<template>
    <Full :title="__('Please confirm your password before continuing.')">
        <div class="card-header">{{ __('Please confirm your password before continuing.') }}</div>
        <div class="card-body">
            <form @submit.prevent="submit">
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" v-model="form.password" class="form-control"  :class="$page.errors.password ?'is-invalid':''">
                        <span class="invalid-feedback" role="alert" v-if="$page.errors.password">
                            <strong>{{ $page.errors.password }}</strong>
                        </span>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Confirm Password') }}
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
    import Full from "@/layouts/Full";
    export default {
        name: "Confirm",
        components: {Full},
        data() {
            return {
                form: {
                    password: null
                },
            }
        },
        methods: {
            submit() {
                this.$call.post(this.$route('password.confirm'), this.form)
            },
            __(value){
                return value;
            },
        },
    }
</script>

