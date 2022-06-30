<template>
<section class="container">
   <div class="row">
    <div class="col-3">
        <nav>
            <ul>
                <li v-for="(category, index) in categories" :key="index">
                <router-link :to="{ name:'category', params: { slug: category.slug } }">{{category.name}}</router-link>
                </li>
            </ul>
        </nav>
    </div>
    <div class="col-9"></div>
   </div>
</section>
    
</template>

<script>
export default {
    name:'HomeComponent',
    data(){
        return{
            categories:[],
        }
    },
    mounted(){
        axios.get('/api/categories').then((response) => {
            this.categories = response.data;
        }).catch((error) => {
            console.log(error);
    })
    }
}
</script>
<style lang="scss">

</style>