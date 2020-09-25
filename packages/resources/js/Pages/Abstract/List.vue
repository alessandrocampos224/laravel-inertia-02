<script>
    export default {
        props:{
            actions: {
                default:[]
            },
            columns: {
                default: []
            },
            data: {
                default: []
            },
            errors: {
                default: []
            },
            options: {
                default: []
            },
            source: {
                default: []
            },
        },
        data(){
            return {
                isBusy: false,
                value:"sdfsfsf",
            }
        }
    }
</script>

<style scoped>

</style>
