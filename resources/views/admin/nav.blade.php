			<div class="container-fluid header-main bg-header-main">
			
				<div class="nav-container">
				
					<div>
						{!! HTML::image('assets/images/logo_new.png', 'a picture', array('class' => 'logo-admin pull-left')) !!}
					</div>
				
					@if( !empty($viewshare["welcome"]) )
					<ul class="nav pull-left">
						<li class="pull-left">
							{!! HTML::link('admin/contend', 'Secciones', array('class' => 'btn btn-default', 'role' => 'button')) !!}
						</li>

						<li class="pull-left">
							{!! HTML::link('admin/slider', 'Slider', array('class' => 'btn btn-default', 'role' => 'button')) !!}
						</li>
						
						<li class="pull-left">
							{!! HTML::link('admin/shop', 'Tienda', array('class' => 'btn btn-default', 'role' => 'button')) !!}
						</li>

						<li class="pull-left">
							{!! HTML::link('admin/shop/purchases', 'Ordenes', array('class' => 'btn btn-default', 'role' => 'button')) !!}
						</li>
					</ul>
									
					
					<div class="session-close pull-right">
						<h4 class="pull-left">Bienvenido: {{ $viewshare["welcome"] or '' }}</h4>
						{!! HTML::link('logout', 'Salir', array('class' => 'btn btn-default btn-logout', 'role' => 'button')) !!}
					</div>
					@endif
					<div class="clear"></div>
					
				</div>
			</div>
			
			