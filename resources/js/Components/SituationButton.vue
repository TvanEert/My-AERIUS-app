<script setup></script>

<template>
    <!-- 2 Buttons -->
    <div class="flex place-content-center">
        <div class="flex flex-wrap flex-col w-4/12 place-content-center">
            <a type="submit" :href="route('test2')" class="w-full text-xl hover-bg-aerius-darkblue text-white font-bold p-5 m-2 text-center rounded-full">Bereken huidige locatie</a>
            <a type="submit" :href="route('test2')" class="w-full text-xl bg-blue-500 hover:bg-blue-700 text-white font-bold p-5 m-2 text-center rounded-full">Bereken aangepaste locatie</a>
        </div>
    </div>
</template>
