<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Terms of Service" />

    <GuestLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-8 shadow dark:bg-gray-800 sm:rounded-lg">
                    <h1 class="mb-6 text-2xl font-bold">Terms of Service</h1>
                    <div class="space-y-4 text-gray-600 dark:text-gray-300">
                        <p>
                            Last updated: {{ new Date().toLocaleDateString() }}
                        </p>

                        <h2 class="mt-6 text-xl font-semibold">
                            1. Acceptance of Terms
                        </h2>
                        <p>
                            By accessing and using Learning Todo App, you accept
                            and agree to be bound by these Terms of Service.
                        </p>

                        <h2 class="mt-6 text-xl font-semibold">
                            2. User Responsibilities
                        </h2>
                        <ul class="list-inside list-disc pl-4">
                            <li>
                                You are responsible for maintaining the security
                                of your account
                            </li>
                            <li>
                                You must not use the service for any illegal
                                purposes
                            </li>
                            <li>
                                You must not violate any laws in your
                                jurisdiction
                            </li>
                        </ul>

                        <h2 class="mt-6 text-xl font-semibold">
                            3. Service Modifications
                        </h2>
                        <p>
                            We reserve the right to modify or discontinue the
                            service at any time.
                        </p>

                        <h2 class="mt-6 text-xl font-semibold">
                            4. Limitation of Liability
                        </h2>
                        <p>
                            The service is provided "as is" without any
                            warranties.
                        </p>

                        <h2 class="mt-6 text-xl font-semibold">5. Contact</h2>
                        <p>
                            For any questions regarding these terms, please
                            contact us on mail at jardik.oryza@gmail.com.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
