<script>
export default {
    props: {
        label: String,
        type: String,
        placeholder: String,
        modelValue: [String, Number],
        step: String,
        min: String
    },
    methods: {
        handleInput(value) {
            this.$emit('update:modelValue', value);
        }
    },
}
</script>

<template>
    <div>
        <label :for="label" class="block mb-2 uppercase">{{ label }}</label>
        <input class="border p-2 rounded-xl placeholder:text-light-gray text-gray bg-white-gray w-80"
            :type="type"
            :name="label"
            :min="min"
            :placeholder="placeholder"
            :value="modelValue"
            @input="handleInput($event.target.value)"
        >
    </div>
</template>