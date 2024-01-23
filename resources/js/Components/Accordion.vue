<script setup>
import IconArrow from "./icons/IconArrow.vue";
import {ref, toRef, watch} from "vue";

const props = defineProps({
    accKey: String,
    installKey: String,
    arrow: {
        type:String,
        default: 'white'
    }
})

const description = ref(null)
const descriptionWrapperHeight = toRef(0)

const stateAccordion = toRef(false)

const emit = defineEmits(['updateAcc'])

watch(()=>props.installKey, (val, oldValue) => {
    if (val !== props.accKey) {
        stateAccordion.value = false
    }
})

const clickAcc = (ev) => {

    stateAccordion.value = !stateAccordion.value


}

</script>

<template>
    <div class="accordion_wrapper"  :class="{active: descriptionWrapperHeight}">
        <div  class="accordion__title_wrapper" @click="clickAcc($event)">
            <p class="accordion__item__title" >
                <slot name="title" />
            </p>
            <IconArrow :stroke="arrow"/>
        </div>
        <div class="accordion__item__desc_wrapper"  :class="{active: stateAccordion}">
            <p ref="description" class="accordion__item__desc">
                <slot name="description" />
            </p>
        </div>
    </div>



</template>

<style scoped>

.accordion_wrapper {
    cursor: pointer;
    border-radius: 8px;
    border: 1px solid black;
}

.accordion__title_wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    column-gap: 10px;
    position: relative;
    padding: 20px;
}

.accordion__item__title {
    font-weight: 700;
}

.accordion__item__desc_wrapper {
    transition: all 0.3s;
    overflow: hidden;
    padding: 0 20px;
    height: 0;
}

.accordion__item__desc_wrapper.active{
    padding: 0 20px 20px;
    height: auto;
}

.accordion__title_wrapper p{
    flex: 1;
}

.accordion__item__desc {
    font-size: 14px;
}

.faq__list__item_wrapper.active svg{
    transform: rotate(180deg);

}

</style>
