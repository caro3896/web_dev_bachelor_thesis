<script>
import AdminLayout from '../../../Layouts/AdminLayout.vue';
import FormField from '../../../Components/Form/FormField.vue';
import InputError from '../../../Components/Form/InputError.vue';
import Button from '../../../Components/Buttons/Button.vue';
import { Head } from '@inertiajs/vue3';

export default {
    layout: AdminLayout,
    components: {
        FormField,
        InputError,
        Button,
        Head
    },
    data() {
        // Form outline for creating a user, empty by default
        return {
            form: this.$inertia.form({
                name: '',
                email:'',
                password: '',
                admin:0
            }),
            errors: {}
        }
    },
    methods: {
        validateName(){
            this.errors.name = '';
            
            if (!this.form.name) {
                this.errors.name = 'Navn må ikke været tomt';
            }

            if (this.form.name && !/^[a-zA-Z\s]+$/.test(this.form.name)) {
            this.errors.name = 'Navnet må kun indeholde bogstaver';
            }

            if (this.form.name && this.form.name.length > 50) {
                this.errors.name = 'Navnet må max være 50 karakterer langt';
            }
        },
        validateEmail(){
            this.errors.email = '';

            if (!this.form.email) {
                this.errors.email = 'Email skal udfyldes';
            }

            if (this.form.email && !/^\S+@\S+\.\S+$/.test(this.form.email)) {
                this.errors.email = 'Indtast en gyldig email';
            }
        },
        validatePassword(){
            this.errors.password = '';

            if (!this.form.password) {
                this.errors.password = 'Password skal udfyldes';
            }

            if (this.form.password && this.form.password.length < 6) {
                this.errors.password = 'Password skal være mindsst 6 karakterer langt';
            }
        },
        createUser(){
            this.validateName();
            this.validateEmail();
            this.validatePassword();
            
            // Check if there are any errors before submitting
            if (
                Object.keys(this.errors.name).length === 0 &&
                Object.keys(this.errors.email).length === 0 &&
                Object.keys(this.errors.password).length === 0
            ) {
                // Post form to store user
                this.form.post(route('admin.users.store'));
            }
        }
    }
}
</script>

<template>
    <Head title="Opret bruger" />
    <h2 class="text-3xl">Opret ny bruger</h2>
    <div class="mt-8">
        <!-- Form to create user -->
        <form @submit.prevent="createUser()">
            <div class="mb-6">
                <FormField type="text" name="navn" label="navn" placeholder="Indtast navn"  v-model="form.name" @input=validateName()></FormField>
                <InputError :error="form.errors.name || errors.name"></InputError>
            </div>
            <div class="mb-6">
                <FormField type="email" name="email" label="email" placeholder="Indtast email"  v-model="form.email" @input=validateEmail()></FormField>
                <InputError :error="form.errors.email || errors.email"></InputError>
            </div>
            <div class="mb-6">
                <FormField type="password" name="password" label="password" placeholder="Indtast password"  v-model="form.password" @input=validatePassword()></FormField>
                <InputError :error="form.errors.password || errors.password"></InputError>
            </div>
            <div class="mb-6 w-56">
                <label class="block mb-2 uppercase">Bruger type</label>
                <label class="flex items-center">
                    <input class="w-5 h-5 rounded-xl mr-2" type="checkbox" v-model="form.admin">
                    Admin
                </label>
                <InputError :error="form.errors.admin"></InputError>
            </div>
            <div class="flex items-center">
                <Button type="submit" class="flex">
                    <img src="/icons/save.svg" alt="Floppy disc icon" class="pr-2">
                    <p>Opret bruger</p>
                </Button>
            </div>
        </form>
    </div>
</template>