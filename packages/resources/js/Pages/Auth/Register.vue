<template>
    <Full title="Welcome">
        <div class="card-header">{{ __('Register') }}</div>

        <div class="card-body">
            <form @submit.prevent="submit">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" v-model="form.name" class="form-control" :class="$page.errors.name ?'is-invalid':''">
                        <span class="invalid-feedback" role="alert" v-if="$page.errors.name">
                            <strong>{{ $page.errors.name }}</strong>
                        </span>
                    </div>
                </div>
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
                <div class="form-group row">
                    <label for="password_confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                    <div class="col-md-6">
                        <input id="password_confirm" type="password" v-model="form.password_confirmation" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </Full>
</template>
<script>
    import Full from "../../layouts/Full";
    export default {
        name: "Register",
        components: {Full},
        data() {
            return {
                form: {
                    name: null,
                    email: null,
                    password: null,
                    password_confirmation: false,
                },
            }
        },
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
