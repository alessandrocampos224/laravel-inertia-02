<template>
    <layout title="Welcome">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Example Component</div>
                        <div class="card-body">
                            <b-table-simple
                                hover
                                small
                                responsive>
                                <b-thead head-variant="dark">
                                    <b-tr>
                                        <template v-for="(col, i) in columns">
                                            <template v-if="!col.hidden.list">
                                                <template v-if="col.sortable">
                                                    <b-th :key="i">{{ col.text }}</b-th>
                                                </template>
                                                <template v-else>
                                                    <b-th :key="i">{{ col.text }}</b-th>
                                                </template>
                                            </template>
                                        </template>
                                    </b-tr>
                                </b-thead>
                                <b-tbody>
                                    <b-tr v-for="(item, i) in data" :key="i">
                                        <template v-for="(col, index) in columns">
                                            <template v-if="!col.hidden.list">
                                                <b-th :key="index">
                                                    <component :is="currentTabComponent(col.cellRenderFramework)"  :column="col" :item="item"></component>
                                                </b-th>
                                            </template>
                                        </template>
                                    </b-tr>
                                </b-tbody>
                                <b-tfoot>
                                    <b-tr>
                                        <b-td colspan="4" variant="secondary" class="text-center">
                                           <VsxPagination :source="source" :options="options"/>
                                        </b-td>
                                    </b-tr>
                                    <b-tr>
                                        <b-td colspan="4" variant="secondary" class="text-right">
                                            Total Rows: <b>{{ source.total}}</b>
                                        </b-td>
                                    </b-tr>
                                </b-tfoot>
                            </b-table-simple>
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
