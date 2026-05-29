<template>
    <div class="container mt-5">

        <button 
            class="btn btn-primary mb-3"
            @click="createCrud"
        >
            Add Data
        </button>

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Color</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                <tr v-for="crud in cruds" :key="crud.id">

                    <td>{{ crud.id }}</td>

                    <td>{{ crud.name }}</td>

                    <td>
                        <span
                            :class="crud.color == 'red'
                            ? 'text-danger'
                            : 'text-success'"
                        >
                            {{ crud.color }}
                        </span>
                    </td>

                    <td>

                        <button
                            class="btn btn-warning btn-sm me-2"
                            @click="updateCrud(crud)"
                        >
                            Change Color
                        </button>

                        <button
                            class="btn btn-danger btn-sm"
                            @click="deleteCrud(crud.id)"
                        >
                            Delete
                        </button>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>
</template>

<script>
import axios from 'axios'

export default {

    data() {
        return {
            cruds: []
        }
    },

    mounted() {
        this.getCruds()
    },

    methods: {

        async getCruds() {

            const response = await axios.get('/api/cruds')

            this.cruds = response.data
        },

        async createCrud() {

            await axios.post('/api/cruds')

            this.getCruds()
        },

        async updateCrud(crud) {

            const color = crud.color == 'red'
                ? 'green'
                : 'red'

            await axios.put(`/api/cruds/${crud.id}`, {
                color
            })

            this.getCruds()
        },

        async deleteCrud(id) {

            await axios.delete(`/api/cruds/${id}`)

            this.getCruds()
        }
    }
}
</script>