<script>

import AdminLayout from '../../../Layouts/AdminLayout.vue';
import Button from '../../../Components/Buttons/Button.vue';
import FormField from '../../../Components/Form/FormField.vue';
import { Head } from '@inertiajs/vue3';

export default {
    layout: AdminLayout,
    props: {
        credits: Number,
    },
    components: {
        FormField,
        Button,
        Head
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

<template>
    <Head title="Opret reward" />

    <h2 class="text-3xl pb-6">Credits</h2>    
    <p class="mr-2 text-xl">Antal credits: {{ credits }}</p>
    
        <div class="mt-4">
            <!-- Add credits -->
            <form @submit.prevent="addCredit()">
                <FormField v-model="form.credits" type="number" label="Tilføj credits" name="credits" step="50"></FormField>
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

