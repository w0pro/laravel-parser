<script setup>

const props = defineProps({
    logs: Object
})

</script>

<template>
    <section>
        <div class="content_wrapper">
            <div v-if="logs" class="logs__content">
                <div v-for="log in logs" :key="log.id">
                    <p v-for="row in JSON.parse(log.content)" key="log.id">
                        {{row}}
                    </p>
                </div>
            </div>
            <div v-else>
                <p>Вы еще не добавили логи</p>
            </div>
        </div>
    </section>
</template>

<style scoped>
.logs__content {
    max-height: 80dvh;
    overflow-y: scroll;
}

</style>
