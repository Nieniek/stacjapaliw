<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stacje paliw</title>
    <link rel="stylesheet" href="stacja.css">
</head>
<body>
    <div class="lewo">
        <div class="logo">
            <img src="shell.jpg" alt="" width="350px" height="200px">
        </div>
    
        <p>Dostępne filtry:</p>
        
        
        <form method="GET" action="">

            <label for="stacja">Nazwa stacji</label>
            <input type="text" name="nazwa_stacji" placeholder="Wpisz nazwę stacji" id="stacja"><br><br>

            <label for="miasto">Miasta</label>
            <select name="miasto" class="miasta">
                <?php
                
                $db = new mysqli('localhost', 'root', '', 'stacja');

              
                if ($db->connect_error) {
                    die("Błąd połączenia: " . $db->connect_error);
                }

                
                $query = "SELECT DISTINCT miasto FROM adresy";
                $result = $db->query($query);

                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['miasto'] . "'>" . $row['miasto'] . "</option>";
                    }
                } else {
                    echo "<option value=''>Brak dostępnych miast</option>";
                }

              
                $result->close();
                ?>
            </select><br><br>

            <label for="minl">Minimalna cena za litr:</label>

            <input id="cenamin" name="cena_min" type="range" min="1.00" max="10.00" value="0.50" step="0.01" oninput="updateValue()">
            <p><span id="cm"></span> zł</p>

            <label for="maxl">Maksymalna cena za litr:</label>
            <input id="cenaminn" name="cena_max" type="range" min="1.00" max="10.00" value="10" step="0.01"   oninput="updateValuee()">
            <p><span id="cmm"></span> zł</p>

            <input type="reset" value="Resetuj">
            <input type="submit" value="Szukaj">

        </form>
    </div>

    <div class='srodek'>
    <?php
    if (isset($_GET['nazwa_stacji']) || isset($_GET['miasto']) || isset($_GET['cena_min']) || isset($_GET['cena_max'])) {
        $nazwa_stacji = $_GET['nazwa_stacji'];
        $miasto = $_GET['miasto'];
        $cena_min = $_GET['cena_min'];
        $cena_max = $_GET['cena_max'];

        $query_stacje = "SELECT sp.nazwa, a.miasto, a.ulica, a.numer, sp.cena_paliw 
                         FROM `stacje paliw` sp 
                         JOIN adresy a ON sp.adres = a.id
                         WHERE 1=1";

        if (!empty($nazwa_stacji)) {
            $query_stacje .= " AND sp.nazwa LIKE '%$nazwa_stacji%'";
        }
        if (!empty($miasto)) {
            $query_stacje .= " AND a.miasto = '$miasto'";
        }
        if (!empty($cena_min)) {
            $query_stacje .= " AND sp.cena_paliw >= $cena_min";
        }
        if (!empty($cena_max)) {
            $query_stacje .= " AND sp.cena_paliw <= $cena_max";
        }

        $result_stacje = $db->query($query_stacje);

        if ($result_stacje->num_rows > 0) {
            echo "<div class='cards'>";
            while ($row = $result_stacje->fetch_assoc()) {
                echo "<div class='card'>
                        <h3>" . $row['nazwa'] . "</h3>
                        <p>Miasto: " . $row['miasto'] . "</p>
                        <p>Ulica: " . $row['ulica'] . " " . $row['numer'] . "</p>
                        <p>Cena paliwa: " . $row['cena_paliw'] . " PLN</p>
                      </div>";
            }
            echo "</div>";
        } else {
            echo "<p>Brak wyników.</p>";
        }

        $result_stacje->close();
    }

    $db->close();
    ?>
    <script src="script.js"></script>
</div>
</body>
</html>
