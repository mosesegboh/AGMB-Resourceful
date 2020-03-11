
/*------------------------------------------------------
	Ifeoluwa's JavaScript 
-------------------------------------------------------*/

jQuery(document).ready(function($) {
	$(document.body).on('click', 'ul#menu-main_menu li.menu-item-has-children', function(e){
		var target = e.target;
		if($(target).is('A')){
			window.location.href = $(target).attr('href');
		}
		
	});

	$('#sendportionsID').progress();

	String.prototype.capitalize = function() {
	    return this.charAt(0).toUpperCase() + this.slice(1);
	}
	if($('.slick-slider').length > 0){
		$('.slick-slider').slick({
	
	responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        centerMode: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
  
});

$('#event-carousel').carousel();

	}

		//fix menu when passed
		/*$('#hero')
			.visibility({
				once: false,
				onBottomPassed: function() {
					$('.ui.fixed.menu').transition('fade in');
				},
				onBottomPassedReverse: function() {
					$('.ui.fixed.menu').transition('fade out');
				}
			})
		;
		
		$('#subheader')
			.visibility({
				once: false,
				onBottomPassed: function() {
					$('.fixed.menu').transition('fade in');
				},
				onBottomPassedReverse: function() {
					$('.fixed.menu').transition('fade out');
				}
			})
		;*/
		
		/*
//create sidebar and attach to menu open
		$('.ui.sidebar')
			.sidebar('attach events', '.toc.item')
		;
		
		//Featured Tabs
		$('.menu.tabs .item')
			.tab()
		;
		
*/
		//dropdown
		//console.log($('.dropdown, div.ui.selection.dropdown').length);
		//console.log($('.dropdown, div.ui.selection.dropdown').length);
		if($('.dropdown, div.ui.selection.dropdown').length > 0){
		$('.dropdown, div.ui.selection.dropdown')
		  .dropdown({
			  onChange: function(){
				  if($('div.field input[name=country]').val() != 'na'){
				   $('#error-message-country').fadeOut(500);
				   $('div.field input[name=country]').closest('div.field').removeClass('error');
				   }
				   if($('div.field input[name=gender]').val() != 'na'){  //Check if the country is selected
					   $('#error-message-gender').fadeOut(500);
					   $('div.field input[name=gender]').closest('div.field').removeClass('error');
					}
					
					if($('div.field input[name=currency]').val() != 'USD'){
						//console.log('working');
						$('table tbody tr td.dollars').css({
							'display' : 'none',
							'visibility' : 'hidden'
							});
						$('table tbody tr td.dollars input').val('');
						$('table tbody tr td.naira').css({
							'display': 'table-cell',
							'visibility' : 'visible'
						});
					}else{
						$('table tbody tr td.dollars').css({
							'display': 'table-cell',
							'visibility' : 'visible'
						});
						$('table tbody tr td.naira').css({
							'display' : 'none',
							'visibility' : 'hidden'
							});
						$('table tbody tr td.naira input').val('');
					 }
					  //console.log('working outter');
			  }
			});
		  }
		//TODO Hide all dropdowns on hover
		
		//dimmer
		if($('.role a').length > 0){
		$('.role a').hover(function() {
			$(this).dimmer('toggle')
		})
			
		;
		}
		//popup
		if($('.browse-popup').length > 0){
		$('.browse-popup')
			.popup({
				popup: '.projects.popup',
				hoverable: true
			})
		;
		}
		
		if($('.browse-popup2').length > 0){
		$('.browse-popup2')
			.popup({
				popup: '.projects.popup',
				hoverable: true,
				inline: false
			})
		;
		}
		
		if($('.toggle-popup').length > 0){
		$('.toggle-popup')
			.popup({
				popup: '.calls.popup',
				hoverable: true
			})
		;
		}
		// For GEMS Category
		if($('.special.cards .image').length > 0){
		$('.special.cards .image').dimmer({
		  on: 'hover'
		});
		}
		
		//For Gems Category fade in
		 /* Every time the window is scrolled ... */
    $(window).scroll( function(){
    
        /* Check the location of each desired element */
        $('.layout-effect').each( function(i,elem){
            //$(this).outerHeight()
            var bottom_of_object = $(this).offset().top + 50;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            ///console.log($('#diamond').outerHeight() +' '+$('#diamond').offset().top +' '+bottom_of_object+' '+bottom_of_window+ ' '+$(window).scrollTop() +' '+ $(window).height());
            /* If the object is completely visible in the window, fade it it */
            /*
if( bottom_of_window > bottom_of_object   && !$(this).hasClass('final') && !$(this).hasClass('final')){
                
                                });
*/
                //console.log($('#diamond').outerHeight() +' '+$('#diamond').offset().top +' '+bottom_of_object+' '+bottom_of_window+ ' '+$(window).scrollTop() +' '+ $(window).height());
                    
            //}
            
        }); 
    
    });
		//sliders
		if($('#hero-Slider').length > 0){
		$('#hero-Slider').glide({
			type: "slideshow",
			autoplay: 8000,
			afterInit: function(evt){
						var heroSlider = $('#hero-Slider');
								var glideSlide = heroSlider.find('.glide__slide');
									if (glideSlide.hasClass("active")) {
										caption = heroSlider.find('.glide__slide.active > .caption');
										caption.addClass("fadeInMovememnt");
										setTimeout(function(){
											caption.removeClass("fadeInMovememnt");
											caption.css('opacity', 1);
										}, 1000);
									}
								},
			beforeTransition: function(evt){
								var heroSlider = $('#hero-Slider');
								var glideSlide = heroSlider.find('.glide__slide');
									if (glideSlide.hasClass("active")) {
										caption = heroSlider.find('.glide__slide.active > .caption');
										caption.css('opacity', 0);
									}
								//console.log(heroSlider);
							},
			afterTransition: function(evt){
								var heroSlider = $('#hero-Slider');
								var glideSlide = heroSlider.find('.glide__slide');
									if (glideSlide.hasClass("active")) {
										caption = heroSlider.find('.glide__slide.active > .caption');
										caption.addClass("fadeInMovememnt");
										setTimeout(function(){
											caption.removeClass("fadeInMovememnt");
											caption.css('opacity', 1);
										}, 1000);
									}
								//console.log(heroSlider);
							},
		});
		}
		if($('#test-Slider').length > 0){
		$('#test-Slider').glide({
			type: "slideshow"
		});
		}
		if($('#freebie-Slider').length > 0){
		$('#freebie-Slider').glide({
			type: "carousel"
		});
		}
		
		//embeds
		if($('.ui.embed').length > 0){
			$('.ui.embed').embed();
		}
		//wow
		if(typeof WOW != 'undefined'){

			new WOW().init();
		}
		
		if($('.ui.fixed.menu').length > 0){
		$(window).scroll(function (event) {
	    var scroll = parseInt($(window).scrollTop());
	   	if(scroll > 135 && scroll < 1820){
	   		$(".ui.fixed.menu").fadeIn(600);
	   	}else{
	   		$(".ui.fixed.menu").fadeOut(600);
   		}
	});
		}
		
		$('.ui.card').hover(function(){
			var $this = $(this);
			var $thumb = $this.find('.thumb');
			if($thumb.hasClass("thumbOpened")){
				$thumb.removeClass("thumbOpened");
			}else{
				$thumb.addClass("thumbOpened");
			}
		});
		// form validation for gems sign up form
		function gemsFormValidationUi(){
		$('section.segment.gems form.ui.form')
		.form({
			on: 'click',
			fields: {
				surname: {
					identifier: 'surname',
					rules: [
						{
							type: 'empty',
							prompt: 'Please enter your surname'
						}
					]
				},
				firstname: {
					identifier: 'firstname',
					rules : [
						{
							type: 'empty',
							prompt: 'Please enter your firstname'
						}
					]
				},
				tel: {
					identifier : 'tel',
					rules : [
						{
							type: 'empty',
							prompt: 'Please enter your telephone number'
						}
					]
				},
				email: {
					identifier : 'email',
					rules : [
						{
							type: 'email',
							prompt: 'Please enter a valid email'
						}
					]
				},
				address: {
					identifier : 'address',
					rules : [
						{
							type: 'empty',
							prompt: 'Please enter your Contact Address'
						}
					]
				},
				diamond: {
					identifier : 'diamond',
					optional   : true,
					rules : [
						{
							type   : 'integer[78750..]',
							prompt: 'Please enter 50,000 and above'
						}
					]
				},
				sapphire: {
					identifier : 'sapphire',
					optional   : true,
					rules : [
						{
							type   : 'integer[39375..78749]',
							prompt: 'Sapphire amount is between 25,000 and 49,999'
						}
					]
				},
				aquamarine: {
					identifier : 'aquamarine',
					optional   : true,
					rules : [
						{
							type   : 'integer[15750..39374]',
							prompt: 'Aquamarine amount is between 10,000 and 24,999'
						}
					]
				},
				topaz: {
					identifier : 'topaz',
					optional   : true,
					rules : [
						{
							type   : 'integer[7875..15749]',
							prompt: 'Topaz amount is between 5,000 and 9,999'
						}
					]
				},
				moonstone: {
					identifier : 'moonstone',
					optional   : true,
					rules : [
						{
							type   : 'integer[1000..7874]',
							prompt: 'Moonstone amount is between 1,000 and 4,999'
						}
					]
				},
				diamond_dollar: {
					identifier : 'diamond_dollar',
					optional   : true,
					rules : [
						{
							type   : 'integer[250..]',
							prompt: 'Please enter $250 and above'
						}
					]
				},
				sapphire_dollar: {
					identifier : 'sapphire_dollar',
					optional   : true,
					rules : [
						{
							type   : 'integer[125..249]',
							prompt: 'Sapphire amount is between $125 and 249'
						}
					]
				},
				aquamarine_dollar: {
					identifier : 'aquamarine_dollar',
					optional   : true,
					rules : [
						{
							type   : 'integer[50..124]',
							prompt: 'Aquamarine amount is between $50 and $124'
						}
					]
				},
				topaz_dollar: {
					identifier : 'topaz_dollar',
					optional   : true,
					rules : [
						{
							type   : 'integer[25..49]',
							prompt: 'Topaz amount is between $25 and $49'
						}
					]
				},
				moonstone_dollar: {
					identifier : 'moonstone_dollar',
					optional   : true,
					rules : [
						{
							type   : 'integer[5..24]',
							prompt: 'Moonstone amount is between $5 and $24'
						}
					]
				}
				
			}
		});
		};
		
		function volunteerFormValidationUi(){
			$('section.segment#volunteerSection form')
			.form({
				fields: {
					fullname: {
					identifier: 'fullname',
					rules: [
						{
							type: 'empty',
							prompt: 'Please enter your fullname'
						}
						]
					},
					email: {
					identifier : 'email',
					rules : [
						{
							type: 'email',
							prompt: 'Please enter a valid email'
						}
						]
					},
					phonenumber: {
					identifier : 'empty',
					rules : [
						{
							type: 'empty',
							prompt: 'Please enter a phone number'
						}
						]
					}
				}
			});
		};

		// Creating an over over ecpn image category

		$('section#ecpn-content-wrapper div.ui.card .image').dimmer({
			    on: 'hover'
			  });

		//Giving Page Desktop

		$('section#ecpn-content-wrapper .ui.primary.button.bigger123').on('click', function(e){
				var $this = $(this);

				if($this.hasClass('second')){

					var imagewrapper = $this.closest('div.image');

				}else{

					var imagewrapper = $this.closest('div.extra.content').siblings('div.image');

				}
				var  imageSrc = $(imagewrapper.find('img.ui.wireframe.image').eq(0)).attr('src'),

					modalHeader = $(imagewrapper.siblings('div.main.content').find('a.header').eq(0)),

				 	category = modalHeader.text().trim(),

				 	categoryInput = modalHeader.data('category-header') == 'back to school' ? 'child '+modalHeader.data('category-header') : modalHeader.data('category-header'),

				 	categoryProduct = modalHeader.data('amount-per-product'),

				 	modal = $('div.ui.modal'),

				 	currencyWrapper = modal.find('div.currency-wrapper').eq(0),

					currencyRadioChecked = $(currencyWrapper.find('input[type=radio]:checked').eq(0));

					$(modal.find('form h5 span.currency-anchor').eq(0)).text(currencyRadioChecked.data('currency-symbol')+Math.ceil(categoryProduct));

					$(modal.find('form input[type=hidden][name=amount]').eq(0)).val(Math.ceil(categoryProduct));

				 	$(modal.find('div.header').eq(0)).text(category.toUpperCase()).attr('data-cat', categoryInput);

				 	$(modal.find('div.header').eq(0)).text(category.toUpperCase()).attr('data-per-product', categoryProduct);

				 	$(modal.find('.jumbotron p span.remaining-text').eq(0)).text('1 '+categoryInput);

				 	$(modal.find('div.image.content img.image').eq(0)).attr('src', imageSrc);

				 	modal.modal('setting', 'transition', 'drop')
        					.modal('show')

		});
		//$('.currency-wrapper.ui.radio.checkbox').checkbox();

		//Giving form for Mobile
		$('section#ecpn-content-wrapper .ui.primary.button').on('click', function(e){
				var $this = $(this);

				if($this.hasClass('second')){

					var imagewrapper = $this.closest('div.image');

				}else{

					var imagewrapper = $this.closest('div.extra.content').siblings('div.image');

				}
				var  imageSrc = $(imagewrapper.find('img.ui.wireframe.image').eq(0)).attr('src'),

					modalHeader = $(imagewrapper.siblings('div.main.content').find('a.header').eq(0)),

				 	category = modalHeader.text().trim(),

				 	categoryInput = modalHeader.data('category-header') == 'back to school' ? 'child '+modalHeader.data('category-header') : modalHeader.data('category-header'),

				 	categoryProduct = modalHeader.data('amount-per-product');

				 	if($this.hasClass('smaller')){
				 			modal = $('div.column.grid.mobile');
				 	}else{
				 			modal = $('div.ui.modal');
				 		
				 	}

				 	if(categoryInput.trim() == 'month meals'){

				 		pluralCatText = categoryInput.replace('month', 'months');

					}else if(categoryInput.trim() == 'needy family'){

						pluralCatText = categoryInput.replace('family', 'families');

					}else{

						pluralCatText = categoryInput+'s';
					}

				 	var currencyWrapper = modal.find('div.currency-wrapper').eq(0),

					currencyRadioChecked = $(currencyWrapper.find('input[type=radio]:checked').eq(0));

				 $(modal.find('.donation-amount .sq.other input[type=number]').eq(0)).val('');

					$(modal.find('form h5 span.currency-anchor').eq(0)).text(currencyRadioChecked.data('currency-symbol')+Math.ceil(categoryProduct));

					$(modal.find('form input[type=hidden][name=amount]').eq(0)).val(Math.ceil(categoryProduct));

				 	$(modal.find('div.header').eq(0)).text(category.toUpperCase());

				 	$(modal.find('div.jumbotron').eq(0)).attr('data-cat', categoryInput).attr('data-per-product', categoryProduct);

				 	$(modal.find('div.jumbotron .form-row h5.items-number').eq(0)).text('Number of '+pluralCatText.capitalize());

				 	$(modal.find('.jumbotron p span.remaining-text').eq(0)).text('1 '+categoryInput);

				 	$(modal.find('div.image.content img.image').eq(0)).attr('src', imageSrc);

				 	if(!$this.hasClass('smaller')){

					 	modal.modal('setting', 'transition', 'drop')
	        					.modal('show')

				 	}else{
				 		 divLoc = $('div.column.grid.mobile').offset();

			         		

			         		$('html, body').animate({scrollTop: (divLoc.top - 150)}, 'slow', function(){
			         			$('div.column.grid.mobile .jumbotron').fadeIn();
			         		});
				 	}

		});

		$('section#ecpn-content-wrapper .donation-amount .currency-wrapper input[type=radio]').on('click', function(e){
			$this = $(this),
					
			modal = $this.hasClass('mobile') == true ? $('div.column.grid.mobile') : $('div.ui.modal');

			currencyRadio($this, modal);

		});

		function convertAmount(qty, peramount, lastCurAmt, newCurAmt){

			return parseFloat((qty * (peramount / lastCurAmt)) * newCurAmt).toFixed(2);

		}

		function currencyRadio(radioInput, modal){
			var currencyHidden = radioInput.siblings('input[type=hidden]'),

			lastCur = $(currencyHidden).attr('data-last-currency'),

			inputNumber = $(radioInput.closest('div.currency-wrapper').siblings('.sq.other').find('input[type=number]').eq(0)).val(),

			qty = (isNaN(parseInt(inputNumber)) == true || parseInt(inputNumber) <= 0) ? 1 : parseInt(inputNumber),

			lastCurAmt = parseFloat($(currencyHidden).attr('data-last-digit')),

			peramount = $(modal.find('div.jumbotron').eq(0)).attr('data-per-product'),

			newCurAmt = parseFloat(radioInput.data('equivalent')),

			amount = convertAmount(qty, peramount, lastCurAmt, newCurAmt);

			$(modal.find('form h5 span.currency-anchor').eq(0)).text(radioInput.data('currency-symbol')+' '+amount);

			$(modal.find('form input[type=hidden][name=amount]').eq(0)).val(amount);

			$(modal.find('form input[type=hidden][name=currency]').eq(0)).val(radioInput.val());

			//console.log(Math.ceil(amount));
			$(currencyHidden).attr('data-last-digit', radioInput.data('equivalent'));

			$(currencyHidden).attr('data-last-currency', radioInput.val());

			$(modal.find('div.jumbotron').eq(0)).attr('data-per-product', (amount / qty));
		}

		$('div#content-anchor').on('click', function(e){
			$('div#contents').transition('fade right');
		});

		// Desktop View
		$('section#ecpn-content-wrapper .donation-amount input[type=number]').on('keyup', function(e){
					$this = $(this),
					currencyWrapper = $this.closest('.sq.other').prev('div.currency-wrapper'),
					//selectedCurrency = $(currencyWrapper).find('')
					modal = $this.hasClass('mobile') == true ? $('div.column.grid.mobile') : $('div.ui.modal');

					catText = $(modal.find('div.jumbotron').eq(0)).attr('data-cat');

					console.log(catText);

					if(isNaN(parseInt($this.val())) || parseInt($this.val()) <= 0){
						valInputed = 1;
						//$this.val(1);
					}else{
						valInputed = parseInt($this.val());
					}
					if(catText.trim() == 'month meals'){

						catFullText = valInputed == 1 ? valInputed+' '+catText : valInputed+' '+catText.replace('month', 'months');

					}else if(catText.trim() == 'needy family'){

						catFullText = valInputed == 1 ? valInputed+' '+catText : valInputed+' '+catText.replace('family', 'families');

					}else{

						catFullText = valInputed == 1 ? valInputed+' '+catText : valInputed+' '+catText+'s';
					}

					$(modal.find('.jumbotron p span.remaining-text').eq(0)).text(catFullText);

					radioSeleted = $(currencyWrapper.find('input[type=radio]:checked').eq(0));

					currencyRadio(radioSeleted, modal);


				});

		//Mobile View

		// $('section#ecpn-content-wrapper .mobile .donation-amount input[type=number]').on('keyup', function(e){
		// 			$this = $(this),
		// 			currencyWrapper = $this.closest('.sq.other').prev('div.currency-wrapper'),
		// 			//selectedCurrency = $(currencyWrapper).find('')
		// 			modal = $('div.ui.modal');

		// 			catText = $(modal.find('div.header').eq(0)).data('cat');

		// 			if(isNaN(parseInt($this.val())) || parseInt($this.val()) <= 0){
		// 				valInputed = 1;
		// 				//$this.val(1);
		// 			}else{
		// 				valInputed = parseInt($this.val());
		// 			}
		// 			if(catText.trim() == 'child back to school'){

		// 				catFullText = valInputed == 1 ? valInputed+' '+catText : valInputed+' '+catText.replace('child', 'children');

		// 			}else{

		// 				catFullText = valInputed == 1 ? valInputed+' '+catText : valInputed+' '+catText+'s';
		// 			}

		// 			$(modal.find('.jumbotron p span.remaining-text').eq(0)).text(catFullText);

		// 			radioSeleted = $(currencyWrapper.find('input[type=radio]:checked').eq(0));

		// 			currencyRadio(radioSeleted, modal);


		// 		});


		// $('section#ecpn-content-wrapper .modal')
		// 	  .modal('attach events', '.ui.primary.button', 'show')
		// 	;

		//$('#error-message').hide();
		/* Compulsory Input Check before submitting in volunteer's page */
		//function
		$('#submitted').on('click', function(event){
			var $count = 0;
			if($('#volunteer input:checkbox:checked').length == 0){//
				event.preventDefault();
				$('#error-message').slideDown(500);
				//console.log($.trim($('textarea#introduction').val()).length);
			}
			 if($('select#country').val() == 'na' || $('div.field input[name=country]').val() == 'na'){  //Check if the country is selected
				event.preventDefault();
				$('#error-message-country').fadeIn(500);
				$('div.field input[name=country]').closest('div.field').addClass('error');
				$count++;
			}
			if($('div.field input[name=gender]').val() == 'na'){  //Check if the country is selected
				event.preventDefault();
				$('#error-message-gender').fadeIn(500);
				$('div.field input[name=gender]').closest('div.field').addClass('error');
				$count++;
			}
			 if($('select#region').hasClass('member-active') || $('select#zone').hasClass('member-active')){//check if the user is a member
				if($('select#region').val() == 'na' || $('select#zone').val() == 'na'){ // Check if the member select region and zone
					event.preventDefault();
					$('#error-message-select-church').fadeIn(500);
					$('div#regions div.ui.search.dropdown').addClass('error');
					$('div#zones div.ui.search.dropdown').addClass('error');
					$count++;
				}
			}
			 if($.trim($('textarea#introduction').val()).length < 30){// Check if the introduction character is less than 30 Characters
					event.preventDefault();
					$('#error-message-textarea').fadeIn(500);
			}
			
			if($('select#referral').hasClass('member-active')){
				event.preventDefault();
				if($('select#referral').val() == 'na'){ // Check if the member select region and zone;
					$('#error-message-select-referral').fadeIn(500);
					$('div#referrals div.ui.search.dropdown').addClass('error');
					$count++;
				}                     
			}
			
			if($('tbody tr td input[type=text]').filter(function () { return $.trim($(this).val()).length == 0 }).length == 10 ){
				event.preventDefault();
				$('#error-message-blue-gems').slideDown(500);
				$('tbody tr td div.field').addClass('error-custom');
				$count++;
			}
			
			//console.log($('tbody tr td input[type=text]').filter(function () { return $.trim($(this).val()).length == 0 }).length);
			if($count == 0){
				//console.log($count);
				if($('section.segment.gems form.ui.form').length > 0){
					gemsFormValidationUi();
				}else{
					volunteerFormValidationUi();
					//event.preventDefault();	
				}
				//console.log($('section.segment#volunteerSection form').length);	
			}
			//console.log($count);
			
		});
		
		/*Turn off error notifiaction on error that has been cleared */
		$('#volunteer input:checkbox,'+
		 'select#country,'+
		  'select#zone,'+
		   'textarea#introduction,'+
		    'select#referral,'+
		     'tbody tr td input[type=text]').on('click keypress change', function(){
			    if($('select#referral').val() != 'na'){
				   $('#error-message-select-referral').fadeOut(500);
				   $('div#referrals div.ui.search.dropdown').removeClass('error');
			    }
			    if($.trim($('textarea#introduction').val()).length >= 30){
				   $('#error-message-textarea').fadeOut(500);
			    }
			    if($('select#zone').val() != 'na'){
				   $('#error-message-select-church').fadeOut(500);
				   $('div#regions div.ui.search.dropdown').removeClass('error');
					$('div#zones div.ui.search.dropdown').removeClass('error');
			    }
			    if($('select#country').val() != 'na'){
				  $('#error-message-select').fadeOut(500);
				   $('div#regions div.ui.search.dropdown').removeClass('error');
					$('div#zones div.ui.search.dropdown').removeClass('error');
			    }
			    if($('#volunteer input:checkbox:checked').length > 0){
				    $('#error-message').slideUp(500);
			    }
			    
			    if($('tbody tr td input[type=text]').filter(function () { return $.trim($(this).val()).length == 0 }).length < 10 ){
				$('#error-message-blue-gems').slideUp(500);
				$('tbody tr td div.field').removeClass('error-custom');
			}
		    });
		
		setTimeout(function(){
						$('div#general-errors').fadeOut(500);
					}, 10000);
		/* Change checkbox to text and vice versa in volunteer's page */
		
		$('#check-type').on('click', function(){
			if($('input#check-type:checkbox:checked').length == 1){
			 $('label#check-label').html('<input type="text" name="volunteer[]" placeholder="Please specify">');
			}else{
			$('label#check-label').html('Others');
			}
		});
		
		/* Check if the user is a member of Christ Embassy in Gems and volunteer's page*/
		// Let referral has member-active by default
		 $('select#referral').addClass('member-active');

		$('#member, .field.ui.slider.checkbox .member').on('click', function(){
			$this = $(this);
			memberClick();
		});
		/* Member monitor if clicked*/
		function memberClick(){
				if($('input.member:checkbox:checked').length == 1){
				$('input.member').val('yes');
				 $('div#regions').slideDown();
				 $('select#region').addClass('member-active');
				 $('div#zones').slideDown();
				 $('select#zone').addClass('member-active');
				 $('div#referrals').slideUp();
				 $('select#referral').removeClass('member-active');
			 	$('div#referrals div.ui.search.dropdown').removeClass('error');
				}else{
					$('input.member').val('no');
					$('div#regions').slideUp();
					$('select#region').removeClass('member-active');
					$('div#regions div.ui.search.dropdown').removeClass('error');
					$('div#zones').slideUp();
					// To check the validation of members
					$('select#zone').removeClass('member-active');
					$('div#zones div.ui.search.dropdown').removeClass('error');
	
					$('div#referrals').slideDown();
					$('select#referral').addClass('member-active');
				}
			}
		
		
		/* Ajax processing for Zones selected by region*/
		
		$('select#region').on('change', function(){
			var region_id = $('select#region option:selected').data('region');
			$.ajax({
				type: 'POST',
				url: ajaxurl,
				
				//action : 'report_callback',
				data: {
					'action' : 'retrieveZones',
					'region' : region_id
					},
				success: function(response){
				$('select#zone').html(response);
				}
			});
		});

		$('div.region select').on('change', function(){
			var $this = $(this),

			 region_id = $($this.find('option:selected').eq(0)).data('region'),

			 zone_options = $this.closest('div.region-wrapper').siblings('div.zone-wrapper').find('div.zone select').eq(0);

			$.ajax({
				type: 'POST',
				url: ajaxurl,
				
				//action : 'report_callback',
				data: {
					'action' : 'retrieveZones',
					'region' : region_id
					},
				success: function(response){
				$(zone_options).html(response);
				}
			});
		});
		
		
		/* Ajax processing for Newsletter Suscription*/
		
		$('button#news-submitted').on('click', function(){
			var email_address = $('input#email').val();
			//console.log(email_address);
			$.ajax({
				type: 'POST',
				url: ajaxurl,
				
				//action : 'report_callback',
				data: {
					'action' : 'mailSubscription',
					'emailAddress' : email_address
					},
				success: function(response){
				 if(response.trim() == 'success'){
					 $('#success-info').slideDown(600);
				 }else if(response.trim() == 'duplicate'){
					 $('#duplicate-info').slideDown(600);
				 }else{
					 $('#error-info').slideDown(600);
				 }
				}
			});
			
			setTimeout(function(){
				$('#success-info, #duplicate-info, #error-info').slideUp(600);
			}, 15000);
		});


		
		
		$('.donation-amount-row .currency-wrapper input[type=radio]').on('click', function(e){
			$this = $(this);
			if($this.val().trim() == 'EUR'){
				$('.donation-amount-row .sq').addClass('uk').removeClass('ng');
				if($('.form-horizontal #donate-btn').text().trim() != 'Donate'){
					if($('.donation-amount-row .sq.active-amount').hasClass('other')){
						$('.form-horizontal #donate-btn').text('£'+$('.donation-amount-row .sq.other input').val()+' - Donate');
					}else{
						$('.form-horizontal #donate-btn').text('£'+$('.donation-amount-row .sq.active-amount').data('amount-donate')+' - Donate');	
					}
				}
			}else if($this.val().trim() == 'NGN'){
				$('.donation-amount-row .sq').addClass('ng').removeClass('uk');
				if($('.form-horizontal #donate-btn').text().trim() != 'Donate'){
					if($('.donation-amount-row .sq.active-amount').hasClass('other')){
						$('.form-horizontal #donate-btn').text('₦'+$('.donation-amount-row .sq.other input').val()+' - Donate');
					}else{
						$('.form-horizontal #donate-btn').text('₦'+$('.donation-amount-row .sq.active-amount').data('amount-donate')+' - Donate');	
					}
				}
			}else{
				$('.donation-amount-row .sq').removeClass('uk').removeClass('ng');
				if($('.form-horizontal #donate-btn').text().trim() != 'Donate'){
					if($('.donation-amount-row .sq.active-amount').hasClass('other')){
						$('.form-horizontal #donate-btn').text('$'+$('.donation-amount-row .sq.other input').val()+' - Donate');
					}else{
						$('.form-horizontal #donate-btn').text('$'+$('.donation-amount-row .sq.active-amount').data('amount-donate')+' - Donate');
					}
				}
			}
			$('#currency').val($this.val().trim());
		});

		$('.donation-amount-row .sq').on('click', function(e){
			$this = $(this);
			$this.addClass('active-amount');
			$this.siblings('.sq').removeClass('active-amount');
			$('#amount').val($this.data('amount-donate'));
			if($('#currency').val().trim() == 'EUR'){
				$('.form-horizontal #donate-btn').text('£'+$this.data('amount-donate')+' - Donate');
			}else if($('#currency').val().trim() == 'NGN'){
				$('.form-horizontal #donate-btn').text('₦'+$this.data('amount-donate')+' - Donate');
			}else{
				$('.form-horizontal #donate-btn').text('$'+$this.data('amount-donate')+' - Donate');
			}
		});

		$('.donation-amount-row .sq.other').on('keyup click', function(e){
			$this = $(this);
			$value =$this.find('input').eq(0);
			$this.attr('data-amount-donate', $value.val());
			$('#amount').val($value.val());
			if($('#currency').val().trim() == 'EUR'){
				$('.form-horizontal #donate-btn').text('£'+$value.val()+' - Donate');
			}else if($('#currency').val().trim() == 'NGN'){
				$('.form-horizontal #donate-btn').text('₦'+$value.val()+' - Donate');
			}else{
				$('.form-horizontal #donate-btn').text('$'+$value.val()+' - Donate');
			}
		});

		$('form#bts').submit(function(e){
			if(parseFloat($('#amount').val()) <= 0 || $('#amount').val().trim() == ''){
				e.preventDefault();
			}
		})


		
});


