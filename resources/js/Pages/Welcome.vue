<script setup>
import InputLabel from "../Components/InputLabel.vue";
import PrimaryButton from "../Components/PrimaryButton.vue";
import DangerButton from "../Components/DangerButton.vue";
import InputError from "../Components/InputError.vue";
import ActionMessage from "../Components/ActionMessage.vue";
import FormSection from "../Components/FormSection.vue";
import {useForm} from "@inertiajs/vue3";
import {ref} from "vue";

const form = useForm({
    files: null
})

const inputFile = ref(null)

const formReset = () => {
    form.reset()
    inputFile.value.value = null
}

const formSubmit = () => {
    form.post(route('add-attachment'), {
        preserveScroll: true,
        onSuccess: () =>  formReset()
    });
}


</script>
<template>
    <section class="head__section">
        <div class="content_wrapper">
            <FormSection @submitted="formSubmit">
                <template #title>
                    Загрузите тестовый файл или dump Mysql
                </template>
                <template #form_content>
                    <div class="input_wrapper">
                        <InputLabel value="Загрузите тестовый файл или dump Mysql"/>
                        <input ref="inputFile" type="file"
                               id="files"
                               name="files"
                               @input="form.files = $event.target.files" multiple>
                        <InputError :message="form.errors.files" />
                    </div>
                </template>
                <template #actions>
                   <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing || !form.files">
                        Загрузить
                   </PrimaryButton>
                    <DangerButton v-if="form.files" @click.prevent="formReset">
                        Очистить
                    </DangerButton>
                    <ActionMessage v-if="form.recentlySuccessful" :on="form.recentlySuccessful">
                        Загружен
                    </ActionMessage>
                </template>
            </FormSection>
        </div>

    </section>

</template>



<style scoped>

</style>
