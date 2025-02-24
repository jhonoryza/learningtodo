<!-- eslint-disable prettier/prettier -->
<script setup>
import { AutoForm } from '@/components/ui/auto-form';
import { Badge } from '@/components/ui/badge';
import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from '@/components/ui/breadcrumb'; /* PartiallyEnd: #3632/scriptSetup.vue */
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Separator } from '@/components/ui/separator';
import { SidebarTrigger } from '@/components/ui/sidebar'; /* PartiallyEnd: #3632/scriptSetup.vue */
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';
import { useToast } from '@/components/ui/toast/use-toast';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { CircleCheck, Trash2, Undo } from 'lucide-vue-next';
import { ref } from 'vue';
import * as z from 'zod';

const { toast } = useToast();

defineProps({
    todos: Object,
});

const setDone = (id) => {
    router.put(
        route('todonotes.update', id),
        {
            status: 'done',
        },
        {
            preserveState: true,
            preserveScroll: true,
            onSuccess: () => {
                toast({
                    title: `Todo ${id} Done`,
                    description: 'Todo has been updated successfully',
                });
            },
            onError: (err) => {
                toast({
                    title: 'Todo failed to update',
                    description: err,
                });
            },
        },
    );
};
const setUndo = (id) => {
    router.put(
        route('todonotes.update', id),
        {
            status: 'todo',
        },
        {
            preserveState: true,
            preserveScroll: true,
            onSuccess: () => {
                toast({
                    title: `Rollback Todo ${id}`,
                    description: 'Todo has been updated successfully',
                });
            },
            onError: (err) => {
                toast({
                    title: 'Todo failed to update',
                    description: err,
                });
            },
        },
    );
};

const setDelete = (id) => {
    router.delete(route('todonotes.destroy', id), {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
            toast({
                title: `Todo ${id} Deleted`,
                description: 'Todo has been deleted successfully',
            });
        },
        onError: (err) => {
            toast({
                title: 'Todo failed to update',
                description: err,
            });
        },
    });
};

const goToLink = (link) => {
    router.get(link, {
        preserveScroll: true,
        preserveState: true,
    });
};

const schema = z.object({
    name: z
        .string({
            required_error: 'todo name is required.',
        })
        .min(2, {
            message: 'todo name must be at least 2 characters.',
        }),
    notes: z
        .string({
            required_error: 'notes is required.',
        })
        .min(2, {
            message: 'notes must be at least 2 characters.',
        }),
});

const form = ref(null);

const onSubmit = (values) => {
    router.post(route('todonotes.store'), values, {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            toast({
                title: 'Todo Created',
                description: 'Todo has been created successfully',
            });
            // Reset the form
            if (form.value) {
                form.value.reset();
            }
        },
        onError: (err) => {
            toast({
                title: 'Todo failed to create',
                description: err,
            });
        },
    });
};
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <SidebarTrigger class="-ml-1" />
            <Separator orientation="vertical" class="mr-2 h-4" />
            <Breadcrumb>
                <BreadcrumbList>
                    <BreadcrumbItem class="hidden md:block">
                        <BreadcrumbLink :href="route('dashboard')">
                            Home
                        </BreadcrumbLink>
                    </BreadcrumbItem>
                    <BreadcrumbSeparator />
                    <BreadcrumbItem>
                        <BreadcrumbPage>Notes</BreadcrumbPage>
                    </BreadcrumbItem>
                </BreadcrumbList>
            </Breadcrumb>
        </template>
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <Table>
                <TableCaption>A list of your recent notes.</TableCaption>
                <TableHeader>
                    <TableRow>
                        <TableHead> ID </TableHead>
                        <TableHead> Name </TableHead>
                        <TableHead class="text-right"> Action </TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow v-for="todo in todos.data" :key="todo.id">
                        <TableCell>
                            {{ todo.id }}
                        </TableCell>
                        <TableCell class="flex flex-col gap-2 font-medium">
                            {{ todo.name }}
                            <div>
                                <Badge v-if="todo.is_done">
                                    {{ todo.status }}
                                </Badge>
                                <Badge v-else variant="destructive">
                                    {{ todo.status }}
                                </Badge>
                            </div>
                        </TableCell>
                        <TableCell class="text-right">
                            <Button
                                variant="destructive"
                                v-if="todo.is_done"
                                @click="setUndo(todo.id)"
                            >
                                <div
                                    class="flex size-6 items-center justify-center rounded-sm border"
                                >
                                    <component
                                        :is="Undo"
                                        class="size-4 shrink-0"
                                    />
                                </div>
                            </Button>
                            <Button
                                variant="destructive"
                                v-else
                                @click="setDone(todo.id)"
                            >
                                <div
                                    class="flex size-6 items-center justify-center rounded-sm border"
                                >
                                    <component
                                        :is="CircleCheck"
                                        class="size-4 shrink-0"
                                    />
                                </div>
                            </Button>
                            <Button
                                variant="destructive"
                                @click="setDelete(todo.id)"
                                class="ml-2"
                            >
                                <div
                                    class="flex size-6 items-center justify-center rounded-sm border"
                                >
                                    <component
                                        :is="Trash2"
                                        class="size-4 shrink-0"
                                    />
                                </div>
                            </Button>
                        </TableCell>
                    </TableRow>
                </TableBody>
            </Table>

            <div class="flex items-center justify-end space-x-2 py-4">
                <div class="space-x-2">
                    <Button
                        variant="outline"
                        size="sm"
                        :disabled="!todos.prev_page_url"
                        @click="goToLink(todos.prev_page_url)"
                    >
                        Previous
                    </Button>
                    <Button
                        variant="outline"
                        size="sm"
                        :disabled="!todos.next_page_url"
                        @click="goToLink(todos.next_page_url)"
                    >
                        Next
                    </Button>
                </div>
            </div>

            <Card>
                <CardHeader>
                    <CardTitle> Add Note</CardTitle>
                </CardHeader>
                <CardContent>
                    <AutoForm
                        :ref="form"
                        class="w-2/3 space-y-6"
                        :schema="schema"
                        :field-config="{
                            name: {
                                label: 'Name',
                                inputProps: {
                                    required: true,
                                },
                            },
                            notes: {
                                label: 'Notes',
                                component: 'textarea',
                                inputProps: {
                                    required: true,
                                },
                            },
                        }"
                        @submit="onSubmit"
                    >
                        <Button type="submit"> Save </Button>
                    </AutoForm>
                </CardContent>
            </Card>
        </div>
    </AuthenticatedLayout>
</template>
