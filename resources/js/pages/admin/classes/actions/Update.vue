<template>
    <el-button
        style="width: 25px; height: 25px"
        @click="dialogVisible = true"
        type="success"
        size="small"
        :icon="Edit"
        plain
    />

    <el-dialog
        v-model="dialogVisible"
        title="កែប្រែមុខវិជ្ជា"
        width="800"
        align-center
        append-to-body
    >
        <el-form :model="form" label-width="140px">
            <el-row :gutter="20">
                <!-- Field -->
                <el-col :span="24">
                    <el-form-item label="មុខវិជ្ជាជាភាសាខ្មែរ">
                        <el-input
                            v-model="form.name_kh"
                            :error="form.errors.name_kh"
                        />
                    </el-form-item>
                </el-col>
                <el-col :span="24">
                    <el-form-item label="មុខវិជ្ជាជាភាសាអង់គ្លេស">
                        <el-input
                            v-model="form.name_en"
                            :error="form.errors.name_en"
                        />
                    </el-form-item>
                </el-col>
                <el-col :span="24">
                    <el-form-item label="កំណត់ចំណាំ">
                        <el-input
                            v-model="form.note"
                            type="textarea"
                            :error="form.errors.note"
                        />
                    </el-form-item>
                </el-col>
            </el-row>
        </el-form>

        <template #footer>
            <div class="dialog-footer">
                <el-button @click="dialogVisible = false">ចាកចេញ</el-button>
                <el-button
                    type="primary"
                    @click="handleSubmit"
                    :loading="form.processing"
                >
                    រក្សាទុក
                </el-button>
            </div>
        </template>
    </el-dialog>
</template>

<script lang="ts" setup>
import { useForm } from '@inertiajs/vue3';
import { ElMessage } from 'element-plus';
import { Edit } from 'lucide-vue-next';
import { ref, watch } from 'vue';

const dialogVisible = ref(false);

interface Form {
    name_kh: string;
    name_en: string;
    note: string;
}

const props = defineProps<{
    data: {
        id: number;
        name_kh: string;
        name_en: string;
        note: string;
    };
}>();

watch(
    () => dialogVisible.value,
    (newVal) => {
        if (newVal) {
            form.name_kh = props.data.name_kh;
            form.name_en = props.data.name_en;
            form.note = props.data.note;
        }
    },
);

const form = useForm<Form>({
    name_kh: '',
    name_en: '',
    note: '',
});

const handleSubmit = () => {
    form.put(`/admin/subjects/${props.data.id}`, {
        onSuccess: () => {
            dialogVisible.value = false;
            form.reset();
            ElMessage.success('កែប្រែមុខវិជ្ជាជោគជ័យ');
        },
        onError: () => {
            ElMessage.error(
                'មានបញ្ហាក្នុងការកែប្រែមុខវិជ្ជា។ សូមពិនិត្យម្តងទៀត។',
            );
        },
    });
};
</script>
