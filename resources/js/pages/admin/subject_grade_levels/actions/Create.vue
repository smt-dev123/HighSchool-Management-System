<template>
    <el-button @click="dialogVisible = true" type="primary">
        បន្ថែមមុខវិជ្ជាតាមកម្រិត
    </el-button>

    <el-dialog
        v-model="dialogVisible"
        title="បន្ថែមមុខវិជ្ជាតាមកម្រិត"
        width="800"
        align-center
        append-to-body
        @closed="form.reset()"
    >
        <el-form :model="form" label-width="140px" label-position="left">
            <el-row :gutter="20">
                <el-col :span="12">
                    <el-form-item
                        label="មុខវិជ្ជា"
                        :error="form.errors.subject_id"
                    >
                        <el-select
                            v-model="form.subject_id"
                            placeholder="ជ្រើសរើស"
                            style="width: 100%"
                        >
                            <el-option
                                v-for="data in subjects"
                                :key="data.id"
                                :label="data.name_kh"
                                :value="data.id"
                            />
                        </el-select>
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item
                        label="កម្រិតថ្នាក់"
                        :error="form.errors.grade_level_id"
                    >
                        <el-select
                            v-model="form.grade_level_id"
                            placeholder="ជ្រើសរើស"
                            style="width: 100%"
                        >
                            <el-option
                                v-for="data in grade_levels"
                                :key="data.id"
                                :label="data.name"
                                :value="data.id"
                            />
                        </el-select>
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item
                        label="ប្រភេទថ្នាក់"
                        :error="form.errors.class_type_id"
                    >
                        <el-select
                            v-model="form.class_type_id"
                            placeholder="ជ្រើសរើស"
                            style="width: 100%"
                            :disabled="disableClassType"
                        >
                            <el-option
                                v-for="data in class_types"
                                :key="data.id"
                                :label="data.name"
                                :value="data.id"
                            />
                        </el-select>
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item
                        label="ពិន្ទុពេញ"
                        :error="form.errors.full_score"
                    >
                        <el-input
                            v-model="form.full_score"
                            type="number"
                            :rows="2"
                        />
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item label="មេគុណ" :error="form.errors.divide">
                        <el-input
                            v-model="form.divide"
                            type="number"
                            :rows="2"
                        />
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item label="មធ្យមភាគ" :error="form.errors.average">
                        <el-input
                            v-model="form.average"
                            type="number"
                            :rows="2"
                        />
                    </el-form-item>
                </el-col>

                <el-col :span="24">
                    <el-form-item label="ផ្សេងៗ" :error="form.errors.note">
                        <el-input
                            v-model="form.note"
                            type="textarea"
                            :rows="2"
                        />
                    </el-form-item>
                </el-col>
            </el-row>
        </el-form>

        <template #footer>
            <div class="dialog-footer">
                <el-button @click="dialogVisible = false">បោះបង់</el-button>
                <el-button
                    type="primary"
                    @click="handleSubmit"
                    :loading="form.processing"
                >
                    រក្សាទុកទិន្នន័យ
                </el-button>
            </div>
        </template>
    </el-dialog>
</template>

<script lang="ts" setup>
import { useForm } from '@inertiajs/vue3';
import { ElMessage } from 'element-plus';
import { computed, ref } from 'vue';

const props = defineProps<{
    subjects: any[];
    grade_levels: any[];
    class_types: any[];
}>();

const dialogVisible = ref(false);

const form = useForm({
    subject_id: null as number | null,
    grade_level_id: null as number | null,
    class_type_id: 1,
    full_score: null as number | null,
    divide: null as number | null,
    average: null as number | null,
    note: '',
});

const disableClassType = computed(() => {
    const grade = props.grade_levels.find((g) => g.id === form.grade_level_id);

    return grade?.name !== 'ថ្នាក់ទី១១' && grade?.name !== 'ថ្នាក់ទី១២';
});

const handleSubmit = () => {
    form.post('/admin/subject_grade_levels', {
        preserveScroll: true,
        onSuccess: () => {
            dialogVisible.value = false;
            form.reset();
            ElMessage({
                message: 'ការបញ្ចូលទិន្នន័យគ្រូត្រូវបានជោគជ័យ!',
                type: 'success',
            });
        },
        onError: (errors) => {
            console.log(errors);
            ElMessage.error('មានបញ្ហា! សូមពិនិត្យមើលសារកំហុសក្រហមៗខាងលើ។');
        },
    });
};
</script>
