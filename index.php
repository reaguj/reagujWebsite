<?php

	require_once "const/connect.php";

	$connect = mysqli_connect($host,$db_user,$db_password,$db_name);

	if($connect->connect_errno!=0)
	{
		echo "Error: ".$connect->connect_errno;
	}
	mysqli_query($connect, "SET CHARSET utf8");
	mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
  mysqli_select_db($connect, $db_name);

	$query="SELECT * FROM posty ORDER BY id DESC LIMIT 1";

	$result = mysqli_query($connect, $query);

	$postsNumber=mysqli_num_rows($result);

	if($postsNumber>=1)
	{
		$row= mysqli_fetch_assoc($result);
		$title= $row['Title'];
		$content=$row['Content'];
		$img = $row['imgFileName'];

		$result->close();
		$connect->close();
	}
?>

<!DOCTYPE HTML>
<html lang="pl">

<head>

	<?php
		require "const/scripts.php";
	?>
	<meta charset="utf-8"/>
	<title>Strona główna - #reaguj</title>

	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/Home.css">
	<link rel="stylesheet" href="css/scrollbar.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&amp;subset=latin-ext" rel="stylesheet">

	<meta name="description" content="Aktualności dotyczące naszej kampanii. Tutaj dowiesz się co się u nas dzieje ;)" />
	<meta name="keywords" content="pierwsza pomoc, aktualności, newsy,#reaguj" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="img/favicon.png">

</head>

<body>

	<?php
	  require "const/nav.php";
	 ?>
	<div id="Slides">
			<div class="slide" id="WelcomeSlide">
				<img src="img/home/welcomeScreen.jpg" id="Background"/>
				<div Class="Content">

					<div class="crop"><img src="img/common/pulse2.svg" id="HeartLineArt"/></div>
					<div class="MainTitle">
						Reaguj razem z nami!
					</div>
					<div class="TextContent">
						Nasz projekt powstał, aby zwrócić uwagę Polaków na problem tak zwanej znieczulicy, o której coraz częściej się słyszy w mediach. Poprzez serię filmów, grafik i prelekcji mamy na celu poprawić wiedzę polaków w zakresie świadomości na temat pierwszej pomocy.
					</div>
				</div>
			</div>
			<div class="slide" id="YtSlide">
				<div class="slideTitle"><span class="underline">Zobacz jak #reagować</span></div>
				<div class="flexContainer flexInsideSlide">
					<div Class="textContainer Red">Nie lękajmy się pomagać innym. To nie jest wcale skomplikowane, a może uratować czyjeś życie. Film obok pokazuje prawidłowo Resuscytacje Krążeniowo oddechową, jedną z podstawowych akcji przy udzielaniu pierwszej pomocy przedmedycznej, osobom które nie oddychają, ani nie zachodzi akcja bicia serca.</div>
					<iframe class="ytVideo" width="1120" src="https://www.youtube.com/embed/xvIO9t0MxIM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="slide" id="InfoSlide">
				<div class="slideTitle"><span class="underline">Dlaczego to takie ważne?</span></div>
				<div class="flexContainer flexInsideSlide">
					<div class="InfoRectangle Red">
							<div class="Content">
								<img src="img/common/icon-help-returns.svg" alt=";-;" class="InfoRectangleImg">
								<div class="RectangleTitle">Pomoc wraca</div>
								<div class="RectangleTextContent">Warto pomagać innym. Każdy z nas może znależć się w potrzebie i będziemy oczekiwać pomocy od reszty społeczeństwa. Zawsze możemy liczyć na większą pomoc jeśli zostaniemy dobrze zapamiętani przez innych.</div>
							</div>
						</div>
					<div Class="Blue InfoRectangle">
							<div class="Content">
								<img src="img/common/icon-satisfaction.svg" alt=";-;" class="InfoRectangleImg">
								<div class="RectangleTitle">Daje niezwykłą satysfakcje</div>
								<div class="RectangleTextContent">Każdy z nas na pewno był z siebie dumny kiedy udało mu się osiągnąć cel nad którym bardzo długo pracowaliśmy. Można sobie tylko wyobrazić jak będziemy zadowoleni, kiedy uratujemy komuś życie, największą wartość każdego z nas.</div>
							</div>
						</div>
					<div class="Green InfoRectangle">
							<div class="Content">
								<img src="img/common/icon-safe-world.svg" alt=";-;" class="InfoRectangleImg">
								<div class="RectangleTitle">Sprawia świat bezpieczniejszym</div>
								<div class="RectangleTextContent">Chcemy żyć w lepszym świecie, a żeby to osiągnąć musimy zacząć działać. Będziemy czuć się dużo lepiej kiedy będziemy wiedzieć, że w raie czego możemy liczyć na pomoc innych osób. Będziemy żyć w bezpieczniejszym świecie, a wszystko dzięki waszemu zaangażowaniu. </div>
							</div>
						</div>
				</div>
			</div>
			<div class="slide" id="NewsSlide">
				<div class="slideTitle"><span class="underline">Najnowsze aktualności</span></div>
				<div Class="Content Blue">
					<?php
						echo '<img src="img/blog/'.$img.'" alt=";-;"/>';
					?>
					<div class="RectangleTitle"><span class="underline">
						<?php
							echo $title;
						?>
					</span></div>
					<div class="content">
						<div class="RectangleTextContent">
							<?php
								echo $content;
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="slide" id="EpidemyArticleSlide">
				<div class="slideTitle"><span class="underline">Epidemia znieczulicy</span></div>
				<div class="flexContainer flexInsideSlide">
					<span class="EpidemyTextContent">
						Bardzo duża ilość osób nie pomaga innym w potrzebie. Często wynika to z tak zwanej "znieczulicy". Ludzie często omijają potrzebujących szerokim łukiem. Spowodowane jest to m.in. brakiem znajomości podstawowych zasad pierwszej pomocy, bądź brakiem pewności siebie. Naszym celem jest walka z takim zachowaniem, dlatego przedstawiane przez nas treści będą starały się zwiększyć pewność siebie naszych odbiorców, i przekażą podstawową wiedzę na temat przeprowadzania pierwszej pomocy przedmedycznej.					</span>
					<div class="RectangularSideBar">
						Nie bądź obojętny gdy inni wymagają twojej pomocy, bo i ty możesz kiedyś jej wymagać.
					</div>
				</div>
			</div>
	</div>
<?php
	require "const/footer.php"
 ?>

</body>

</html>
