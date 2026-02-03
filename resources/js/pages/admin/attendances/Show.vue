<script setup lang="ts">
import { ElMessage } from 'element-plus';
import { ref } from 'vue';

const props = defineProps<{
    attendance: any;
    existingDetails: any[];
}>();

// រៀបចំទិន្នន័យសម្រាប់ Form
const attendanceList = ref(
    props.attendance.class.students.map((student: any) => {
        // ឆែកមើលថាតើមានវត្តមានចាស់ឬអត់ បើគ្មានទេឱ្យ default = present
        const oldDetail = props.existingDetails.find(
            (d) => d.student_id === student.id,
        );
        return {
            student_id: student.id,
            name_kh: student.name_kh,
            status: oldDetail ? oldDetail.status : 'present',
        };
    }),
);

const submit = () => {
    router.post(
        route('attendances.save', props.attendance.id),
        {
            students: attendanceList.value,
        },
        {
            onSuccess: () => ElMessage.success('រក្សាទុកជោគជ័យ'),
        },
    );
};
</script>

<template>
    <Head title="បញ្ចូលវត្តមាន" />
    <AppLayout>
        <div class="p-4">
            <el-card shadow="never">
                <template #header>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <el-button
                                @click="router.get(route('attendances.index'))"
                                :icon="ArrowLeft"
                                circle
                            />
                            <div>
                                <h3 class="text-lg font-bold">
                                    ថ្នាក់រៀន៖ {{ attendance.class.name }}
                                </h3>
                                <p class="text-sm text-gray-500">
                                    {{ attendance.subject_grade.name }} |
                                    {{ attendance.time.name }}
                                </p>
                            </div>
                        </div>
                        <el-button type="success" :icon="Check" @click="submit"
                            >រក្សាទុកទាំងអស់</el-button
                        >
                    </div>
                </template>

                <el-table :data="attendanceList" stripe style="width: 100%">
                    <el-table-column label="ល.រ" type="index" width="60" />
                    <el-table-column prop="name_kh" label="ឈ្មោះសិស្ស" />
                    <el-table-column label="ស្ថានភាពវត្តមាន" align="right">
                        <template #default="scope">
                            <el-radio-group
                                v-model="scope.row.status"
                                size="large"
                            >
                                <el-radio-button label="present"
                                    >មក</el-radio-button
                                >
                                <el-radio-button label="permission"
                                    >ច្បាប់</el-radio-button
                                >
                                <el-radio-button label="absent"
                                    >អវត្តមាន</el-radio-button
                                >
                            </el-radio-group>
                        </template>
                    </el-table-column>
                </el-table>
            </el-card>
        </div>
    </AppLayout>
</template>
