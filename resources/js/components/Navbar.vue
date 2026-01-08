<template>
    <header
        class="flex min-h-16 items-center justify-between border-b border-gray-200 bg-white px-4 shadow-sm"
    >
        <h2 class="font-khmer text-lg font-medium">
            សួស្តីពេលរសៀល,
            <b class="font-semibold text-gray-800">
                {{ $page.props.auth.user.name }}
            </b>
        </h2>

        <Link
            :href="logout()"
            method="post"
            as="button"
            class="flex items-center text-gray-600 transition-colors hover:text-red-600"
            title="ចាកចេញ"
        >
            <el-icon class="text-xl"><SwitchButton /></el-icon>
        </Link>
    </header>
</template>

<script lang="ts" setup>
import { logout } from '@/routes';
import { SwitchButton } from '@element-plus/icons-vue';
import { Link } from '@inertiajs/vue3';
</script>

<style scoped>
.font-khmer {
    font-family: 'Khmer OS Battambang', sans-serif;
}
</style>
