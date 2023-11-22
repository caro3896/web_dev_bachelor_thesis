<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link
    }
}
</script>

<template>
    <Link class="bg-off-white text-gray rounded-xl py-2 px-4 hover:underline"><slot/></Link>
</template>