<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'active'
        : '';
});
</script>

<template>
    <Link :href="href" :class="classes" class="nav_link">
        <slot />
    </Link>
</template>

<style scoped>
    .nav_link{
        font-size: 20px;
        color: white;
    }

    .nav_link.active {
        color: black;
    }

    .nav_link:hover:not(.active ){
        color: #31ea40;
    }

</style>
