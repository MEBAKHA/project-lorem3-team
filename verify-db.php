#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$users = \App\Models\User::all(['id', 'name', 'email', 'role']);

echo "\n" . str_repeat("=", 70) . "\n";
echo "USERS DATABASE VERIFICATION\n";
echo str_repeat("=", 70) . "\n\n";

printf("%-4s | %-20s | %-25s | %-6s\n", "ID", "Name", "Email", "Role");
echo str_repeat("-", 70) . "\n";

foreach ($users as $user) {
    printf("%-4s | %-20s | %-25s | %-6s\n", 
        $user->id, 
        substr($user->name, 0, 20), 
        $user->email, 
        $user->role
    );
}

echo "\n" . str_repeat("=", 70) . "\n";
echo "Total Users: " . $users->count() . "\n";
echo "Admin Users: " . $users->where('role', 'admin')->count() . "\n";
echo "Regular Users: " . $users->where('role', 'user')->count() . "\n";
echo str_repeat("=", 70) . "\n\n";
