<script setup>
import { ref } from 'vue';
import { defineEmits } from 'vue';

import { router } from '@inertiajs/vue3';
import Twitter from 'vue-material-design-icons/Twitter.vue';
import Magnify from 'vue-material-design-icons/Magnify.vue';
import DotsHorizontal from 'vue-material-design-icons/DotsHorizontal.vue';
import Feather from 'vue-material-design-icons/Feather.vue';
import Close from 'vue-material-design-icons/Close.vue';
import ChevronDown from 'vue-material-design-icons/ChevronDown.vue';
import Earth from 'vue-material-design-icons/Earth.vue';
import ImageOutline from 'vue-material-design-icons/ImageOutline.vue';
import FileGifBox from 'vue-material-design-icons/FileGifBox.vue';
import Emoticon from 'vue-material-design-icons/Emoticon.vue';
import ArrowLeft from 'vue-material-design-icons/ArrowLeft.vue';
import MenuItem from '@/Components/MenuItem.vue'



</script>

<template>
    <slot/>
<div class=" fixed w-full">
    <div class="max-w-[1400px] flex mx-auto">
        <div class="lg:w-3/12 w-[60px] h-[100vh] max-w-[350px] lg:px-4 lg:mx-auto">
            <div class="p-2 px-3 mb-4">
                <Twitter fillColor="#FFFFFF" :size="37" />
            </div>
            <MenuItem iconString="Home" />
        </div>
    </div>
</div>
</template>

<style>
body{
    background-color: #1b1e21;
}
</style>
