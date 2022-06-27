<template>
    <div>
        <Header-component/>
        <Main-component/>
        <Footer-component/>


    </div>
</template>

<script>

import HeaderComponent from '../components/HeaderComponent.vue';
import MainComponent from '../components/MainComponent.vue';
import FooterComponent from '../components/FooterComponent.vue';


export default {
 
     name: "App",
    components:{
        HeaderComponent,
        MainComponent,
        FooterComponent,
    }
      
}
</script>
