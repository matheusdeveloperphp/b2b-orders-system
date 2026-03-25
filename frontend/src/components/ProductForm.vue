<template>
  <div class="card">
    <h2>Cadastrar Produto</h2>

    <div class="form">
      <input v-model="name" placeholder="Nome do produto"/>
      <input v-model="price" placeholder="Preço"/>
      <button @click="submit">Salvar</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      price: ''
    }
  },
  methods: {
    submit() {
      if (!this.name || !this.price) return

      this.$emit('create', {
        name: this.name,
        price: this.price
      })

      this.name = ''
      this.price = ''
    }
  }
}
</script>