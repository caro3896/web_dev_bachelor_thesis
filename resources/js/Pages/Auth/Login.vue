<script>
import FormField from '../../Components/Form/FormField.vue';
import InputError from '../../Components/Form/InputError.vue';
import Button from '../../Components/Buttons/Button.vue';
import { Head } from '@inertiajs/vue3';

export default {
    components: {
        FormField,
        InputError,
        Button,
        Head
    },
    data() {
        // Form outline for login credentials
        return {
            form: this.$inertia.form({
                email: '',
                password: ''
            }),
            errors: {}
        }
    },
    methods: {
        validateEmail(){
            this.errors.email = '';

            if (!this.form.email) {
                this.errors.email = 'Email skal udfyldes';
            }

            if (this.form.email && !/^\S+@\S+\.\S+$/.test(this.form.email)) {
                this.errors.email = 'Ugyligt email';
            }
        },
        validatePassword(){
            this.errors.password = '';

            if (!this.form.password) {
                this.errors.password = 'Password skal udfyldes';
            }
        },
        login(){
            this.validateEmail();
            this.validatePassword();

            // Check if there are any errors before submitting
            if (
                Object.keys(this.errors.email).length === 0 &&
                Object.keys(this.errors.password).length === 0
            ) {
                    this.form.post(route('login.store'));
            }
        }
    }
}
</script>

<template>
    <Head title="Login" />
    <main class="grid place-items-center min-h-screen">
        <section class="border border-light-gray p-8 rounded-xl mx-auto">
            <h1 class="text-2xl mb-4">Login</h1>
            <form @submit.prevent="login()">
                <div class="mb-6">
                    <FormField type="email" name="email" label="email" placeholder="Your email"  v-model="form.email" @input=validateEmail()></FormField>
                    <InputError :error="form.errors.email || errors.email"></InputError>
                </div>
                <div class="mb-6">
                    <FormField type="password" name="password" label="password" placeholder="Your password" v-model="form.password" @input=validatePassword()></FormField>
                    <InputError :error="form.errors.password || errors.password"></InputError>
                </div>
                <Button type="submit">Log in</Button>
            </form>
        </section>
    </main>
</template>