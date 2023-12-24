
<template>
<spinner/>
  <Top/>
  <navbar/>
  <Content/>
  <End/>

</template>
<style>
 @import '@/assets/css/bootstrap.min.css';
 @import '@/assets/css/style.css';</style>

<script>
    import Top from '@/components/Top.vue';
    import navbar from '@/components/navbar.vue';
    import Content from '@/components/Content.vue';
    import End from '@/components/End.vue';
    import spinner from '@/components/spinner.vue';

    export default {
  name: 'user',
  components: {
    spinner,
    Top,
    navbar,
    Content,
    End
  }
}
</script>