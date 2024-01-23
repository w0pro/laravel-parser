<script setup>
import {Head} from "@inertiajs/vue3";
import {routs} from "../routs/index.js";
import NavLink from "../Components/NavLink.vue";

const props = defineProps({
    title: String,
});

</script>
<template>
    <Head :title="title" />
    <header class="header">
        <div class="container header_wrapper">
            <NavLink v-for="rout in routs" :href="route(rout.pathName)" :active="route().current(rout.pathName)" :key="rout.path">
                {{rout.title}}
            </NavLink>

        </div>

    </header>
    <main class="container">
        <slot />
    </main>
    <footer>

    </footer>

</template>
