<template>
  <a class="fa fa-edit" :href="edit(data.id_cliente)">Edit</a>
</template>

<script>
  export default {
      props: ['data', 'index'],
  }
</script>