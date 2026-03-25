<template>
  <div class="card">
    <h2>Lista de Produtos</h2>

    <div v-if="products.length === 0">
      Nenhum produto cadastrado.
    </div>

    <ul>
      <li v-for="p in products" :key="p.id" class="product">

        <!-- MODO EDIÇÃO -->
        <div v-if="editId === p.id" class="edit-form">
          <input v-model="editName" />
          <input v-model="editPrice" />
          <button @click="saveEdit(p.id)">Salvar</button>
          <button class="cancel" @click="cancelEdit">Cancelar</button>
        </div>

        <!-- MODO NORMAL -->
        <template v-else>
          <div>
            <strong>{{ p.name }}</strong>
          </div>

          <div class="actions">
            <span class="price">R$ {{ p.price }}</span>

            <button class="edit" @click="startEdit(p)">
              ✏️
            </button>

            <button class="delete" @click="$emit('delete', p.id)">
              🗑️
            </button>
          </div>
        </template>

      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    products: Array
  },
  data() {
    return {
      editId: null,
      editName: '',
      editPrice: ''
    }
  },
  methods: {
    startEdit(product) {
      this.editId = product.id
      this.editName = product.name
      this.editPrice = product.price
    },
    cancelEdit() {
      this.editId = null
    },
    saveEdit(id) {
      this.$emit('update', {
        id,
        name: this.editName,
        price: this.editPrice
      })

      this.editId = null
    }
  }
}
</script>