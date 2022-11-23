<script setup>
import Map from '@/Components/Map.vue';
import Sidebar from '@/Components/Sidebar.vue';
import SituationModal from '@/Components/SituationModal.vue';

import '@/../css/stylesheet.css';
</script>

<template>
    <div class="">
        <Sidebar :situations="situations"/>
        <Map/>
        <SituationModal/>
    </div>
</template>

<script>
export default{
    props:{
        situations: Array,
    }
}
</script>