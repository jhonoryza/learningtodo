<script setup lang="ts">
import { ref } from 'vue';

const showingNavigationDropdown = ref(false);

import AppSidebar from '@/components/AppSidebar.vue';
import {
    SidebarInset,
    SidebarProvider,
} from '@/components/ui/sidebar'; /* PartiallyEnd: #3632/scriptSetup.vue */
import Toaster from '@/components/ui/toast/Toaster.vue'
</script>

<template>
    <SidebarProvider>
        <Toaster />
        <AppSidebar />
        <SidebarInset>
            <header class="flex h-16 shrink-0 items-center gap-2 border-b px-4" v-if="$slots.header">
                <slot name="header" />
            </header>
            <main class="min-h-screen w-full p-2">
                <slot />
            </main>
        </SidebarInset>
    </SidebarProvider>
</template>
