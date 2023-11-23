<script>
import FormField from '../../Components/Form/FormField.vue';
import InputError from '../../Components/Form/InputError.vue';
import Button from '../../Components/Buttons/Button.vue';

export default {
    components: {
        FormField,
        InputError,
        Button
    },
    data() {
        // Form outline for login credentials
        return {
            form: this.$inertia.form({
                email: '',
                password: ''
            })
        }
    },
    methods: {
        login() {
            this.form.post(route('login.store'));
        }
    }
}
</script>

<template>
    <main class="grid place-items-center min-h-screen">
        <section class="border border-light-gray p-8 rounded-xl max-w-md mx-auto">
            <h1 class="text-2xl mb-4">Login</h1>
            <form @submit.prevent="login()">
                <div class="mb-6">
                    <FormField type="email" name="email" label="email" placeholder="Your email"  v-model="form.email"></FormField>
                    <InputError :error="form.errors.email"></InputError>
                </div>
                <div class="mb-6">
                    <FormField type="password" name="password" label="password" placeholder="Your password" v-model="form.password"></FormField>
                    <InputError :error="form.errors.password"></InputError>
                </div>
                <Button type="submit">Log in</Button>
            </form>
        </section>
    </main>
</template>