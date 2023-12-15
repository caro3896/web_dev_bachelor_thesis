<script>
import AdminLayout from '../Layouts/AdminLayout.vue';
import FormField from '../Components/Form/FormField.vue';
import Button from '../Components/Buttons/Button.vue';
import InputError from '../Components/Form/InputError.vue';
import { Head } from '@inertiajs/vue3';

export default {
    layout: AdminLayout,
    components: {
        FormField, 
        Button,
        InputError,
        Head
    },
    props: {
        user: Object
    },
    data() {
        // Form outline for user, default data from database
        return {
            form: this.$inertia.form({
                id: this.user.id,
                name: this.user.name,
                email: this.user.email,
                // Old password not displayed
                password: null,
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

            if (this.form.password && this.form.password.length < 6) {
                this.errors.password = 'Password skal være mindsst 6 karakterer langt';
            }
        },
        updateUser(){
            this.validateName();
            this.validateEmail();
            this.validatePassword();
            
            // Check if there are any errors before submitting
            if (
                !this.errors.name &&
                !this.errors.email &&
                !this.errors.password
            ) {

            // Transform form to exclude password if it hasn't been changed
            this.form.transform(data => { 
                if (data.password === null) {
                delete data.password;
                }
            return data;
            })
            .put(route('user.update')); // Send form with put method to update user
            }
        }
    }
}
</script>

<template>
    <Head title="Rediger bruger" />
    <h2 class="text-3xl">Rediger bruger</h2>
    <div class="mt-8">
        <!-- Form for updating user -->
        <form @submit.prevent="updateUser()">
            <div class="mb-6">
                <FormField type="text" name="navn" label="navn" placeholder="Indtast navn på bruger"  v-model="form.name" @input=validateName()></FormField>
                <InputError :error="form.errors.name || errors.name"></InputError>
            </div>
            <div class="mb-6">
                <FormField type="email" name="email" label="email" placeholder="Indtast email på bruger"  v-model="form.email" @input=validateEmail()></FormField>
                <InputError :error="form.errors.email || errors.email"></InputError>
            </div>
            <div class="mb-6">
                <label for="password" class="block uppercase">Password</label>
                <p class="italic text-white mb-2 text-sm">Obs! Indtast kun noget i dette felt hvis du ønsker at opdatere dit password</p>
                <input class="border p-2 rounded-xl placeholder:text-light-gray text-gray bg-white-gray w-full md:w-80"
                type="password"
                name="password"
                placeholder="Indtast nyt password"
                v-model="form.password">
            </div>
    
                <Button type="submit">
                    <img src="/icons/save.svg" alt="Floppy disc icon" class="pr-2">
                    <p>Opdater information</p>
                </Button>
        </form>
        <div v-if="$page.props.success" class="text-yellow mb-2 mt-4 italic">
        {{ $page.props.success }}
        </div>
    </div>
</template>