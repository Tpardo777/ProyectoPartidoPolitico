<?php if (!empty($error)): ?>
    <div class="mb-4 p-4 rounded-lg bg-red-100 border border-red-300 text-red-700 flex justify-between items-center shadow-md">
        <span> <strong>Error:</strong> <?= htmlspecialchars($error) ?></span>
        <button onclick="this.parentElement.remove()" class="text-red-700 font-bold">✖</button>
    </div>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <div class="mb-4 p-4 rounded-lg bg-green-100 border border-green-300 text-green-700 flex justify-between items-center shadow-md">
        <span> <strong>Éxito:</strong> <?= htmlspecialchars($success) ?></span>
        <button onclick="this.parentElement.remove()" class="text-green-700 font-bold">✖</button>
    </div>
<?php endif; ?>
