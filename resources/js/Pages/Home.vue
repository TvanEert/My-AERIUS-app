<script setup>
import Map from '@/Components/Map.vue';
import Sidebar from '@/Components/Sidebar.vue';
import SituationModal from '@/Components/SituationModal.vue';

import '@/../css/stylesheet.css';
</script>

<template>
    <Sidebar :situations="situations"/>
    <Map/>
    <SituationModal/>
</template>

<script>
export default{
    props:{
        situations: Array,
    }
}
</script>