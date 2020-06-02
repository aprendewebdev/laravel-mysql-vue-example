<template>
  <div>
    <h1>Todos</h1>
    <ul>
      <li v-for="todo in todos" :key="todo.id">
        {{ todo.description }}
      </li>
    </ul>
  </div>
</template>

<script>
  export default {
    data: function() {
      return {
        todos: [
          { id: 1, description: "Hacer la compra" },
          { id: 2, description: "Hacer tortitas" },
          { id: 3, description: "Programar" }
        ],
      }
    }
  }
</script>