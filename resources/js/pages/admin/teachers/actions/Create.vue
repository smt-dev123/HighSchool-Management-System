<template>
    <el-button @click="dialogVisible = true" type="primary">
        បន្ថែមគ្រូបង្រៀន
    </el-button>

    <el-dialog
        v-model="dialogVisible"
        title="បន្ថែមគ្រូបង្រៀន"
        width="800"
        align-center
        append-to-body
        @closed="form.reset()"
    >
        <el-form :model="form" label-width="140px" label-position="left">
            <el-row :gutter="20">
                <el-col :span="12">
                    <el-form-item
                        label="ឈ្មោះជាភាសាខ្មែរ"
                        :error="form.errors.name_kh"
                    >
                        <el-input v-model="form.name_kh" />
                    </el-form-item>
                </el-col>

                <el-col :span="12">
                    <el-form-item
                        label="ឈ្មោះអង់គ្លេស"
                        :error="form.errors.name_en"
                    >
                        <el-input v-model="form.name_en" />
                    </el-form-item>
                </el-col>

                <el-col :span="12">
                    <el-form-item label="ភេទ" :error="form.errors.gender">
                        <el-select
                            v-model="form.gender"
                            placeholder="ជ្រើសរើស"
                            style="width: 100%"
                        >
                            <el-option label="ប្រុស" value="M" />
                            <el-option label="ស្រី" value="F" />
                        </el-select>
                    </el-form-item>
                </el-col>

                <el-col :span="12">
                    <el-form-item
                        label="ថ្ងៃខែឆ្នាំកំណើត"
                        :error="form.errors.dob"
                    >
                        <el-date-picker
                            style="width: 100%"
                            v-model="form.dob"
                            type="date"
                            format="YYYY-MM-DD"
                            value-format="YYYY-MM-DD"
                        />
                    </el-form-item>
                </el-col>

                <el-col :span="12">
                    <el-form-item
                        label="ថ្ងៃខែឆ្នាំចូលធ្វើការងារ"
                        :error="form.errors.join_date"
                    >
                        <el-date-picker
                            style="width: 100%"
                            v-model="form.join_date"
                            type="date"
                            format="YYYY-MM-DD"
                            value-format="YYYY-MM-DD"
                            :disabled-date="disableJoinDate"
                        />
                    </el-form-item>
                </el-col>

                <el-col :span="12">
                    <el-form-item
                        label="កម្រិតវប្បធម៍"
                        :error="form.errors.level"
                    >
                        <el-input v-model="form.level" />
                    </el-form-item>
                </el-col>

                <el-col :span="12">
                    <el-form-item
                        label="លេខទូរស័ព្ទ"
                        :error="form.errors.phone"
                    >
                        <el-input v-model="form.phone" type="tel" />
                    </el-form-item>
                </el-col>

                <el-col :span="12">
                    <el-form-item label="អ៊ីមែល" :error="form.errors.email">
                        <el-input v-model="form.email" type="email" />
                    </el-form-item>
                </el-col>

                <el-col :span="12">
                    <el-form-item
                        label="ស្ថានភាព"
                        :error="form.errors.status_id"
                    >
                        <el-select
                            v-model="form.status_id"
                            placeholder="ជ្រើសរើស"
                            style="width: 100%"
                        >
                            <el-option
                                v-for="status in teacher_statuses"
                                :key="status.id"
                                :label="status.status_kh"
                                :value="status.id"
                            />
                        </el-select>
                    </el-form-item>
                </el-col>

                <el-col :span="12">
                    <el-form-item
                        label="អាសយដ្ឋាន"
                        :error="form.errors.address"
                    >
                        <el-input v-model="form.address" />
                    </el-form-item>
                </el-col>

                <el-col :span="24">
                    <el-form-item label="ផ្សេងៗ" :error="form.errors.other">
                        <el-input
                            v-model="form.other"
                            type="textarea"
                            :rows="2"
                        />
                    </el-form-item>
                </el-col>

                <el-col :span="12">
                    <el-form-item label="មានគណនី">
                        <el-checkbox v-model="form.is_enable_account"
                            >មានគណនីរួចរាល់</el-checkbox
                        >
                    </el-form-item>
                </el-col>
            </el-row>
            <el-upload
                class="upload-demo"
                drag
                action="https://run.mocky.io/v3/9d059bf9-4660-45f2-925d-ce80ad6c4d15"
                :on-change="handleChange"
            >
                <el-icon class="el-icon--upload"><upload-filled /></el-icon>
                <div class="el-upload__text">
                    Drop file here or <em>click to upload</em>
                </div>
                <template #tip>
                    <div class="el-upload__tip">
                        jpg/png files with a size less than 500kb
                    </div>
                </template>
            </el-upload>
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
import { UploadFilled } from '@element-plus/icons-vue';
import { useForm } from '@inertiajs/vue3';
import type { UploadFile, UploadFiles } from 'element-plus';
import { ElMessage } from 'element-plus';
import { ref } from 'vue';

const props = defineProps<{
    teacher_statuses: any[];
}>();

const dialogVisible = ref(false);

const form = useForm({
    name_kh: '',
    name_en: '',
    gender: '',
    dob: '',
    address: '',
    phone: '',
    email: '',
    join_date: '',
    level: '',
    is_enable_account: true,
    profile: '',
    status_id: '',
    other: '',
});

const disableJoinDate = (date: Date) => {
    if (!form.dob) return true;

    const dob = new Date(form.dob);
    const minDate = new Date(dob);
    minDate.setFullYear(dob.getFullYear() + 18);

    return date < minDate;
};

const handleChange = (uploadFile: UploadFile, uploadFiles: UploadFiles) => {
    console.log(uploadFile, uploadFiles);
};

const handleSubmit = () => {
    form.post('/admin/teachers', {
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
