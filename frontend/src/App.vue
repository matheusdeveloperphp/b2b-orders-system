<template>
  <div style="padding: 20px">
    <h1>📦 Produtos</h1>

    <div>
      <input v-model="name" placeholder="Nome do produto"/>
      <input v-model="price" placeholder="Preço"/>
      <button @click="createProduct">Criar</button>
    </div>

    <hr/>

    <ul>
      <li v-for="p in products" :key="p.id">
        {{ p.name }} - R$ {{ p.price }}
      </li>
    </ul>
  </div>
</template>

<script>
import api from './services/api'

export default {
  data() {
    return {
      products: [],
      name: '',
      price: ''
    }
  },
  mounted() {
    this.loadProducts()
  },
  methods: {
    async loadProducts() {
      const res = await api.get('/products')
      this.products = res.data
    },
    async createProduct() {
      await api.post('/products', {
        name: this.name,
        price: this.price
      })
      this.name = ''
      this.price = ''
      this.loadProducts()
    }
  }
}
</script>