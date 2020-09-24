import { shouldIntercept } from './../call'

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
    render(h, { data, children }) {
        return h('input', {
            ...data,
            attrs: {
                ...data.attrs
            },
            on: {
                ...(data.on || {}),
                change: event => {
                    if (data.on && data.on.change) {
                        data.on.change(event)
                    }

                    if (shouldIntercept(event)) {
                      console.log(event)
                    }
                },
            },
        }, children)
    },
}
