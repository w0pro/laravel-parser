<script setup>

import Accordion from "../Components/Accordion.vue";

const props = defineProps({
    logs: Array
})
</script>

<template>
    <section>
        <div class="content_wrapper">
            <div v-if="logs.length" class="accordion__list_wrapper">
                <Accordion v-for="log in logs" :key="log.id">
                    <template #title>
                        {{log.name}}
                    </template>
                    <template #description>
                        <p v-for="row in JSON.parse(log.content)" key="log.id">
                            {{row}}
                        </p>
                    </template>
                </Accordion>
            </div>
            <div v-else>
                <p>Вы еще не добавили логи</p>
            </div>
        </div>
    </section>
</template>

<style scoped>
.accordion__list_wrapper {
    max-height: 80dvh;
    overflow-y: scroll;
    display: flex;
    flex-direction: column;
    row-gap: 20px;
}

</style>
