<script>
// import ConfettiExplosion from "vue-confetti-explosion";

export default{
    components: {
        // ConfettiExplosion
    },
    data(){
        return{
            isOpen: true,
        }
    },
    methods: {
        closeModal(){
            this.isOpen = false;
            this.$emit('close');
        }
    }
}
</script>

<template>
    
</template>