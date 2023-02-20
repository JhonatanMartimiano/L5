<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/monitoring.css">
	<link rel="stylesheet" href="assets/css/styles.css">
	<title>Monitoramento de Ramais</title>
	<link rel="icon" type="image/x-icon" href="assets/images/favicon.png">
</head>

<body>
	<div class="container">
		<h1 class="text-center">Painel de monitoramento de ramal</h1>
		<div class="row">
			<div class="col-12">
				<div class="row" id="cards"></div>
			</div>

			<div class="col-12 mt-5">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="available-tab" data-toggle="tab" data-target="#available" type="button" role="tab" aria-controls="available" aria-selected="true">Disponíveis</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="offline-tab" data-toggle="tab" data-target="#offline" type="button" role="tab" aria-controls="offline" aria-selected="false">Offline</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="calling-tab" data-toggle="tab" data-target="#calling" type="button" role="tab" aria-controls="calling" aria-selected="false">Chamando</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="occupied-tab" data-toggle="tab" data-target="#occupied" type="button" role="tab" aria-controls="occupied" aria-selected="false">Ocupado</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="paused-tab" data-toggle="tab" data-target="#paused" type="button" role="tab" aria-controls="paused" aria-selected="false">Pausado</button>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="available" role="tabpanel" aria-labelledby="available-tab">
						<div class="row"></div>
					</div>
					<div class="tab-pane fade" id="offline" role="tabpanel" aria-labelledby="offline-tab">
						<div class="row"></div>
					</div>
					<div class="tab-pane fade" id="calling" role="tabpanel" aria-labelledby="calling-tab">
						<div class="row"></div>
					</div>
					<div class="tab-pane fade" id="occupied" role="tabpanel" aria-labelledby="occupied-tab">
						<div class="row"></div>
					</div>
					<div class="tab-pane fade" id="paused" role="tabpanel" aria-labelledby="paused-tab">
						<div class="row"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="assets/js/axios.min.js"></script>
	<script src="assets/js/jquery-3.2.1.slim.min.js"></script>
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/monitoring.js"></script>

</body>

</html>