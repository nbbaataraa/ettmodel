<template></template>
<script>
export default {
  created() {
    EventBus.$emit("logout");
  }
};
</script>
<style >
a {
  text-decoration: none;
}
</style>