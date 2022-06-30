<template>
  <div class="container">
    <h1>{{category.name}}</h1>
        <ul v-if="category && category.posts.length > 0">
            <li v-for="(post,index) in category.posts" :key="post.id">
                {{index}} - {{post.title}}
            <router-link :to="{ name: 'single-post', params: { slug: post.slug } }">Visualizza Post</router-link>
            </li>
        </ul>
        </div>
    
</template>

<script>
export default {
    name:'CategoryComponent',
    data(){
        return{
            category:null,
        }
    },
    mounted(){
        const slug = this.$route.params.slug;
        axios.get(`/api/categories/${slug}`)
        .then((response)=>{
                console.log(response);
                this.post.comments.push(response.data)
            })
            .catch((error)=>{
                console.log(error);
            })
    }
}
</script>

<style lang="scss">

</style>