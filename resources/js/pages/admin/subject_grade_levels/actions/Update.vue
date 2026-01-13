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
        title="កែប្រែមុខវិជ្ជាតាមកម្រិត"
        width="800"
        align-center
        append-to-body
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
import { computed, ref, watch } from 'vue';

const dialogVisible = ref(false);

const props = defineProps<{
    subjects: any[];
    grade_levels: any[];
    class_types: any[];
    data: {
        id: number;
        subject_id: number;
        grade_level_id: number;
        class_type_id: number;
        full_score: number;
        divide: number;
        average: number;
        note: string;
    };
}>();

const form = useForm({
    subject_id: null as number | null,
    grade_level_id: null as number | null,
    class_type_id: 1,
    full_score: null as number | null,
    divide: null as number | null,
    average: null as number | null,
    note: '',
});

watch(
    () => dialogVisible.value,
    (newVal) => {
        if (newVal) {
            form.subject_id = props.data.subject_id ?? null;
            form.grade_level_id = props.data.grade_level_id ?? null;
            form.class_type_id = props.data.class_type_id ?? null;
            form.full_score = props.data.full_score ?? null;
            form.divide = props.data.divide ?? null;
            form.average = props.data.average ?? null;
            form.note = props.data.note || '';
        }
    },
);

const disableClassType = computed(() => {
    const grade = props.grade_levels.find((g) => g.id === form.grade_level_id);

    return grade?.name !== 'ថ្នាក់ទី១១' && grade?.name !== 'ថ្នាក់ទី១២';
});

const handleSubmit = () => {
    form.put(`/admin/subject_grade_levels/${props.data.id}`, {
        onSuccess: () => {
            dialogVisible.value = false;
            form.reset();
            ElMessage.success('កែប្រែមុខវិជ្ជាតាមកម្រិតបានជោគជ័យ');
        },
        onError: () => {
            ElMessage.error(
                'មានបញ្ហាក្នុងការកែប្រែមុខវិជ្ជាតាមកម្រិត។ សូមពិនិត្យម្តងទៀត។',
            );
        },
    });
};
</script>
