<script>
import { Link } from '@inertiajs/vue3';

export default {
    props: {
        buttonStyle: {
            type: String,
            default: 'bg-white text-gray'
        }
    },
    components: {
        Link
    }
}
</script>

<template>
    <Link :class="buttonStyle" class="rounded-xl py-2 px-4 hover:underline max-w-min min-w-max flex content-center"><slot/></Link>
</template>