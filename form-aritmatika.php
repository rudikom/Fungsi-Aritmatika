<!DOCTYPE html>
<html>
<head>
	<title>FUNGSI ARITMATIKA</title>
</head>
<link href="stye.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-1.12.4.js"
			  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
			  crossorigin="anonymous"></script>
<script type="text/javascript" src="js/jquery.number.js"></script>
	<script src="http://code.responsivevoice.org/responsivevoice.js"></script>
<body>

	<h2>FUNGSI ARITMATIKA</h2>
	<form action="" method="POST">
		<table border="0">
			<tr>
				<td>Number 1</td>
				<td>:</td>
				<td><input type="text" name="angka1" id="angka1" value="<?php echo isset($_POST['angka1']) ? $_POST['angka1'] : '';?>"  placeholder="0"></td>
			</tr>
			<tr>
				<td>Number 2</td>
				<td>:</td>
				<td><input type="text" name="angka2" id="angka2"  value="<?php echo isset($_POST['angka2']) ? $_POST['angka2'] : '';?>"  placeholder="0"></td>
			</tr>
			<tr>
				<td>Operator</td>
				<td>:</td>
				<td>
					<select name="aritmatika">
						<option value="1">Penjumlahan</option>
						<option value="2">Pengurangan</option>
						<option value="3">Perkalian</option>
						<option value="4">Pembagian</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Proses"></td>

			</tr>
		</table>
	</form>
	<script type="text/javascript">
	$(function() {
		$("#angka1, #angka2").number(true);
	})
</script>


<?php
	error_reporting(0);
	include "function/aritmatika.php";
	include "function/konversi.php";

	$angka1 = 0;
	$angka2 = 0;
	$hasil  = 0;
	$terbilang = "";

	if (isset($_POST['submit'])) {
		$angka1 = str_replace(",","",@$_POST['angka1']);
		$angka2 = str_replace(",","",@$_POST['angka2']);
		$aritmatika = @$_POST['aritmatika'];

		if ($aritmatika == 1) {
			$hasil = penjumlahan($angka1, $angka2);
			$suara="penjumlahan";
			echo "Hasil Penjumlahan : " . $hasil;

			} elseif ($aritmatika == 2) {
			$suara="pengurangan";
			$hasil = pengurangan($angka1, $angka2);

			echo "Hasil Pengurangan : " . $hasil;
		} elseif ($aritmatika == 3) {
			$suara="perkalian";
			$hasil = perkalian($angka1, $angka2);
			echo "Hasil Perkalian : " . $hasil;
		} elseif ($aritmatika == 4) {
			$suara="pembagian";
			$hasil = pembagian($angka1, $angka2);
			echo "Hasil Pembagian : " . $hasil;
		} else {
			$hasil = 0;
			echo "Gagal...";
		}
	//	$voice="Hasil '.$aritmatika.''.$angka1.''dengan''.$angka2.''.adalah.''.$hasil";

		$terbilang =  "Hasil $suara antara ".terbilang($angka1)." dengan ".terbilang($angka2)." adalah ". terbilang($hasil);
		echo "<br>Terbilang : ".$terbilang;
	;

	}
?>

<script type="text/javascript">
	$(function(){
		responsiveVoice.speak("<?php echo $terbilang; ?>", 'Indonesian Male');
	})

</script>
</body>
</html>
