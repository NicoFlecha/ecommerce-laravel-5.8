<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<!-- Footer -->
		<footer class="pt-5 pb-4" id="contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 mt-2 mb-4">
						<h5 class="mb-4 font-weight-bold">SOBRE NOSOTROS</h5>
						<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<ul class="f-address">
							<li>
								<div class="row">
									<div class="col-1"><i class="fas fa-map-marker"></i></div>
									<div class="col-10">
  										<h6 class="font-weight-bold mb-0">Dirección</h6>
										<p>Calle Falsa 123, Buenos Aires, Argentina</p>
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="col-1"><i class="far fa-envelope"></i></div>
									<div class="col-10">
										<h6 class="font-weight-bold mb-0">¿Tienes preguntas? ¡CONTÁCTANOS!</h6>
										<p><a href="#">cosme@cosme.com</a></p>
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="col-1"><i class="fas fa-phone-volume"></i></div>
									<div class="col-10">
										<h6 class="font-weight-bold mb-0">Teléfono:</h6>
										<p><a href="#">+54 1199999999</a></p>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 mt-2 mb-4">
						<h5 class="mb-4 font-weight-bold">¡SUSCRÍBETE A NUESTRO NEWSLETTER!</h5>
							<form class="" action="/" method="post">
								{{ csrf_field() }}
								<div class="input-group">
						  	  <input type="text" name="emailAEnviar" class="form-control" placeholder="Ingrese su e-mail">
						  	  <button class="input-group-addon" id="basic-addon2"><i class="fas fa-check"></i></button>
							  </div>
								@error ('emailAEnviar')
									{{$message}}<br>
								@enderror
							</form>
						<ul class="social-pet mt-4">
							<li><a href="#" title="facebook"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" title="twitter"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" title="linkedin"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" title="instagram"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<!-- Copyright -->
		<section class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-md-12 ">
						<div class="text-center text-white">
              <div class="legales">
                  <i class="fas fa-fire"></i> Fueguito™
                </div>
                <p>Todos los derechos reservados, Año 2019</p>
						</div>
					</div>
				</div>
			</div>
		</section>
