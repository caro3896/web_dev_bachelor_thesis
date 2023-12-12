<script>
import AdminLayout from '../Layouts/AdminLayout.vue';
import FormField from '../Components/Form/FormField.vue';
import Button from '../Components/Buttons/Button.vue';
import InputError from '../Components/Form/InputError.vue';

export default {
    layout: AdminLayout,
    components: {
        FormField, 
        Button,
        InputError
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
            <div class="flex items-center">
                <Button type="submit">
                    <img src="/icons/save.svg" alt="" class="pr-2">
                    <p>Opdater information</p>
                </Button>
            </div>
        </form>
    </div>
</template>