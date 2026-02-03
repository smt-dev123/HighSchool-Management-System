<template>
    <el-button type="primary" @click="dialogVisible = true">
        បន្ថែមអ្នកប្រើប្រាស់
    </el-button>

    <el-dialog
        v-model="dialogVisible"
        title="បន្ថែមអ្នកប្រើប្រាស់"
        width="800px"
        align-center
        append-to-body
    >
        <el-form :model="form" label-width="140px">
            <el-row :gutter="20">
                <el-col :span="24">
                    <el-form-item
                        label="ឈ្មោះអ្នកប្រើប្រាស់"
                        :error="form.errors.name"
                    >
                        <el-input v-model="form.name" />
                    </el-form-item>
                </el-col>

                <el-col :span="24">
                    <el-form-item
                        label="ទូរសព្ទ"
                        :error="form.errors.phone"
                    >
                        <el-input v-model="form.phone" maxlength="15" />
                    </el-form-item>
                </el-col>

                <el-col :span="24">
                    <el-form-item
                        label="អ៊ីមែល"
                        :error="form.errors.email"
                    >
                        <el-input v-model="form.email" type="email" />
                    </el-form-item>
                </el-col>

                <el-col :span="24">
                    <el-form-item
                        label="ពាក្យសម្ងាត់"
                        :error="form.errors.password"
                    >
                        <el-input
                            v-model="form.password"
                            type="password"
                            show-password
                        />
                    </el-form-item>
                </el-col>

                <el-col :span="24">
                    <el-form-item
                        label="បញ្ជាក់ពាក្យសម្ងាត់"
                        :error="form.errors.confirm_password"
                    >
                        <el-input
                            v-model="form.confirm_password"
                            type="password"
                            show-password
                        />
                    </el-form-item>
                </el-col>

                <el-col :span="24">
                    <el-form-item
                        label="តួនាទីអ្នកប្រើប្រាស់"
                        :error="form.errors.user_role_id"
                    >
                        <el-select
                            v-model="form.user_role_id"
                            placeholder="ជ្រើសរើសតួនាទី"
                            style="width: 100%"
                        >
                            <el-option
                                v-for="role in props.userRoles"
                                :key="role.id"
                                :label="role.name"
                                :value="role.id"
                            />
                        </el-select>
                    </el-form-item>
                </el-col>
            </el-row>
        </el-form>

        <template #footer>
            <el-button @click="dialogVisible = false">
                ចាកចេញ
            </el-button>
            <el-button
                type="primary"
                :loading="form.processing"
                @click="handleSubmit"
            >
                រក្សាទុក
            </el-button>
        </template>
    </el-dialog>
</template>

<script lang="ts" setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import { ElMessage } from 'element-plus'

const dialogVisible = ref(false)

const props = defineProps<{
    userRoles: { id: number; name: string }[]
}>()

interface Form {
    name: string
    phone: string
    email: string
    password: string
    confirm_password: string
    user_role_id: number | null
}

const form = useForm<Form>({
    name: '',
    phone: '',
    email: '',
    password: '',
    confirm_password: '',
    user_role_id: null,
})

const handleSubmit = () => {
    form.post('/admin/users', {
        onSuccess: () => {
            dialogVisible.value = false
            form.reset()
            ElMessage.success('បង្កើតអ្នកប្រើប្រាស់ជោគជ័យ')
        },
    })
}
</script>
