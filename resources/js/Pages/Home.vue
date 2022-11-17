<script setup>
import Map from '@/Components/Map.vue';
import Buttons from '@/Components/LocationButtons.vue';
</script>

<template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Map />
                    <Buttons />
                </div>
            </div>
        </div>
</template>