<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-Test PKL</title>
</head>
<body>
    <h2>Tugas 1(Aritmatika)</h2>
    <legend>Bagian 1</legend>
    
    <?php
        $a = 1;
        $b = 3;

        $bagian1 = $a + $b;
        $bagian2 = $a - $b;
        $bagian3 = $a * $b;

        
    ?>
    <p><b>Output</b></p>
    <p><?php echo $bagian1; ?></p>
    <p><?php echo $bagian2; ?></p>
    <p><?php echo $bagian3; ?></p>
    
    <legend>Bagian 2</legend>
    <form action="#tugas1" method="post" id="tugas1">
        <h3>Input</h3>
        <p>Angka 1</p>
        <input type="number" name="angka1" id="" min=1 max="10000"><br>
        <p>Angka 2</p>
        <input type="number" name="angka2" id="" min=1 max="10000"><br><br>
        <button type="submit" name="submit">Simpan</button>
    </form>
    <?php
        if(isset($_POST['submit'])){
            $a = $_POST['angka1'];
            $b = $_POST['angka2'];
            
            $bagian1 = $a + $b;
            $bagian2 = $a - $b;
            $bagian3 = $a * $b;
            ?>
            <p><b>Output</b></p>
            <p><?php echo $bagian1; ?></p>
            <p><?php echo $bagian2; ?></p>
            <p><?php echo $bagian3; ?></p>

            <?php
        }
    ?>
    <hr>
    <h2>Tugas 2(IF Else)</h2>
    <?php
    echo "<h3>Dummy</h3>";
    $n = 21;
    echo " bilangan : " . $n . "<br>";
    $text = null;
    if($n % 2 != 0){
        $text = "Weird";
    } elseif($n % 2 == 0 && $n <= 5){
        $text = "Not Weird";
    } elseif($n % 2 == 0 && $n <= 20 && $n >= 6){
        $text = "Weird";
    } elseif($n % 2 == 0 && $n >= 20){
        $text = "Not Weird";
    }

    echo "Output : " . $text;

    ?>
    <form action="#tugas2" method="post" id="tugas2">
        <h3>Input</h3>
        <input type="number" name="angka" id="" min="1" max="100">
        <button type="submit" name="simpan">Submit</button>
    </form>
    <?php

        if(isset($_POST['simpan'])){
            $angka = $_POST['angka'];
            if($angka % 2 != 0){
                $text = "Weird";
            } elseif($angka % 2 == 0 && $angka <= 5){
                $text = "Not Weird";
            } elseif($angka % 2 == 0 && $angka <= 20 && $angka >= 6){
                $text = "Weird";
            } elseif($angka % 2 == 0 && $angka >= 20){
                $text = "Not Weird";
            }
            echo "Bilangan Input : " . $angka . "<br>";
            echo "Output : " . $text;
        }
    ?>

    <hr>
    <h2>Tugas 3(Loop)</h2>
    <form action="#loop" method="post" id="loop">
        <h3>Input</h3>
        <input type="text" name="angka" id="" min="1" max="20">
        <button type="submit" name="save">Submit</button>
    </form>
    <?php
    if(isset($_POST['save'])){
        $angkaA = $_POST['angka'];
        echo "<b>Output</b><br>";
        for ($i = 0; $i < $angkaA; $i++) { 
            $a = $i * $i;
            echo "$a<br>";
        }
    }

    ?>
</body>
</html>