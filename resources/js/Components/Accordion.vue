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

// watch(stateAccordion, (newVal) => {
//     if (newVal) {
//         descriptionWrapperHeight.value = description.value.clientHeight + 30
//         // emit('updateAcc', props.accKey)
//     }else {
//         descriptionWrapperHeight.value = 0
//     }
//
// })

const clickAcc = (ev) => {
    // let oldAcc = ev.currentTarget.parentElement.querySelector('.accordion__list__item.active')?.clientHeight
    // let wrapHeight = oldAcc?oldAcc * -1: 0
    stateAccordion.value = !stateAccordion.value

    // ev.currentTarget.childNodes.forEach(e => wrapHeight += e.scrollHeight)
    // ev.currentTarget.scrollTop = ev.pageY - wrapHeight

}

</script>

<template>
    <div class="faq__list__item_wrapper"  :class="{active: descriptionWrapperHeight}">
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

.accordion__title_wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    column-gap: 10px;
    position: relative;
    padding: 30px 40px;
}

.accordion__item__title {
    font-weight: 700;
}


.accordion__item__desc_wrapper {
    transition: all 0.3s;
    overflow: hidden;
    padding: 0 40px;
    height: 0;
}

.accordion__item__desc_wrapper.active{
    margin-top: 24px;
    padding: 0 40px 30px;
    height: auto;



}

.accordion__title_wrapper p{
    flex: 1;
}

.faq__list__item_wrapper.active svg{
    transform: rotate(180deg);

}

</style>
