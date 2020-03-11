 // Custom file
 $(document).ready(function(){
 	if($('.datepicker').length > 0){
 		$(document.body).on('click','.datepicker', datepicker());
 	}

 	//Begining of Add and Delete Row

 	$('tfoot tr.actions button').on('click', function(e){
		e.preventDefault();
		$this = $(this);
		if($this.hasClass('btn-danger')){
			if($('tr.added-row').length > 1){
				$('tr.added-row').last().remove();
			}
		}else{
			$('tr.added-row')
				.last()
				.clone()
				.appendTo("tbody");
			$('tbody tr.added-row').filter(':last-child').find('input').val('');
		}

	});

 	// End of Add and Delete Row

	$('a.btn-submenu').on('click', function(e){
		e.preventDefault();
		$this = $(this);
		$this.closest('li').siblings('li.submenu').find('ul.nav').slideUp()
		$this.next('ul').slideToggle();
	});

	$('#flash-overlay-modal').modal();
	$('div.alert').not('.form-errors').delay(5000).slideUp(300);

	$("#modalStatus, #editModal, #transferModal, #editSliderModal, #deleteModal").on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);  // Button that triggered the modal
        var titleData = button.data('title');

        if(titleData.trim() == 'EDIT' || titleData.trim() == 'EDIT SLIDER' || titleData.trim() == 'TRANSFER'){
        	$(this).find('.modal-footer a').attr('href', button.data('url'));
        }else{
	        $(this).find('.modal-title').text(titleData);
	        $(this).find('.modal-body span.status').text(titleData);
	        $(this).find('form button').removeClass().addClass(button.data('class')).text(titleData);
	        $(this).find('form').attr('action', button.data('url'));
        }

    });

    $(document.body).on('click','.multiple-select-button', function(e){

    	var $this = $(this),
    		input = $this.find('input');


    	if($this.hasClass('active')){
    		$this.removeClass().addClass('multiple-select-button btn-submit disable-select');
    		input.attr("checked",false);
    	}else{
    		$this.removeClass().addClass('multiple-select-button disable-select btn-submit active');
    		input.attr("checked",true);
    	}
    });

    

	$(document.body).on('click','.single-select-button', function(e){

	var $this = $(this);

	$this.siblings('input[type=hidden]').val($this.find('input').val());

	allSingleSelectBtn = $this.siblings('.single-select-button');

	$.each(allSingleSelectBtn, function(index, elem){

		$(elem).removeClass().addClass('single-select-button disable-select btn-submit');

	});

	$this.removeClass().addClass('single-select-button disable-select btn-submit active');


  });

	$('.supervisor-select').on('change', function(e){
		$this = $(this);

	    $.ajax({
	        url: $this.data('href'),
	        headers: {'X-CSRF-TOKEN': $('meta[name=csrf_token]').attr('content')},
	        data: {
	            supervisor_id: $this.val()
	        },
	        type: 'POST',
	        datatype: 'JSON',
	        success: function (resp) {
	        	//console.log(resp.appraisee);
	            $('.appraisee-wrapper').html(resp.appraisee);
	        }
	    });
	});



	/** Beginning of jSignature **/
	var $sigdiv = $("#signature");

	if($sigdiv.length > 0){
	$sigdiv.jSignature();

	$('canvas.jSignature').css({
		'background-color' : '#eeeeee',
		'width' : '100%'
	});

	$('[data-action=reset]').on('click', function(){

			$sigdiv.jSignature("reset"); // clears the canvas and rerenders the decor on it.
	});

	//$sigdiv.jSignature('getData', 'base30')).appendTo($sigdiv);
	if($('form input[name=signature_png]').val() != ''){
		//var dispar
		$sigdiv.jSignature("setData", $('form input[name=signature_png]').val());
		console.log($('form input[name=signature_png]').val());
	}

	$('form button[type=submit]').on('click', function(e){
			//console.log($sigdiv.jSignature("getData", 'base30'));
			//$sigdiv.children("img.imported").remove();
			//$("<img class='imported'></img>").attr("src",$sigdiv.jSignature('getData', 'base30')).appendTo($sigdiv);
			 $('form input[name=signature_png]').val($sigdiv.jSignature('getData'));

			 $('form.signature').submit();

	});

	} 
	// End of jSignature

 });