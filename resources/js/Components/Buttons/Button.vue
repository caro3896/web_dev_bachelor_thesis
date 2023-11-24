<script>
export default {
    props: {
        buttonStyle: {
            type: String,
            default: 'bg-light-gray text-white'
        }
    }
}
</script>

<template>
    <button :class="buttonStyle" class="rounded-xl py-2 px-4 hover:underline max-w-min min-w-max flex content-center"> <slot /> </button>
</template>