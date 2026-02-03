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
        title="កែប្រែម៉ោងសិក្សា"
        width="800"
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
        label="ពាក្យសម្ងាត់ចាស់"
        :error="form.errors.old_password"
    >
        <el-input
            v-model="form.old_password"
            type="password"
            show-password
        />
    </el-form-item>
            </el-col>

            <el-col :span="24">
                <el-form-item
                    label="ពាក្យសម្ងាត់ថ្មី"
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
                    label="បញ្ជាក់ពាក្យសម្ងាត់ថ្មី"
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
import { ref, watch } from 'vue'
import { useForm } from '@inertiajs/vue3'
import { ElMessage } from 'element-plus'
import { Edit } from 'lucide-vue-next'

const dialogVisible = ref(false)

interface Form {
    name: string
    phone: string
    email: string
    old_password: string
    password: string
    confirm_password: string
    user_role_id: number | null
}


const props = defineProps<{
    data: {
        id: number
        name: string
        phone: string
        email: string
        user_role_id: number | null
    }
    userRoles: { id: number; name: string }[]
}>()

const form = useForm<Form>({
    name: '',
    phone: '',
    email: '',
    old_password: '',
    password: '',
    confirm_password: '',
    user_role_id: null,
})


watch(dialogVisible, (open) => {
    if (open) {
        form.name = props.data.name
        form.phone = props.data.phone
        form.email = props.data.email
        form.user_role_id = props.data.user_role_id

        // password fields always empty
        form.old_password = ''
        form.password = ''
        form.confirm_password = ''
        form.clearErrors()
    }
})


const handleSubmit = () => {
    form.transform((data) => ({
        ...data,
        old_password: data.old_password || undefined,
        password: data.password || undefined,
        confirm_password: data.confirm_password || undefined,
    })).put(`/admin/users/${props.data.id}`, {
        onSuccess: () => {
            dialogVisible.value = false
            form.reset()
            ElMessage.success('កែប្រែអ្នកប្រើប្រាស់ជោគជ័យ')
        },
    })
}

</script>

