<script>
export default{
    methods: {
        toggleMenu(){
            document.getElementById('nav-icon').classList.toggle('open')
            document.getElementById('sidebar').classList.toggle('translate-x-[-100%]')
        }
    }
}
</script>

<template>
    <div class="flex w-full bg-aerius-darkblue">
        <div @click="toggleMenu()" id="nav-icon">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="flex absolute pt-16 pl-8 top-0 h-full w-[80%] bg-aerius-lightblue ease-in duration-300 translate-x-[-100%]" id="sidebar">
        <ul>
            <li class="font-bold text-white text-2xl mb-5">
                <a :href="route('test2')">
                    Recente berekeningen
                </a>
            </li>
            <li class="font-bold text-white text-2xl mb-5">
                <a :href="route('test2')">
                    Instellingen
                </a>
            </li>
        </ul>
    </div>
</template>
