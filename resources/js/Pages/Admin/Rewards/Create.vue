<script>
import AdminLayout from '../../../Layouts/AdminLayout.vue';
import Button from '../../../Components/Buttons/Button.vue';
import FormField from '../../../Components/Form/FormField.vue';
import InputError from '../../../Components/Form/InputError.vue';
import { Head } from '@inertiajs/vue3';

export default {
    layout: AdminLayout,
    components: {
        Button,
        FormField,
        InputError,
        Head
    },
    data() {
        // Form outline for create reward, empty by default
        return {
            form: this.$inertia.form({
                name: '',
                description: '',
                image: '',
                price:'',
            })
        }
    },
    methods: {
        createReward() {
            this.form.post(route('admin.rewards.store'));
        },
    }
}
</script>

<template>
    <Head title="Opret reward" />
    <h2 class="text-3xl">Opret ny reward</h2>
    <div class="mt-8">
        <form @submit.prevent="createReward()" enctype="multipart/form-data">
            <div class="mb-6">
                <FormField type="text" name="navn" label="navn" placeholder="Indtast navn på reward"  v-model="form.name"></FormField>
                <InputError :error="form.errors.name"></InputError>
            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase">Beskrivelse</label>
                <textarea 
                    v-model="form.description"
                    name="description" 
                    id="description" 
                    cols="30" 
                    rows="10"
                    class="border p-2 rounded-xl placeholder:text-light-gray text-gray bg-white-gray w-80"
                    placeholder="Indtast beskrivelse af reward"
                    ></textarea>
                    <InputError :error="form.errors.description"></InputError>
            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase">Billede</label>
                <input type="file" name="image" @input="form.image = $event.target.files[0]">
                <InputError :error="form.errors.image"></InputError>
            </div>
            <div class="mb-6">
                <FormField type="number" name="price" label="pris" placeholder="Indtast pris på reward"  v-model="form.price" min="1"></FormField>
                <InputError :error="form.errors.price"></InputError>
            </div>
            <div class="flex items-center">
                <Button type="submit" class="flex">
                    <img src="/icons/save.svg" alt="" class="pr-2">
                    <p>Opret reward</p>
                </Button>
            </div>
        </form>
    </div>
    
        <div v-if="$page.props.success" class="text-gray-500 mb-2 mt-2 italic">
        {{ $page.props.success }}
        </div>
    
</template>