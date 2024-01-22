<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button  :type="type" class="button_2">
        <slot />
    </button>
</template>

<style scoped>
    .button_2 {
        color: white;
        background: #FF0000F2;
    }

    .button_2:hover {
        background: #EA486EFF;
    }

</style>
