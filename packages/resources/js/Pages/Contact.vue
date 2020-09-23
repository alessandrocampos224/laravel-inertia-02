<template>
    <layout title="Welcome">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Example Component Contact</div>
                        <div class="card-body">
                            I'm an example component.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from "../layouts/Layout";
    export default {
        name: "Index",
        components: {Layout}
    }
</script>

<style scoped>

</style>
