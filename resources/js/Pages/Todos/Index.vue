<script setup lang="ts">
import { AutoForm } from '@/Components/ui/auto-form';
import { Badge } from '@/Components/ui/badge';
import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from '@/Components/ui/breadcrumb'; /* PartiallyEnd: #3632/scriptSetup.vue */
import { Button } from '@/Components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/Components/ui/card';
import { Separator } from '@/Components/ui/separator';
import { SidebarTrigger } from '@/Components/ui/sidebar'; /* PartiallyEnd: #3632/scriptSetup.vue */
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/Components/ui/table';
import { useToast } from '@/Components/ui/toast/use-toast';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { CircleCheck, Trash2, Undo } from 'lucide-vue-next';
import * as z from 'zod';

const { toast } = useToast();

defineProps({
    todos: Object,
});

const setDone = (id) => {
    router.put(
        route('todos.update', id),
        {
            status: 'done',
        },
        {
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
        route('todos.update', id),
        {
            status: 'todo',
        },
        {
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
    router.delete(
        route('todos.destroy', id),
        {
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
        },
    );
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
    url: z
        .string({
            required_error: 'url is required.',
        })
        .min(2, {
            message: 'url must be at least 2 characters.',
        }),
});

const onSubmit = (values: Record<string, any>) => {
    router.post(route('todos.store'), values, {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            toast({
                title: 'Todo Created',
                description: 'Todo has been created successfully',
            });
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
                        <BreadcrumbPage>Todo</BreadcrumbPage>
                    </BreadcrumbItem>
                </BreadcrumbList>
            </Breadcrumb>
        </template>
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <Card>
                <CardHeader>
                    <CardTitle> Add TODO </CardTitle>
                </CardHeader>
                <CardContent>
                    <AutoForm class="w-2/3 space-y-6" :schema="schema" :field-config="{
                        name: {
                            label: 'Name',
                            component: 'textarea',
                            inputProps: {
                                required: true,
                            },
                        },
                        url: {
                            label: 'URL',
                            inputProps: {
                                required: true,
                            },
                        },
                    }" @submit="onSubmit">
                        <Button type="submit"> Save </Button>
                    </AutoForm>
                </CardContent>
            </Card>

            <Table>
                <TableCaption>A list of your recent todo.</TableCaption>
                <TableHeader>
                    <TableRow>
                        <TableHead> ID </TableHead>
                        <TableHead> Name </TableHead>
                        <TableHead>Status</TableHead>
                        <TableHead>Link</TableHead>
                        <TableHead class="text-right"> Action </TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow v-for="todo in todos.data" :key="todo.id">
                        <TableCell>
                            {{ todo.id }}
                        </TableCell>
                        <TableCell class="font-medium">
                            {{ todo.name }}
                        </TableCell>
                        <TableCell>
                            <Badge v-if="todo.is_done">
                                {{ todo.status }}
                            </Badge>
                            <Badge v-else variant="destructive">
                                {{ todo.status }}
                            </Badge>
                        </TableCell>
                        <TableCell>
                            <a :href="todo.url" target="_blank" class="text-blue-600 underline hover:text-blue-800">
                                {{ todo.url }}
                            </a>
                        </TableCell>
                        <TableCell class="text-right">
                            <Button variant="destructive" v-if="todo.is_done" @click="setUndo(todo.id)">
                                <div class="flex size-6 items-center justify-center rounded-sm border">
                                    <component :is="Undo" class="size-4 shrink-0" />
                                </div>
                            </Button>
                            <Button variant="destructive" v-else @click="setDone(todo.id)">
                                <div class="flex size-6 items-center justify-center rounded-sm border">
                                    <component :is="CircleCheck" class="size-4 shrink-0" />
                                </div>
                            </Button>
                            <Button variant="destructive" @click="setDelete(todo.id)" class="ml-2">
                                <div class="flex size-6 items-center justify-center rounded-sm border">
                                    <component :is="Trash2" class="size-4 shrink-0" />
                                </div>
                            </Button>
                        </TableCell>
                    </TableRow>
                </TableBody>
            </Table>

            <div class="flex items-center justify-end space-x-2 py-4">
                <div class="space-x-2">
                    <Button variant="outline" size="sm" :disabled="!todos.prev_page_url"
                        @click="goToLink(todos.prev_page_url)">
                        Previous
                    </Button>
                    <Button variant="outline" size="sm" :disabled="!todos.next_page_url"
                        @click="goToLink(todos.next_page_url)">
                        Next
                    </Button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
