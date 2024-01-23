<script setup>
defineProps({
    stroke: {
        type: String,
        default: 'white'
    }
})

</script>

<template>
    <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon__arrow">
        <path d="M1 1L11 10.41L21 1" :stroke="stroke" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
</template>

<style scoped>
    svg {
        transition: all 0.3s;
    }
</style>

