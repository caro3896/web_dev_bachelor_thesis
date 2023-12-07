<template>
    <h2 class="text-3xl pb-6">Credits</h2>
        
            <p class="mr-2 text-xl">Antal credits: {{ credits }}</p>
    
        <div class="mt-4">
            <!-- Add credits -->
            <form @submit.prevent="addCredit()">
                <FormField v-model="form.credits" type="number" label="Tilføj credits" name="credits" step="50"></FormField>
                <div class="flex items-center">
                    <Button class="mt-4">Tilføj</Button>
                </div>
            </form>
        </div>
   
</template>

<script>

import AdminLayout from '../../../Layouts/AdminLayout.vue';
import Button from '../../../Components/Buttons/Button.vue';
import FormField from '../../../Components/Form/FormField.vue';

export default {
    layout: AdminLayout,
    props: {
        credits: Number,
    },
    components: {
        FormField,
        Button
    },
    data() {
        // Form for credits
        return {
            form: this.$inertia.form({
                credits: '',
            })
        }
    },
    methods: {
        addCredit() {
            this.form.put(route('admin.credits.update'), {
                onSuccess: () => this.form.reset(),
            });
        }
    }
    
}
</script>