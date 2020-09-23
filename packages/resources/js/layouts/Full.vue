<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <call-link class="navbar-brand" v-if="route().check('home')" :href="route('home')">
                    Laravel
                </call-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item" v-if="route().check('home')">
                            <call-link class="nav-link" :href="route('home')">Home</call-link>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item" v-if="route().check('home')">
                            <call-link class="nav-link" :href="route('home')">Login</call-link>
                        </li>
                        <li class="nav-item" v-if="route().check('register')">
                            <a class="nav-link" :href="route('register')">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
            <slot></slot>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
<script>
    export default {
        props: {
            title: String,
        },
        watch: {
            title: {
                immediate: true,
                handler(title) {
                    document.title = title
                },
            },
        },
    }
</script>
