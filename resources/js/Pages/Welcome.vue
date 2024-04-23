<script setup>
import { Head, Link } from '@inertiajs/vue3';
import twitterLayout from '@/Layouts/TwitterLayout.vue'




import { defineEmits } from 'vue';

function handleCustomEvent ()  {
    console.log('Received data from child:');
    // Handle the emitted event data here
}

</script>

<template>
    <Head title="Welcome" />
    <twitterLayout > </twitterLayout>
</template>
