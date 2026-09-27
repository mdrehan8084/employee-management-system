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
    <title>Dashboard - EMS Portal</title>
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
            <a href="dashboard.php" class="nav-item active">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
            <a href="employees.php" class="nav-item">
                <i class="bi bi-person-badge"></i> Employees
            </a>
            <a href="reports.php" class="nav-item">
                <i class="bi bi-bar-chart-fill"></i> Reports
            </a>
            <a href="settings.php" class="nav-item">
                <i class="bi bi-gear-fill"></i> settings
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
                <h1>Dashboard Overview</h1>
                <p class="text-muted">Welcome back, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</p>
            </div>
        </div>

        <!-- ============ STATS CARDS ============ -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon icon-blue"><i class="bi bi-people-fill"></i></div>
                <div>
                    <div class="stat-value" id="statTotalEmployees">0</div>
                    <div class="stat-label">Total Employees</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon icon-purple"><i class="bi bi-diagram-3-fill"></i></div>
                <div>
                    <div class="stat-value" id="statTotalDepartments">0</div>
                    <div class="stat-label">Departments</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon icon-green"><i class="bi bi-cash-stack"></i></div>
                <div>
                    <div class="stat-value" id="statTotalPayroll">₹0</div>
                    <div class="stat-label">Total Payroll</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon icon-orange"><i class="bi bi-graph-up-arrow"></i></div>
                <div>
                    <div class="stat-value" id="statAvgSalary">₹0</div>
                    <div class="stat-label">Average Salary</div>
                </div>
            </div>
        </div>

        <!-- ============ CHART + TABLE SECTION ============ -->
        <div class="content-grid">

            <!-- Chart Card -->
            <div class="card-box chart-card">
                <h5>Department Distribution</h5>
                <canvas id="deptChart"></canvas>
            </div>

            <!-- Table Card -->
            <div class="card-box table-card">
                <div class="table-header">
                    <h5>Employees</h5>
                    <div class="table-controls">
                        <div class="search-box">
                            <i class="bi bi-search"></i>
                            <input type="text" id="searchBox" placeholder="Search employees...">
                        </div>
                        <select id="departmentFilter" class="dept-filter">
                            <option value="">All Departments</option>
                        </select>
                        <button class="btn-add" data-bs-toggle="modal" data-bs-target="#employeeModal" onclick="openAddModal()">
                            <i class="bi bi-plus-lg"></i> Add Employee
                        </button>
                    </div>
                </div>

                <div id="alertBox"></div>

                <div class="table-responsive">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Department</th>
                                <th>Phone</th>
                                <th>Salary</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="employeeTableBody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- ============ ADD/EDIT MODAL ============ -->
<div class="modal fade" id="employeeModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content custom-modal">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="employeeForm">
                    <input type="hidden" id="employeeId">

                    <div class="form-group-custom">
                        <label>Full Name</label>
                        <input type="text" id="name" required>
                    </div>
                    <div class="form-group-custom">
                        <label>Email Address</label>
                        <input type="email" id="email" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group-custom">
                            <label>Phone</label>
                            <input type="text" id="phone">
                        </div>
                        <div class="form-group-custom">
                            <label>Department</label>
                            <input type="text" id="department" list="deptList">
                            <datalist id="deptList">
                                <option value="Web Development">
                                <option value="Design">
                                <option value="Marketing">
                                <option value="HR">
                                <option value="Sales">
                            </datalist>
                        </div>
                    </div>
                    <div class="form-group-custom">
                        <label>Salary (₹)</label>
                        <input type="number" id="salary" step="0.01" required>
                    </div>

                    <button type="submit" class="btn-save">Save Employee</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="assets/script.js"></script>
</body>
</html>
