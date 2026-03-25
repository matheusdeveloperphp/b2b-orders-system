<template>
  <div class="container">
    <h1>📦 Gestão de Produtos</h1>

    <ProductForm @create="createProduct"/>

    <ProductList
        :products="products"
        @update="updateProduct"
        @delete="deleteProduct"
    />
  </div>
</template>

<script>
import api from './services/api'
import ProductForm from './components/ProductForm.vue'
import ProductList from './components/ProductList.vue'

export default {
  components: {
    ProductForm,
    ProductList
  },
  data() {
    return {
      products: []
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

    async createProduct(product) {
      await api.post('/products', product)
      this.loadProducts()
    },

    async updateProduct(product) {
      await api.put(`/products/${product.id}`, {
        name: product.name,
        price: product.price
      })
      this.loadProducts()
    },

    async deleteProduct(id) {
      await api.delete(`/products/${id}`)
      this.loadProducts()
    }
  }
}
</script>