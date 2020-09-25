import { Call, shouldIntercept } from './../../../call'

export default {
    functional: true,
    props: {
        data: {
            type: Object,
            default: () => ({}),
        },
        only: {
            type: Array,
            default: () => [],
        },
    },
    methods:{
        onClick(){
            console.log("Aqui")
        }
    },
    render(h, { props, data, children }) {
        console.log(data, props)
        return h('button', {
            ...data,
            attrs: {
                ...data.attrs
            },
            on: {
                click: event => {
                    if (data.on && data.on.change) {
                        data.on.click(event)
                    }
                    if (shouldIntercept(event)) {

                    }
                },
            },
        }, children)
    },
}
