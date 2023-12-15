<script>

import AdminLayout from '../../../Layouts/AdminLayout.vue';
import Button from '../../../Components/Buttons/Button.vue';
import FormField from '../../../Components/Form/FormField.vue';
import InputError from '../../../Components/Form/InputError.vue';
import { Head } from '@inertiajs/vue3';

export default {
    layout: AdminLayout,
    props: {
        credits: Number,
    },
    components: {
        FormField,
        Button,
        InputError,
        Head
    },
    data() {
        // Form for credits
        return {
            form: this.$inertia.form({
                credits: 0,
            }),
            errors: {}
        }
    },
    methods: {
        validateCredits(){
            this.errors.credits = '';
            
            if (!this.form.credits && !/^\d+$/.test(this.form.credits))  {
                console.log('test');
                this.errors.credits = 'Credits skal være et tal';
            }
        },
        addCredit() {
            this.validateCredits();

            // Check if there are any errors before submitting
            if (
                Object.keys(this.errors.credits).length === 0 
            ) {

            this.form.put(route('admin.credits.update'), {
                onSuccess: () => this.form.reset(),
            });
            }
        }
    }
    
}
</script>

<template>
    <Head title="Opret reward" />

    <h2 class="text-3xl pb-6">Credits</h2>    
    <p class="mr-2 text-xl">Antal credits: {{ credits }}</p>
    
        <div class="mt-4">
            <!-- Add credits -->
            <form @submit.prevent="addCredit()">
                <FormField v-model="form.credits" type="number" label="Tilføj credits" name="credits" step="50" @input=validateCredits()></FormField>
                <InputError :error="errors.credits"></InputError>
                <div class="flex items-center">
                    <Button class="mt-4">
                        <img class="mr-2" src="/icons/add_credits.svg" alt="Dollar sign with a plus">
                        Tilføj
                    </Button>
                </div>
            </form>
        </div>
        <div v-if="$page.props.success" class="text-yellow mb-2 mt-4 italic">
            {{ $page.props.success }}
        </div>
   
</template>

