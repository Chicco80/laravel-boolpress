<template>
    <main>
        <h1>Sono il Main</h1>
        <ul>
            <li v-for="post in posts" :key="post.id">
                {{ post.title }}
                <a href="#" @click="getDetail(post.slug)">Vedi Dettaglio</a>
                <span>
                {{ post.detail.slug}}
                </span>
            </li>
        </ul>
    </main>
</template>
<script>
export default {
    name : 'MainComponent',
    data(){
        return {
            posts: [],
            detail:null
        }
    },

    methods : {
        getDetail(slug){
            axios.get('/api/posts'+ slug).then((response)=>{
            this.detail = response.data;
        })
        }
    },
    created(){
        axios.get('/api/posts').then((response)=>{
            this.detail = response.data;
        })
    }
        
    
}
</script>

<style lang='scss'>

</style>