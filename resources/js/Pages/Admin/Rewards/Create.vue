<script>
import AdminLayout from '../../../Layouts/AdminLayout.vue';
import Button from '../../../Components/Buttons/Button.vue';
import FormField from '../../../Components/Form/FormField.vue';
import InputError from '../../../Components/Form/InputError.vue';
import { Head } from '@inertiajs/vue3';
import { validateName, validateDescription, validatePrice, validateImage } from '../../../validator';

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
                price:0,
            }),
            errors: {}
        }
    },
    methods: {
        validateName() {
            this.errors.name = validateName(this.form);
        },
        validateDescription(){
            this.errors.description = validateDescription(this.form);
        },
        validatePrice(){
            this.errors.price = validatePrice(this.form);
        },
        validateImage(){
            this.errors.image = validateImage(this.form)
        },

        handleImageUpload(event){
            this.form.image = event.target.files[0];
            this.validateImage();
        },
        createReward() {
            this.validateName();
            this.validateDescription();
            this.validateImage();
            this.validatePrice();

            // Check if there are any errors before submitting
            if (
                !this.errors.name &&
                !this.errors.description &&
                !this.errors.image &&
                !this.errors.price
            ) {
                console.log('yes');
                this.form.post(route('admin.rewards.store'));
            }
        }
    }
}
</script>

<template>
    <Head title="Opret reward" />
    <h2 class="text-3xl">Opret ny reward</h2>
    <div class="mt-8">
        <form @submit.prevent="createReward()" enctype="multipart/form-data">
            <div class="mb-6">
                <FormField type="text" name="navn" label="navn" placeholder="Indtast navn på reward"  v-model="form.name" @input=validateName()></FormField>
                <InputError :error="form.errors.name || errors.name"></InputError>
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
                    @input=validateDescription()
                    ></textarea>
                    <InputError :error="form.errors.description || errors.description"></InputError>
            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase">Billede</label>
                <input type="file" accept="image/*" name="image" @input="handleImageUpload">
                <InputError :error="form.errors.image || errors.image"></InputError>
            </div>
            <div class="mb-6">
                <FormField type="number" name="price" label="pris" placeholder="Indtast pris på reward" v-model="form.price" min="1" @input=validatePrice></FormField>
                <InputError :error="form.errors.price || errors.price"></InputError>
            </div>
            <div class="flex items-center">
                <Button type="submit" class="flex">
                    <img src="/icons/save.svg" alt="Floppy disc icon" class="pr-2">
                    <p>Opret reward</p>
                </Button>
            </div>
        </form>
    </div>
    
        <div v-if="$page.props.success" class="text-gray-500 mb-2 mt-2 italic">
        {{ $page.props.success }}
        </div>
    
</template>