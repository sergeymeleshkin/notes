<template>
    <PublicLayout>
        <GroupUsers/>
        <FeedbackForm />
    </PublicLayout>
</template>
<script>
import PublicLayout from '@/Layouts/PublicLayout.vue'
import FeedbackForm from "@/Components/FeedbackForm.vue";
import GroupUsers from "@/Components/GroupUsers.vue";
export default {
    components: {
        GroupUsers,
        FeedbackForm,
        PublicLayout,
    },
}
</script>
