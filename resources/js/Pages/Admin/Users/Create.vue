<script>
import MainLayout from '../../../Layouts/MainLayout.vue';
import FormField from '../../../Components/Form/FormField.vue';
import InputError from '../../../Components/Form/InputError.vue';
import Button from '../../../Components/Buttons/Button.vue';

export default {
    layout: MainLayout,
    components: {
        FormField,
        InputError,
        Button
    },
    data() {
        // Form outline for creating a user, empty by default
        return {
            form: this.$inertia.form({
                name: '',
                email:'',
                password: '',
                admin:0
            })
        }
    },
    methods: {
        createUser(){
            // Post form to store user
            this.form.post(route('admin.users.store'));
        }
    }
}
</script>

<template>
    <h2 class="text-3xl">Opret ny bruger</h2>
    <div class="mt-8">
        <!-- Form to create user -->
        <form @submit.prevent="createUser()">
            <div class="mb-6">
                <FormField type="text" name="navn" label="navn" placeholder="Indtast navn"  v-model="form.name"></FormField>
                <InputError :error="form.errors.name"></InputError>
            </div>
            <div class="mb-6">
                <FormField type="email" name="email" label="email" placeholder="Indtast email"  v-model="form.email"></FormField>
                <InputError :error="form.errors.email"></InputError>
            </div>
            <div class="mb-6">
                <FormField type="password" name="password" label="password" placeholder="Indtast password"  v-model="form.password"></FormField>
                <InputError :error="form.errors.password"></InputError>
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
                    <img src="/icons/save.svg" alt="" class="pr-2">
                    <p>Opret bruger</p>
                </Button>
            </div>
        </form>
    </div>
</template>