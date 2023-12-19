<script>
import AdminLayout from '../../../Layouts/AdminLayout.vue';
import FormField from '../../../Components/Form/FormField.vue';
import Button from '../../../Components/Buttons/Button.vue';
import InputError from '../../../Components/Form/InputError.vue';
import { Head } from '@inertiajs/vue3';
import { validateName, validateDescription, validatePrice, validateImage } from '../../../validator';



export default {
    layout: AdminLayout,
    components: {
    FormField,
    Button,
    InputError,
    Head
},
    props: {
        reward: Object
    },
    data() {
        // Form outline for update reward, default data from database
        return {
            form: this.$inertia.form({
                id: this.reward.id,
                name: this.reward.name,
                description: this.reward.description,
                price: this.reward.price,
                // Image is set to null
                image: null,
            }),
            errors: {},
            // New image preview null as default
            newImagePreview: null,
        }
    },
    computed: {
        // Calculates a boolean value based on whether newImagePreview is not null, false as default
        imageSelected() {
            return this.newImagePreview !== null;
        }
    },
    methods: {
        onImageChange(event) {
            // Set the file as image in form
            this.form.image = event.target.files[0];
            // Change imageSelected to true
            this.imageSelected = true;
            this.validateImage();
            // Read the selected file and create a preview
            const reader = new FileReader();
            reader.onload = (e) => {
                this.newImagePreview = e.target.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        },
        validateName() {
            this.errors.name = validateName(this.form, { letters: true });
        },
        validateDescription(){
            this.errors.description = validateDescription(this.form);
        },
        validateImage(){
            this.errors.image = validateImage(this.form)
        },
        validatePrice(){
            this.errors.price = validatePrice(this.form);
        },
        updateReward(){
            this.validateName();
            this.validateDescription();
            if (this.form.image){
                this.validateImage();
            }
            this.validatePrice();

            // Check if there are any errors before submitting
            if (
                !this.errors.name &&
                !this.errors.description &&
                !this.errors.image &&
                !this.errors.price
            ) {
                // Transform data before sending, remove image if null
                this.form.transform(data => { 
                    if (data.image === null) {
                    delete data.image;
                    }
                return data;
                })
            .post(route('admin.rewards.reward.update', {_method: 'put', id: this.form.id})) // Multipart limitations - upload file using POST request, but handled as PUT
            }
        },
    }
}
</script>

<template>
    <Head title="Rediger reward" />
    <h2 class="text-3xl">Rediger reward</h2>
    <div class="mt-8">
        <form @submit.prevent="updateReward()" enctype="multipart/form-data">
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
                    cols="20" 
                    rows="10"
                    @input=validateDescription()
                    class="border p-2 rounded-xl text-gray bg-white-gray w-80 h-40 placeholder:text-light-gray"
                    ></textarea>
                    <InputError :error="form.errors.description || errors.description"></InputError>
            </div>
            <div class="mb-6">
        <label class="block mb-2 uppercase">Billede</label>
        <!-- If no new image selected, show "old" image -->
        <div v-if="!imageSelected" class="mb-2">
            <img :src="'/storage/' + reward.image" alt="Current image of reward" class="max-w-md h-80">
        </div>
        <!-- If new image is selected show preview -->
        <div v-if="imageSelected" class="mb-2">
            <img :src="newImagePreview" alt="New Image Preview of reward" class="max-w-md h-80">
        </div>
        <InputError :error="form.errors.image || errors.image"></InputError>
        <!-- When a new file is selected, call onImageChange() -->
        <input type="file" accept="image/*" name="image" @change="onImageChange">
    </div>
            <div class="mb-6">
                <FormField type="number" name="price" label="pris" placeholder="Indtast pris på reward"  v-model="form.price" min="1" @input=validatePrice()></FormField>
                <InputError :error="form.errors.price || errors.price"></InputError>
            </div>
            <div class="flex items-center">
                <Button type="submit">
                    <img src="/icons/save.svg" alt="Floppy disc icon" class="pr-2">
                    <p>Opdater reward</p>
                </Button>
            </div>
        </form>
    </div>
</template>