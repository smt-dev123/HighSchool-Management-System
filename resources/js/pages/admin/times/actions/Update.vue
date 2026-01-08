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
        title="កែប្រែឆ្នាំសិក្សា"
        width="800"
        align-center
        append-to-body
    >
        <el-form :model="form" label-width="140px">
            <el-row :gutter="20">
                <!-- Field -->
                <el-col :span="24">
                    <el-form-item label="ឆ្នាំសិក្សា">
                        <el-input
                            v-model="form.name"
                            :error="form.errors.name"
                        />
                    </el-form-item>
                </el-col>
                <el-col :span="24">
                    <el-form-item label="ថ្ងៃចាប់ផ្តើម">
                        <el-date-picker
                            style="width: 100%"
                            v-model="form.start_date"
                            type="date"
                            placeholder="ថ្ងៃចាប់ផ្តើម"
                            format="YYYY-MM-DD"
                            value-format="YYYY-MM-DD"
                        />
                    </el-form-item>
                </el-col>
                <el-col :span="24">
                    <el-form-item label="ថ្ងៃខែឆ្នាំបញ្ចប់">
                        <el-date-picker
                            style="width: 100%"
                            v-model="form.end_date"
                            type="date"
                            placeholder="ថ្ងៃខែឆ្នាំបញ្ចប់"
                            format="YYYY-MM-DD"
                            value-format="YYYY-MM-DD"
                            :disabled-date="
                                (date: Date) => date < new Date(form.start_date)
                            "
                        />
                    </el-form-item>
                </el-col>
                <el-col :span="24">
                    <el-form-item label="កំណត់ចំណាំ">
                        <el-input
                            v-model="form.note"
                            type="textarea"
                            :error="form.errors.name"
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
    name: string;
    start_date: string;
    end_date: string;
    note: string;
}

const props = defineProps<{
    data: {
        id: number;
        name: string;
        start_date: string;
        end_date: string;
        note: string;
    };
}>();

watch(
    () => dialogVisible.value,
    (newVal) => {
        if (newVal) {
            form.name = props.data.name;
            form.start_date = props.data.start_date;
            form.end_date = props.data.end_date;
            form.note = props.data.note;
        }
    },
);

const form = useForm<Form>({
    name: '',
    start_date: '',
    end_date: '',
    note: '',
});

const handleSubmit = () => {
    form.put(`/admin/academic-years/${props.data.id}`, {
        onSuccess: () => {
            dialogVisible.value = false;
            form.reset();
            ElMessage.success('កែប្រែឆ្នាំសិក្សាជោគជ័យ');
        },
        onError: () => {
            ElMessage.error(
                'មានបញ្ហាក្នុងការកែប្រែឆ្នាំសិក្សា។ សូមពិនិត្យម្តងទៀត។',
            );
        },
    });
};
</script>
