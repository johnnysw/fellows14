<template>
  <div>
      <button @click="btn">
        change
      </button>
  </div>
</template>
<script>
export default {
  methods:{
    btn(){
      this.$emit('change','12345');
    }
  }
}
</script>
<style>

</style>
