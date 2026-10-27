<?php
$records = [
    ['type' => 'Person', 'id' => 'P-1001', 'name' => 'Daniel Kamau', 'date' => '2026-10-11', 'status' => 'Verified'],
    ['type' => 'Birth', 'id' => 'BR-2026-0004', 'name' => 'Maya Kamau', 'date' => '2026-10-07', 'status' => 'Pending'],
    ['type' => 'Death', 'id' => 'DR-2026-0002', 'name' => 'John Wanjiru', 'date' => '2026-09-28', 'status' => 'Approved'],
    ['type' => 'Marriage', 'id' => 'MR-2026-0001', 'name' => 'Grace & Peter', 'date' => '2026-09-15', 'status' => 'Verified'],
    ['type' => 'Person', 'id' => 'P-1005', 'name' => 'Alice Njeri', 'date' => '2026-10-09', 'status' => 'Pending'],
    ['type' => 'Birth', 'id' => 'BR-2026-0006', 'name' => 'Noah Njenga', 'date' => '2026-10-14', 'status' => 'Approved'],
];

$filter = $_GET['type'] ?? 'all';
$search = strtolower($_GET['search'] ?? '');

$filtered = array_filter($records, function ($record) use ($filter, $search) {
    $matchesFilter = $filter === 'all' || strtolower($record['type']) === strtolower($filter);
    $matchesSearch = $search === ''
        || stripos($record['name'], $search) !== false
        || stripos($record['id'], $search) !== false;

    return $matchesFilter && $matchesSearch;
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records | NRB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/stylesheet.css">
</head>
<body class="app-body">
    <?php include '../includes/sidebar.php'; ?>

    <header class="topbar small">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <p class="eyebrow">National Registration Bureau</p>
                <h1>Records Search</h1>
            </div>
            <a href="../index.php" class="btn btn-light btn-sm">Back to Dashboard</a>
        </div>
    </header>

    <main class="container py-5">
        <div class="panel form-panel">
            <div class="panel-head">
                <h3>Registered entries</h3>
                <span>Search and filter all records</span>
            </div>

            <form method="GET" class="record-toolbar">
                <div class="input-group record-search">
                    <input type="text" name="search" class="form-control" value="<?= htmlspecialchars($search) ?>" placeholder="Search by name or ID">
                </div>

                <div class="d-flex align-items-center gap-2">
                    <select name="type" class="form-control">
                        <option value="all" <?= $filter === 'all' ? 'selected' : '' ?>>All Records</option>
                        <option value="person" <?= $filter === 'person' ? 'selected' : '' ?>>Persons</option>
                        <option value="birth" <?= $filter === 'birth' ? 'selected' : '' ?>>Births</option>
                        <option value="death" <?= $filter === 'death' ? 'selected' : '' ?>>Deaths</option>
                        <option value="marriage" <?= $filter === 'marriage' ? 'selected' : '' ?>>Marriages</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="record-table">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($filtered) > 0): ?>
                            <?php foreach ($filtered as $record): ?>
                                <tr>
                                    <td><?= htmlspecialchars($record['type']) ?></td>
                                    <td><?= htmlspecialchars($record['id']) ?></td>
                                    <td><?= htmlspecialchars($record['name']) ?></td>
                                    <td><?= htmlspecialchars($record['date']) ?></td>
                                    <td>
                                        <span class="status-badge <?= strtolower($record['status']) ?>"><?= htmlspecialchars($record['status']) ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No matching records found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    </div>
</div>
</body>
</html>
