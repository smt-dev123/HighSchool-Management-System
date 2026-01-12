<template>
    <el-button
        style="width: 25px; height: 25px"
        @click="dialogVisible = true"
        type="danger"
        size="small"
        :icon="Trash2"
        plain
    />

    <el-dialog
        v-model="dialogVisible"
        title="តើអ្នកចង់លុបគ្រូមែនទេ?"
        width="500"
        append-to-body
    >
        <p class="text-sm text-gray-600">
            សកម្មភាពនេះមិនអាចត្រឡប់ក្រោយវិញបានទេ។
        </p>

        <template #footer>
            <div class="dialog-footer">
                <el-button @click="dialogVisible = false"> ចាកចេញ </el-button>
                <el-button
                    type="danger"
                    :loading="form.processing"
                    @click="handleSubmit"
                >
                    លុប
                </el-button>
            </div>
        </template>
    </el-dialog>
</template>

<script lang="ts" setup>
import { useForm } from '@inertiajs/vue3';
import { ElMessage } from 'element-plus';
import { Trash2 } from 'lucide-vue-next';
import { ref } from 'vue';

const dialogVisible = ref(false);

const props = defineProps<{
    data: {
        id: number;
    };
}>();

const form = useForm({});

const handleSubmit = () => {
    form.delete(`/admin/teachers/${props.data.id}`, {
        preserveScroll: true,
        onSuccess: () => {
            dialogVisible.value = false;
            ElMessage.success('លុបគ្រូបង្រៀនជោគជ័យ');
        },
        onError: () => {
            ElMessage.error(
                'មានបញ្ហាក្នុងការលុបគ្រូបង្រៀន។ សូមពិនិត្យម្តងទៀត។',
            );
        },
    });
};
</script>
