<?php
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - EMS Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="app-wrapper">

    <!-- ============ SIDEBAR ============ -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon"><i class="bi bi-people-fill"></i></div>
            <span>EMS Portal</span>
        </div>

        <nav class="sidebar-nav">
            <a href="dashboard.php" class="nav-item">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
            <a href="employees.php" class="nav-item">
                <i class="bi bi-person-badge"></i> Employees
            </a>
            <a href="reports.php" class="nav-item active">
                <i class="bi bi-bar-chart-fill"></i> Reports
            </a>
            <a href="settings.php" class="nav-item">
                <i class="bi bi-gear-fill"></i> Settings
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="user-chip">
                <div class="user-avatar"><?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?></div>
                <div>
                    <div class="user-name"><?php echo htmlspecialchars($_SESSION['username']); ?></div>
                    <div class="user-role">Administrator</div>
                </div>
            </div>
            <a href="logout.php" class="logout-btn"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </aside>

    <!-- ============ MAIN CONTENT ============ -->
    <main class="main-content">

        <div class="page-header">
            <div>
                <h1>Reports & Analytics</h1>
                <p class="text-muted">Insights into your workforce data</p>
            </div>
        </div>

        <!-- Row 1: Two charts side by side -->
        <div class="reports-grid">
            <div class="card-box">
                <h5>Average Salary by Department</h5>
                <div class="chart-wrap">
                    <canvas id="avgSalaryChart"></canvas>
                </div>
            </div>
            <div class="card-box">
                <h5>Salary Range Distribution</h5>
                <div class="chart-wrap">
                    <canvas id="salaryRangeChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Row 2: Top Earners Table -->
        <div class="card-box" style="margin-top: 20px;">
            <h5><i class="bi bi-trophy-fill" style="color:#f59e0b;"></i> Top 5 Highest Paid Employees</h5>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Employee</th>
                        <th>Department</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody id="topEarnersBody"></tbody>
            </table>
        </div>

    </main>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="assets/reports.js"></script>
</body>
</html>