<script setup>
import { computed, useSlots } from 'vue';

defineEmits(['submitted']);

const hasActions = computed(() => !! useSlots().actions);
</script>

<template>
    <div class="form__container">
        <slot name="title" />
        <form @submit.prevent="$emit('submitted')">
            <slot name="form_content" />
            <div v-if="hasActions" class="form__buttons_wrapper">
                <slot name="actions" />
            </div>
        </form>
    </div>
</template>

<style>
.form__container {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form__section form {
    display: flex;
    flex-direction: column;
    row-gap: 15px;
}

.form__section__form_wrapper {
    border-radius: 7px;
    box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.1) 0px 2px 4px -2px;
    padding: 24px;
    background: white;
    flex: 1;
}


.form__buttons_wrapper {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    column-gap: 40px;
}


</style>
