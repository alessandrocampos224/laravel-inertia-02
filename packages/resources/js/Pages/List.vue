<template>
    <layout title="Welcome">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Example Component</div>
                        <div class="card-body">
                            <b-table :fields="columns" :items="data" show-empty>
                                <template v-slot:empty="scope">
                                    <h4>{{ scope.emptyText }}</h4>
                                </template>
                                <template v-slot:emptyfiltered="scope">
                                    <h4>{{ scope.emptyFilteredText }}</h4>
                                </template>
                            </b-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>
<script>
    import Layout from "@/layouts/Layout";
    import List from "@/Pages/Abstract/List";
    export default {
        name: "Index",
        extends: List,
        components: {Layout}
    }
</script>

<style scoped>

</style>
