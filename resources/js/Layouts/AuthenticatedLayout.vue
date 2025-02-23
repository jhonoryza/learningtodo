<script setup lang="ts">
import { ref } from 'vue';

const showingNavigationDropdown = ref(false);

import AppSidebar from '@/components/AppSidebar.vue';
import {
    SidebarProvider,
    SidebarTrigger,
} from '@/components/ui/sidebar'; /* PartiallyEnd: #3632/scriptSetup.vue */
</script>

<template>
    <SidebarProvider>
        <AppSidebar />
        <SidebarTrigger />
        <main class="min-h-screen w-full p-2">
            <slot />
        </main>
    </SidebarProvider>
</template>
