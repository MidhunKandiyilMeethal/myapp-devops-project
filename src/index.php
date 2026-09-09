<!DOCTYPE html>
<html>
<head>
<title>ABC Technologies - Enterprise Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;background:#f4f6f9;min-height:100vh;display:flex;flex-direction:column}
.header{background:#0f1b2d;color:white;padding:18px 40px;display:flex;justify-content:space-between;align-items:center;box-shadow:0 2px 10px rgba(0,0,0,0.1)}
.header .logo{font-size:22px;font-weight:700;letter-spacing:0.5px}
.header .logo span{color:#ff9900}
.header .env{background:#1a2e4a;padding:6px 14px;border-radius:20px;font-size:12px;border:1px solid #2a4a7a}
.container{flex:1;display:flex;justify-content:center;align-items:center;padding:40px 20px}
.card{background:white;width:100%;max-width:580px;border-radius:12px;box-shadow:0 8px 30px rgba(0,0,0,0.08);overflow:hidden;border:1px solid #e5e8eb}
.card-header{padding:32px 32px 20px;text-align:center;border-bottom:1px solid #f0f2f5}
.card-header h1{color:#0f1b2d;font-size:26px;margin-bottom:6px}
.card-header .subtitle{color:#5a6c85;font-size:14px;letter-spacing:1px;text-transform:uppercase;font-weight:600}
.card-header .tagline{color:#7a8a9e;font-size:13px;margin-top:12px}
.badges{display:flex;gap:8px;justify-content:center;margin-top:16px;flex-wrap:wrap}
.badge{background:#f0f4f8;color:#3a4a5e;padding:5px 12px;border-radius:20px;font-size:11px;font-weight:600;border:1px solid #e1e8f0}
.card-body{padding:28px 32px}
.status-row{display:flex;justify-content:space-between;align-items:center;padding:14px 16px;background:#fafbfc;border-radius:8px;margin-bottom:12px;border:1px solid #f0f2f5}
.status-left{display:flex;align-items:center;gap:10px}
.dot{width:8px;height:8px;border-radius:50%;background:#00c853;box-shadow:0 0 0 4px rgba(0,200,83,0.15)}
.dot.warn{background:#ffab00;box-shadow:0 0 0 4px rgba(255,171,0,0.15)}
.status-label{font-size:13px;font-weight:600;color:#2d3a4a}
.status-value{font-size:12px;color:#5a6c85}
.divider{height:1px;background:#eef1f4;margin:22px 0}
.meta{display:grid;grid-template-columns:1fr 1fr;gap:12px}
.meta-item{background:#f8f9fb;padding:12px;border-radius:6px}
.meta-item .m-label{font-size:10px;text-transform:uppercase;letter-spacing:0.8px;color:#8a9aaf;font-weight:700}
.meta-item .m-value{font-size:13px;color:#2d3a4a;margin-top:4px;font-weight:600}
.footer{text-align:center;padding:16px;font-size:11px;color:#8a9aaf;background:#fcfdfe;border-top:1px solid #f0f2f5}
.success{color:#00875a}
</style>
</head>
<body>
<div class="header">
<div class="logo">ABC <span>Technologies</span></div>
<div class="env">● Production - EKS</div>
</div>
<div class="container">
<div class="card">
<div class="card-header">
<h1>Enterprise Application Portal</h1>
<div class="subtitle">PHP 3-Tier Architecture</div>
<div class="tagline">Highly Available • Scalable • Secure</div>
<div class="badges">
<div class="badge">Jenkins CI/CD</div>
<div class="badge">Docker</div>
<div class="badge">Amazon ECR</div>
<div class="badge">Amazon EKS</div>
</div>
</div>
<div class="card-body">
<?php
$host = getenv('DB_HOST') ?: 'mysql-service';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASSWORD') ?: 'password123';
$db   = getenv('DB_NAME') ?: 'abc_tech';
$conn = @new mysqli($host, $user, $pass, $db);
$dbStatus = !$conn->connect_error;
$dbTime = "";
if($dbStatus){
 $r = $conn->query("SELECT NOW() as time");
 if($r){ $row=$r->fetch_assoc(); $dbTime=$row['time']; }
 $conn->close();
}
?>
<div class="status-row">
<div class="status-left"><div class="dot <?php echo $dbStatus?'':'warn' ?>"></div><div class="status-label">Database Tier - MySQL</div></div>
<div class="status-value"><?php echo $dbStatus ? "<span class='success'>Connected</span>" : "Initializing" ?></div>
</div>
<div class="status-row">
<div class="status-left"><div class="dot"></div><div class="status-label">Application Tier - PHP</div></div>
<div class="status-value"><span class="success">Operational</span></div>
</div>
<div class="status-row">
<div class="status-left"><div class="dot"></div><div class="status-label">Frontend Tier - Web</div></div>
<div class="status-value"><span class="success">Operational</span></div>
</div>

<div class="divider"></div>

<div class="meta">
<div class="meta-item"><div class="m-label">Cluster</div><div class="m-value">K8s v1.30.14 (3 Nodes)</div></div>
<div class="meta-item"><div class="m-label">Pod</div><div class="m-value"><?php echo gethostname(); ?></div></div>
<div class="meta-item"><div class="m-label">Database Time</div><div class="m-value"><?php echo $dbTime ?: '—'; ?></div></div>
<div class="meta-item"><div class="m-label">Environment</div><div class="m-value">Production</div></div>
</div>
</div>
<div class="footer">© 2026 ABC Technologies • DevOps Enterprise Platform • Monitoring: Prometheus + Grafana</div>
</div>
</div>
</body>
</html>
