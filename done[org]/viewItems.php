<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "USER";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sort logic
$allowedColumns = ['ITEM_NAME', 'QUANTITY', 'DATE_ADDED'];
$sort = (isset($_GET['sort']) && in_array($_GET['sort'], $allowedColumns)) ? $_GET['sort'] : 'DATE_ADDED';
$order = (isset($_GET['order']) && strtolower($_GET['order']) === 'asc') ? 'ASC' : 'DESC';

$userID = $_SESSION['user_id'];
$sql = "SELECT * FROM INVENTORY WHERE USER_ID = ? ORDER BY $sort $order";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>View Items</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../Assets/css/style.css" />
  <link rel="stylesheet" href="../Assets/css/vw.css" />
</head>
<body>
  <aside class="sidebar" id="sidebar">
    <h2>Inventory</h2>
    <ul>
      <li><a href="./addItem.php"><i class="fas fa-plus"></i> Add Item</a></li>
      <li><a href="./updateItem.php"><i class="fas fa-edit"></i> Update Item</a></li>
      <li><a href="./viewItems.php"><i class="fas fa-boxes"></i> View Inventory</a></li>
      <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
  </aside>

  <main class="main-content">
    <div class="top-bar">
      <label class="switch">
        <input type="checkbox" id="darkToggle" />
        <span class="slider"></span>
      </label>
    </div>

    <h1>Your Inventory</h1>

    <!-- filter logic -->
    <div class="mb-3 mt-2">
      <input type="text" id="searchInput" class="form-control" placeholder="Search inventory..." onkeyup="filterTable()" />
    </div>

    <div class="table-responsive mt-4">
      <table id="inventoryTable" class="table table-dark table-bordered table-striped text-center align-middle">
        <thead class="table-light">
          <tr>
            <?php
            // sort function - click the column header to toggle order
            function sortLink($label, $column, $currentSort, $currentOrder) {
              $nextOrder = ($currentSort === $column && $currentOrder === 'ASC') ? 'DESC' : 'ASC';
              $arrow = '';
              if ($currentSort === $column) {
                  $arrow = $currentOrder === 'ASC' ? '▲' : '▼';
              }
              return "<a href='?sort=$column&order=$nextOrder' class='text-decoration-none text-dark'>$label $arrow</a>";
            }
            ?>
            <th><?php echo sortLink("Item Name", "ITEM_NAME", $sort, $order); ?></th>
            <th><?php echo sortLink("Quantity", "QUANTITY", $sort, $order); ?></th>
            <th><?php echo sortLink("Date Added", "DATE_ADDED", $sort, $order); ?></th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo htmlspecialchars($row['ITEM_NAME']); ?></td>
            <td><?php echo $row['QUANTITY']; ?></td>
            <td><?php echo $row['DATE_ADDED']; ?></td>
            <td>
              <form method="POST" action="deleteItem.php" onsubmit="return confirm('Are you sure you want to delete this item?');">
                <input type="hidden" name="item_id" value="<?php echo $row['ID']; ?>">
                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
              </form>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div class="mt-4">
      <a href="dashboard.php" class="btn btn-info"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </div>
  </main>

  <!-- filter Script -->
  <script>
  function filterTable() {
    const input = document.getElementById("searchInput");
    const filter = input.value.toLowerCase();
    const table = document.getElementById("inventoryTable");
    const rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
      const cells = rows[i].getElementsByTagName("td");
      let match = false;

      for (let j = 0; j < cells.length - 1; j++) {
        const text = cells[j].textContent.toLowerCase();
        if (text.indexOf(filter) > -1) {
          match = true;
          break;
        }
      }

      rows[i].style.display = match ? "" : "none";
    }
  }
  </script>

  <script src="../Assets/js/script.js"></script>
</body>
</html>
