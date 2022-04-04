<template>
    <input v-model="newTodo" @keyup.enter="addTodo">
    <!--
        <button @click="addTodo">Add Todo</button>

        <ul>
            <li v-for="todo in todos" :key="todo.id">
                {{ todo.text }}
                <button @click="removeTodo(todo)">X</button>
            </li>
        </ul>
    -->
</template>

<script>
    //* give each todo a unique id
    let id = 0

    export default {
        data() {
            return {
                newTodo: '',
                todos: [
                    { id: id++, text: 'Learn HTML' },
                    { id: id++, text: 'Learn JavaScript' },
                    { id: id++, text: 'Learn Vue' }
                ]
            }
        },
        methods: {
            addTodo() {
                this.todos.push({
                    id: id++, 
                    text: this.newTodo
                })
                this.newTodo = ''
            },
            removeTodo(todo) {
                this.todos = this.todos.filter((t) => t !== todo)
            }
        }
    }
</script>