<?php
class TransporteurSalaries {
    public $conn;

    public function getSalaries() {
        $stmt = $this->conn->prepare("SELECT carrierid, SUM(package) as totalpackage, SUM(price) as totalprice, SUM(deliveryprice) as totaldeliveryprice FROM packagedelivery GROUP BY carrierid");
        $stmt->execute();
        $result = $stmt->fetchAll();

        if (count($result) > 0) {
            echo "<table><tr><th>Koerier ID</th><th>totaal pakketten</th><th>Totaal Prijs</th><th>Totaal Bezorgkosten</th><th>Salaris</th></tr>";
            foreach ($result as $row) {
                $salary = $row["totalprice"] + ($row["totaldeliveryprice"] * 0.8);
                echo "<tr><td>" . $row["carrierid"]. "</td><td>" . $row["totalpackage"]. "</td><td>" . $row["totalprice"]. "</td><td>" . $row["totaldeliveryprice"] . "</td><td>" . $salary . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }
}

$transporteurSalaries = new TransporteurSalaries("localhost", "root", "password", "db");
$transporteurSalaries->getSalaries();