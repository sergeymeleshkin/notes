<template>
    <div class="container mx-auto py-8">
        <h2>1. Users has/with groups</h2>
        <div class="form-control">
            <input v-model="group" type="number" placeholder="group id">
        </div>
        <table v-if="groupUsers.length" class="table-auto">
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>group</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in groupUsers" :key="user.id">
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>
                    <ul>
                        <li v-for="group in user.groups" :key="group.id">{{ group.name}}</li>
                    </ul>
                </td>
            </tr>
            </tbody>
        </table>
        <div v-else>
            <p>Ничего не найдено.</p>
        </div>
    </div>
</template>

<script>
import {ref, onMounted, watch} from 'vue'
import { Api } from '@/use/api'
export default {
    setup() {
        const groupUsers = ref([])
        const group = ref(1)
        function show(group){
            Api.get('groups/users/'+group).then(
                res => groupUsers.value = res
            )
        }

        onMounted(() => {
            Api.get('groups/users').then(
                res => groupUsers.value = res
            )
        })

        watch(group, (newGroup) => {
            show(newGroup)
        });

        return {
            groupUsers,
            group
        }
    },
}
</script>
