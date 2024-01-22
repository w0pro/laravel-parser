<script setup>
defineProps({
    value: String,
});
</script>

<template>
    <label class="label">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>

<style>
.label {
    color: rgb(55, 65, 81);
    display: block;
    font-size: 14px;
}
</style>
