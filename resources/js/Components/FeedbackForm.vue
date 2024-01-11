<template>
    <div class="container mx-auto py-8">
        <h2>2. Форма обратной связи</h2>
        <form @submit.prevent="sendForm" class="form-control">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-2/3 px-3">
                    <label for="grid-last-name">
                        Почта
                    </label>
                    <input v-model="form.email" type="email" placeholder="mail@domain.loc" required>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label for="grid-password">
                        Сообщение
                    </label>
                    <textarea v-model="form.message" placeholder="Введите сообщение" required></textarea>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <button type="submit" class="button-success">
                        Отправить
                    </button>
                </div>
            </div>
            <div v-if="result.message">
                {{ result.message }}
            </div>
        </form>
    </div>
</template>

<script>
import { ref } from 'vue'
import { Api } from '@/use/api'
export default {
    setup() {
        const result = ref({
            message: ""
        })
        const form = ref({
            email: "",
            message: ""
        })

        function sendForm(){
            Api.post('forms/feedback', form.value ).then(
                res => result.value.message = res.message
            )
        }

        return {
            form,
            result,
            sendForm
        }
    },
}
</script>
