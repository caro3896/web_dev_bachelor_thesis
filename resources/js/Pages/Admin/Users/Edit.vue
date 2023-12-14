<script>
import AdminLayout from '../../../Layouts/AdminLayout.vue';
import FormField from '../../../Components/Form/FormField.vue';
import Button from '../../../Components/Buttons/Button.vue';
import InputError from '../../../Components/Form/InputError.vue';
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
                admin: this.user.is_admin
            })
        }
    },
    methods: {
        updateUser(){
            // Transform form to exclude password if it hasn't been changed
            this.form.transform(data => { 
                if (data.password === null) {
                delete data.password;
                }
            return data;
            })
            .put(route('admin.users.user.update', {id: this.form.id})); // Send form with put method to update user
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
                <FormField type="text" name="navn" label="navn" placeholder="Indtast navn på bruger"  v-model="form.name"></FormField>
                <InputError :error="form.errors.name"></InputError>
            </div>
            <div class="mb-6">
                <FormField type="email" name="email" label="email" placeholder="Indtast email på bruger"  v-model="form.email"></FormField>
                <InputError :error="form.errors.email"></InputError>
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 uppercase">Password</label>
                <input class="border p-2 rounded-xl placeholder:text-light-gray text-gray bg-white-gray w-80"
                type="password"
                name="password"
                placeholder="Indtast nyt password"
                v-model="form.password">
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
                <Button type="submit">
                    <img src="/icons/save.svg" alt="" class="pr-2">
                    <p>Opdater bruger</p>
                </Button>
            </div>
        </form>
    </div>
</template>