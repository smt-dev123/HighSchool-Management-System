<template>
    <el-button @click="dialogVisible = true" type="primary">
        បន្ថែមសិស្សានុសិស្ស
    </el-button>

    <el-dialog
        v-model="dialogVisible"
        title="បន្ថែមសិស្សានុសិស្ស"
        width="800"
        align-center
        append-to-body
    >
        <el-form :model="form" label-width="140px">
            <el-row :gutter="20">
                <!-- Student Code -->
                <el-col :span="24">
                    <el-form-item label="លេខកូដសិស្ស">
                        <el-input v-model="form.studentCode" />
                    </el-form-item>
                </el-col>

                <!-- Khmer Name -->
                <el-col :span="12">
                    <el-form-item label="ឈ្មោះជាភាសាខ្មែរ">
                        <el-input v-model="form.nameKh" />
                    </el-form-item>
                </el-col>

                <!-- English Name -->
                <el-col :span="12">
                    <el-form-item label="ឈ្មោះអង់គ្លេស">
                        <el-input v-model="form.nameEn" />
                    </el-form-item>
                </el-col>

                <!-- Gender -->
                <el-col :span="12">
                    <el-form-item label="ភេទ">
                        <el-select v-model="form.gender" placeholder="ជ្រើសរើស">
                            <el-option label="ប្រុស" value="M" />
                            <el-option label="ស្រី" value="F" />
                        </el-select>
                    </el-form-item>
                </el-col>

                <!-- DOB -->
                <el-col :span="12">
                    <el-form-item label="ថ្ងៃខែឆ្នាំកំណើត">
                        <el-date-picker
                            style="width: 100%"
                            v-model="form.dob"
                            type="date"
                            placeholder="ជ្រើសរើសថ្ងៃកំណើត"
                            format="YYYY-MM-DD"
                            value-format="YYYY-MM-DD"
                        />
                    </el-form-item>
                </el-col>

                <!-- Phone -->
                <el-col :span="12">
                    <el-form-item label="លេខទូរស័ព្ទ">
                        <el-input v-model="form.phone" type="tel" />
                    </el-form-item>
                </el-col>

                <!-- Email -->
                <el-col :span="12">
                    <el-form-item label="អ៊ីមែល">
                        <el-input v-model="form.email" type="email" />
                    </el-form-item>
                </el-col>

                <!-- Address -->
                <el-col :span="12">
                    <el-form-item label="អាសយដ្ឋាន">
                        <el-input v-model="form.address" />
                    </el-form-item>
                </el-col>

                <!-- From School -->
                <el-col :span="12">
                    <el-form-item label="មកពីសាលា">
                        <el-input v-model="form.fromSchool" />
                    </el-form-item>
                </el-col>

                <!-- Father Name -->
                <el-col :span="12">
                    <el-form-item label="ឈ្មោះឪពុក">
                        <el-input v-model="form.fatherName" />
                    </el-form-item>
                </el-col>

                <!-- Mother Name -->
                <el-col :span="12">
                    <el-form-item label="ឈ្មោះម្តាយ">
                        <el-input v-model="form.motherName" />
                    </el-form-item>
                </el-col>

                <!-- Guardian Phone -->
                <el-col :span="12">
                    <el-form-item label="លេខអាណាព្យបាល">
                        <el-input v-model="form.guardianPhone" type="tel" />
                    </el-form-item>
                </el-col>

                <!-- Role ID -->
                <el-col :span="12">
                    <el-form-item label="តួនាទី">
                        <el-input v-model.number="form.roleId" type="number" />
                    </el-form-item>
                </el-col>

                <!-- Other -->
                <el-col :span="24">
                    <el-form-item label="ផ្សេងៗ">
                        <el-input v-model="form.other" type="textarea" />
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

const form = useForm({
    studentCode: '',
    nameKh: '',
    nameEn: '',
    gender: '',
    dob: '',
    address: '',
    phone: '',
    email: '',
    fromSchool: '',
    fatherName: '',
    motherName: '',
    guardianPhone: '',
    profile: '',
    roleId: 1,
    other: '',
});

const handleSubmit = () => {
    form.post('/admin/students', {
        onSuccess: () => {
            dialogVisible.value = false;
            form.reset();
            ElMessage.success('បង្កើតសិស្សជោគជ័យ');
        },
        onError: () => {
            ElMessage.error('មានបញ្ហាក្នុងការបង្កើតសិស្ស។ សូមពិនិត្យម្តងទៀត។');
        },
    });
};
</script>
