<script>
    export default {
        name: "AbstractField",
        props:{
            errors: {
                type: [Object, Array, String],
                default: null
            },
            column: {
                type: [Object, Array, String],
                required: true
            },
            form: {
                type: [Object],
                default: null
            },
        },
        methods: {
            __(value){
                return value;
            },
        }
    }
</script>
