<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="button_1">
        <slot />
    </button>
</template>

<style>
    .button_1 {
        color: white;
        background: rgb(31 41 55);
    }

    .button_1:hover {
        background: rgb(55 65 81 );
    }
</style>
