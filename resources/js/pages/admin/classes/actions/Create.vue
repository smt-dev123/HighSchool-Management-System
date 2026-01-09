<template>
    <el-button @click="dialogVisible = true" type="primary">
        បន្ថែមមុខវិជ្ជា
    </el-button>

    <el-dialog
        v-model="dialogVisible"
        title="បន្ថែមមុខវិជ្ជា"
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
import { ref } from 'vue';

const dialogVisible = ref(false);

interface Form {
    name_kh: string;
    name_en: string;
    note: string;
}

const form = useForm<Form>({
    name_kh: '',
    name_en: '',
    note: '',
});

const handleSubmit = () => {
    form.post('/admin/subjects', {
        onSuccess: () => {
            dialogVisible.value = false;
            form.reset();
            ElMessage.success('បង្កើតមុខវិជ្ជាជោគជ័យ');
        },
        onError: () => {
            ElMessage.error(
                'មានបញ្ហាក្នុងការបង្កើតមុខវិជ្ជា។ សូមពិនិត្យម្តងទៀត។',
            );
        },
    });
};
</script>
