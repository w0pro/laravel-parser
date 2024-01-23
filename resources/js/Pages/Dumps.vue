<script setup>
import Accordion from "../Components/Accordion.vue";

const props = defineProps({
    dumps: Array
})
</script>

<template>
    <section>
        <div class="content_wrapper">
            <div v-if="dumps.length" class="accordion__list_wrapper">
                <Accordion v-for="(dump, key) in dumps" :key="key">
                    <template #title>
                        {{dump.table_name}}
                    </template>
                    <template #description>
                        <table class="table">
                            <thead>
                                <th v-for="attr in dump.attr" :key="key + attr">
                                    {{attr}}
                                </th>
                            </thead>
                            <tbody>
                                <tr v-for="valueArr in dump.data" :key="key + valueArr.id">
                                    <td v-for="value in valueArr" :key="key + value">
                                        {{value}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </template>
                </Accordion>
            </div>
            <div v-else>
                <p>Вы еще не добавили дамп</p>
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
