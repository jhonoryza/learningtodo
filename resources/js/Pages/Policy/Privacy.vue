<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Privacy Policy" />

    <GuestLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-8 shadow dark:bg-gray-800 sm:rounded-lg">
                    <h1 class="mb-6 text-2xl font-bold">Privacy Policy</h1>
                    <div class="space-y-4 text-gray-600 dark:text-gray-300">
                        <p>
                            Last updated: {{ new Date().toLocaleDateString() }}
                        </p>

                        <h2 class="mt-6 text-xl font-semibold">
                            1. Information We Collect
                        </h2>
                        <p>
                            We collect information you provide directly to us
                            when you:
                        </p>
                        <ul class="list-inside list-disc pl-4">
                            <li>Create an account</li>
                            <li>Create or modify your todos</li>
                            <li>Communicate with us</li>
                        </ul>

                        <h2 class="mt-6 text-xl font-semibold">
                            2. How We Use Your Information
                        </h2>
                        <p>We use the information we collect to:</p>
                        <ul class="list-inside list-disc pl-4">
                            <li>Provide and maintain our services</li>
                            <li>Improve our services</li>
                            <li>Send you technical notices and updates</li>
                        </ul>

                        <h2 class="mt-6 text-xl font-semibold">
                            3. Data Security
                        </h2>
                        <p>
                            We implement appropriate security measures to
                            protect your personal information.
                        </p>

                        <h2 class="mt-6 text-xl font-semibold">
                            4. Contact Us
                        </h2>
                        <p>
                            If you have any questions about this Privacy Policy,
                            please contact us on mail at jardik.oryza@gmail.com.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
