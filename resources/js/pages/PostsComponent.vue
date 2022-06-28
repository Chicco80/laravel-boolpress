<template>
<section>
    <h1>Posts</h1>
    <ul v-if="posts.lenght>0">
        <li v-for="(post,index) in posts" :key="post.id"></li>
        {{index}}-{{post.title}}
        <router-link :to="{ name: 'single-post', params: {slug: post.slug} }" class="nav-link">Visualizza Post</router-link>
    </ul>
</section>
    
</template>

<script>
export default {
    name:'PostsComponent',
    data(){
        return {
            posts:[]
    }
    
},
created(){
    axios.get('/api/posts').then((response) => {
        this.posts = response.data
    })
}
}
</script>
<style lang="scss">

</style>