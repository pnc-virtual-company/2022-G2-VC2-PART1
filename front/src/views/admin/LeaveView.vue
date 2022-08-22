<template>
    <div class="main-admin">
     
        <studentLeave-view></studentLeave-view>
    </div>
</template>
<script>
import StudentLeave from '@/components/leave/StudentLeave.vue'
export default {
      components:{
        'studentLeave-view' : StudentLeave
   }
}
</script>
<style scoped>

</style>