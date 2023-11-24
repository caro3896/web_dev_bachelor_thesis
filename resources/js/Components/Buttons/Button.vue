<script>
export default {
    props: {
        buttonStyle: {
            type: String,
            default: 'bg-white text-gray'
        }
    }
}
</script>

<template>
    <button :class="buttonStyle" class="rounded-xl py-2 px-4 hover:underline max-w-min min-w-max flex content-center"> <slot /> </button>
</template>