/*var styles = [
    'background: linear-gradient(#D33106, #571402)'
    , 'border: 1px solid #3E0E02'
    , 'color: white'
    , 'display: block'
    , 'text-shadow: 0 1px 0 rgba(0, 0, 0, 0.3)'
    , 'box-shadow: 0 1px 0 rgba(255, 255, 255, 0.4) inset, 0 5px 3px -5px rgba(0, 0, 0, 0.5), 0 -13px 5px -10px rgba(255, 255, 255, 0.4) inset'
    , 'line-height: 40px'
    , 'text-align: center'
    , 'font-weight: bold'
].join(';');

console.log('%c a spicy log message ?', styles);*/
// console.meme("ITvenidos a", "BienFLOSS", "10 Guy", 300, 300);

jQuery.fn.existe = function(callback) {var args = [].slice.call(arguments, 1); if (this.length) {callback.call(this, args); } return this; };

jQuery(function($){

	var btn_i 		= $('.btn-inscricipcion'),
		sesion		= $('.btn-iniciar-sesion'),
		modal		= $('#inscripcion'),
		msesion		= $('#msesion'),
		clase_nueva = 'ion-android-sync spin-icono',
		clase_vieja = 'ion-pin';


	// Si existe la clase de iniciar sesión lanzamos msesio y salimos
	sesion.existe(function(){
		sesion.on('click', function(e){
			e.preventDefault();
			// Iniciar el modal en el DIV msesion
			msesion.iziModal({
			    title: 'Para inscribirte necesitas iniciar sesión.',
			    subtitle: '',
			    headerColor: '#d68736',
			});
			msesion.iziModal('open');
			
		});
	});

	// Si se puede inscribir salimos con esto
	btn_i.existe(function(){

		btn_i.on('click', function(e){
			
			var esto 	= $(this), 
				id_ev 	= esto.data('id'),
				tag_i 	= esto.find('i');
				e.preventDefault();

			if (esto.data('estaCorriendo')) {
				return;
			}

			esto.data('estaCorriendo', true);
			tag_i.removeClass().addClass(clase_nueva);

			// Iniciar el modal en el DIV modal
			modal.iziModal({
			    overlayClose: false,
			    title: 'Inscripción',
			    subtitle: 'Por favor completa los siguientes datos',
			    headerColor: '#d68736',
			});
			modal.iziModal('open');


			$('#form-enteraste').on('submit', function(e){
				
				e.preventDefault();
				var esto 	= $('.inscribirme');
				//id_ev 	= esto.data('id');

				esto.removeClass("inscribirme").find('i').addClass(clase_nueva);

				$.ajax({
					type: "POST",
					url: "/wp-admin/admin-ajax.php",
					data: $("#form-enteraste").serialize(),
					dataType: "json",
					success: function(data) {
						esto.data('estaCorriendo', false);
						$('#inscripcion').iziModal('close');
						location.reload();
					},
					complete: function() {
						esto.prop('disabled', false);
						$('#inscripcion').iziModal('close');
						location.reload();
					}
				});

			});

		});

	});
	

	

});