/*
Author       : Dreamguys
Template Name: Kofejob - Bootstrap Template
Version      : 1.0
*/

(function($) {
    "use strict";

	var $slimScrolls = $('.slimscroll');
	
	// Stick Sidebar
	
	if ($(window).width() > 767) {
		if($('.theiaStickySidebar').length > 0) {
			$('.theiaStickySidebar').theiaStickySidebar({
			  // Settings
			  additionalMarginTop: 70
			});
		}
	}
	  
	// Search Bar

	$(document).on('click', '.searchbar .feather-search', function() {
		$(".togglesearch").slideToggle();
		$(".top-search").focus();
	});
	
	// Loader
	
	setTimeout(function () {
		$('#global-loader');
		setTimeout(function () {
			$("#global-loader").fadeOut("slow");
		}, 100);
	}, 500);
	
	// Sidebar
	
	if($(window).width() <= 991){
	var Sidemenu = function() {
		this.$menuItem = $('.main-nav a');
	};
	
	function init() {
		var $this = Sidemenu;
		$('.main-nav a').on('click', function(e) {
			if($(this).parent().hasClass('has-submenu')) {
				e.preventDefault();
			}
			if(!$(this).hasClass('submenu')) {
				$('ul', $(this).parents('ul:first')).slideUp(350);
				$('a', $(this).parents('ul:first')).removeClass('submenu');
				$(this).next('ul').slideDown(350);
				$(this).addClass('submenu');
			} else if($(this).hasClass('submenu')) {
				$(this).removeClass('submenu');
				$(this).next('ul').slideUp(350);
			}
		});
	}

	// Sidebar Initiate
	init();
	}

	var Sidemenu = function () {
		this.$menuItem = $('#sidebar-menu a');
	};

	function initi() {
		var $this = Sidemenu;
		$('#sidebar-menu a').on('click', function (e) {
			if ($(this).parent().hasClass('submenu')) {
				e.preventDefault();
			}
			if (!$(this).hasClass('subdrop')) {
				$('ul', $(this).parents('ul:first')).slideUp(350);
				$('a', $(this).parents('ul:first')).removeClass('subdrop');
				$(this).next('ul').slideDown(350);
				$(this).addClass('subdrop');
			} else if ($(this).hasClass('subdrop')) {
				$(this).removeClass('subdrop');
				$(this).next('ul').slideUp(350);
			}
		});
		$('#sidebar-menu ul li.submenu a.active').parents('li:last').children('a:first').addClass('active').trigger('click');
	}

	// Sidebar Initiate
	initi();
	
	// JQuery counterUp

	if($('.course-count .counter-up').length > 0) {
		$('.course-count .counter-up').counterUp({
            delay: 15,
            time: 1500
        });
	}

	$(document).ready(function(){
		$(".close-add").click(function(){
		  $(".top-header").hide();
		});
	});
	
	//Home slider
	if($('.dot-slider').length > 0) {
		$('.dot-slider').slick({
			dots: true,
			autoplay:false,
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			swipe: false,
			touchMove: false,
			vertical: true,
			verticalScrolling: true,
			speed: 1000,
			autoplaySpeed: 2000,
			useTransform: true,
			responsive: [{
				breakpoint: 992,
					settings: {
						slidesToShow: 1
				  	}
			},
			{
				breakpoint: 800,
					settings: {
						slidesToShow: 1
				  	}
			},
			{
				breakpoint: 776,
					settings: {
						slidesToShow: 1
				  	}
			},
			{
				breakpoint: 567,
					settings: {
						slidesToShow: 1
					}
			}]
		});
	}
	
	// Textarea Text Count
	
	var maxLength = 100;
	$('#review_desc').on('keyup change', function () {
		var length = $(this).val().length;
		 length = maxLength-length;
		$('#chars').text(length);
	});
	
	// Fav-btn
	
	$('.freelance-widget .favourite').on('click', function () {
      	$(this).toggleClass('color-active');
    });
	$('.project-item-feature .favourite').on('click', function () {
      	$(this).toggleClass('three-active');
    });
	$('.free-two .favourite').on('click', function () {
      	$(this).toggleClass('blue-active');
    });
	$('.hired-developers-img-content .favourite').on('click', function () {
		$(this).toggleClass('blue-active');
  });
	
	// Select 2
	
	if($('.select').length > 0) {
		$('.select').select2({
			minimumResultsForSearch: -1,
			width: '100%'
		});
	}
	
	// Date Time Picker
	
	if($('.datetimepicker').length > 0) {
		$('.datetimepicker').datetimepicker({
			format: 'DD/MM/YYYY',
			icons: {
				up: "fas fa-chevron-up",
				down: "fas fa-chevron-down",
				next: 'fas fa-chevron-right',
				previous: 'fas fa-chevron-left'
			}
		});
	}
	if($('.timepicker').length > 0) {
		$('.timepicker').datetimepicker({
			format: 'HH:MM',
			icons: {
				up: "fas fa-chevron-up",
				down: "fas fa-chevron-down",
				next: 'fas fa-chevron-right',
				previous: 'fas fa-chevron-left'
			}
		});
	}

	setTimeout(function () {
		if($('.datetimepicker').length > 0) {
			$('.datetimepicker').datetimepicker({
				format: 'DD/MM/YYYY',
				icons: {
					up: "fas fa-chevron-up",
					down: "fas fa-chevron-down",
					next: 'fas fa-chevron-right',
					previous: 'fas fa-chevron-left'
				}
			});
		}
	}, 500);
	
	// Floating Label

	if($('.floating').length > 0 ){
		$('.floating').on('focus blur', function (e) {
		$(this).parents('.form-focus').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
		}).trigger('blur');
	}
	
	// Mobile menu sidebar overlay
	
	$('body').append('<div class="sidebar-overlay"></div>');
	$(document).on('click', '#mobile_btn', function() {
		$('main-wrapper').toggleClass('slide-nav');
		$('.sidebar-overlay').toggleClass('opened');
		$('html').addClass('menu-opened');
		return false;
	});
	
	$(document).on('click', '.sidebar-overlay', function() {
		$('html').removeClass('menu-opened');
		$(this).removeClass('opened');
		$('main-wrapper').removeClass('slide-nav');
	});
	
	$(document).on('click', '#menu_close', function() {
		$('html').removeClass('menu-opened');
		$('.sidebar-overlay').removeClass('opened');
		$('main-wrapper').removeClass('slide-nav');
	});
	
	// Tooltip
	
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
	  return new bootstrap.Tooltip(tooltipTriggerEl)
	})
	
	// Circle Progress Bar
	
	function animateElements() {
		$('.circle-bar1').each(function () {
			var elementPos = $(this).offset().top;
			var topOfWindow = $(window).scrollTop();
			var percent = $(this).find('.circle-graph1').attr('data-percent');
			var animate = $(this).data('animate');
			if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
				$(this).data('animate', true);
				$(this).find('.circle-graph1').circleProgress({
					value: percent / 100,
					size : 400,
					thickness: 40,
					startAngle: 1.5,
					fill: {
						color: '#19D1AF'
					}
				});
			}
		});
	}	
	
	if($('.circle-bar').length > 0) {
		animateElements();
	}
	$(window).scroll(animateElements);
	
	$(document).ready(function () {
	let progressVal = 0;
	let businessType = 0;
		/*---------------------------------------------------------*/
		$(".next_btn").click(function () { // Function Runs On NEXT Button Click
		
			$(this).parent().parent().next().fadeIn('slow');
			$(this).parent().parent().css({
				'display': 'none'
			});
			
			if(progressVal == 0) {
				$('.acc-title-02').show();
				$('.progress-25').hide();
				$('.progress-50').show();
			}
			else if(progressVal == 1) {
				$('.acc-title-03').show();
				$('.progress-50').hide();
				$('.progress-75').show();
				
				
				$('#individual').hide();
				$('#partnership').hide();
				$('#society').hide();
				$('#proprietorship').hide();
				$('#privateltd').hide();
				
				if($('#business-type').val() == "Individual") {
					$('#individual').show();
					businessType=1;
				}
				else if($('#business-type').val() == "Partnership/LLP") {
					$('#partnership').show();
					businessType=2;
				}
				else if($('#business-type').val() == "Society/Trust/Club/NGO") {
					$('#society').show();
					businessType=3;
				}
				else if($('#business-type').val() == "Proprietorship") {
					$('#proprietorship').show();
					businessType=4;
				}
				else if($('#business-type').val() == "Private Ltd/Public Ltd") {
					$('#privateltd').show();
					businessType=5;
				}
			}
			else if(progressVal == 2) {
				$('.acc-title-04').show();
				$('.progress-75').hide();
				$('.progress-100').show();
				
				$('#individual-doc').hide();
				$('#partnership-doc').hide();
				$('#society-doc').hide();
				$('#proprietorship-doc').hide();
				$('#privateltd-doc').hide();
				
				if(businessType == 1)
				{
					$('#individual-doc').show();
				}else if(businessType == 2)
				{
					$('#partnership-doc').show();
				}else if(businessType == 3)
				{
					$('#society-doc').show();
				}else if(businessType == 4)
				{
					$('#proprietorship-doc').show();
				}else if(businessType == 5)
				{
					$('#privateltd-doc').show();
				}
			}
			else if(progressVal == 3) {
				$('.acc-title-05').show();
				$('.circle-percent-75').hide();
				$('.circle-percent-100').show();
			}
			progressVal = progressVal + 1;
			$('.progress-active').removeClass('progress-active').addClass('progress-activated').next().addClass('progress-active'); 
			

		});
		$(".prev_btn").click(function () { // Function Runs On PREVIOUS Button Click
			$(this).parent().parent().prev().fadeIn('slow');
			$(this).parent().parent().css({
				'display': 'none'
			});
			
			$('.acc-title-01').hide();
			$('.acc-title-02').hide();
			$('.acc-title-03').hide();
			$('.acc-title-04').hide();
			$('.acc-title-05').hide();
			
			progressVal = progressVal - 1;
			
			if(progressVal == 0) {
				$('.acc-title-01').show();
				$('.progress-25').show();
				$('.progress-50').hide();
			}
			else if(progressVal == 1) {
				$('.acc-title-02').show();
				$('.progress-50').show();
				$('.progress-75').hide();
			}
			else if(progressVal == 2) {
				$('.acc-title-03').show();
				$('.progress-75').show();
				$('.progress-100').hide();
			}
			else if(progressVal == 3) {
				$('.acc-title-04').show();
				$('.circle-percent-75').show();
				$('.circle-percent-100').hide();
			}
			
			// Removing Class Active To Show Steps Backward;
			$('.progress-active').removeClass('progress-active').prev().removeClass('progress-activated').addClass('progress-active'); 
		});
	});
	
	// Add Row
	
    $("#new_add").click(function () {
        var html = '';
        html += '<div class="row" id="form-row">';
        html += '<div class="col-md-4 col-lg-4 col-xl-4">';
        html += '<div class="input-block description-group">';
        html += '<input type="text" class="form-control" placeholder="Enter Language">';
        html += '</div>';
        html += '</div>';
		html += '<div class="col-md-4 col-lg-4 col-xl-4">';
        html += '<div class="input-block description-group">';
        html += '<select name="price" class="form-control select-level" id="business-type">';
        html += '<option value="Individual" selected>Choose Level</option>';
        html += '<option value="">Basic</option>';
        html += '</select>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-md-4 col-lg-4 col-xl-4">';
        html += '<div class="new-addd">';
        html += '<a  id="remove_row" class="remove_row"> Remove</a>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        $('#add_row').append(html);
    });
	
	 // Remove Row
	 
	$(document).on('click', '#remove_row', function () {
		$(this).closest('#form-row').remove();
	});
	
	$("#new_add1").click(function () {
        var html = '';
        html += '<div class="row" id="form-row">';
        html += '<div class="col-md-4 input-block">';
        html += '<label for="" class="form-label">Milestone name</label>';
        html += '<input type="text" class="form-control" placeholder="Milestone name">';
        html += '</div>';
		html += '<div class="col-md-2 input-block floating-icon">';
        html += '<label for="" class="form-label">Amount</label>';
        html += '<input type="text" class="form-control" placeholder="Amount">';
        html += '<span><i class="feather-dollar-sign"></i></span>';
        html += '</div>';
        html += '<div class="col-md-3 input-block floating-icon">';
		html += '<label for="" class="form-label">Start Date</label>';
        html += '<input type="text" class="form-control datetimepicker" placeholder="Choose">';
        html += '<span><i class="feather-calendar"></i></span>';
        html += '</div>';
        html += '<div class="col-md-3 input-block floating-icon">';
		html += '<label for="" class="form-label">End Date</label>';
        html += '<input type="text" class="form-control datetimepicker" placeholder="Choose">';
        html += '<span><i class="feather-calendar"></i></span>';
        html += '</div>';
        html += '<div class="col-md-12">';
		html += '<div class="new-addd">';
        html += '<a  id="remove_row" class="remove_row"> Remove</a>';
        html += '</div>';
        html += '</div>';
 

        $('#add_row1').append(html);
    });

		//   View all Show hide One
		if($('.viewall-One').length > 0) {
			$(document).ready(function () {
				$(".viewall-One").hide();
				$(".viewall-button-One").click(function () {
				  $(this).text($(this).text() === "Show Less" ? "Show More" : "Show Less");
				  $(".viewall-One").slideToggle(900);
				});
			  });
			}
		
			//   View all Show hide Two
			if($('.viewall-Two').length > 0) {
				$(document).ready(function () {
					$(".viewall-Two").hide();
					$(".viewall-button-Two").click(function () {
					$(this).text($(this).text() === "Show Less" ? "Show More" : "Show Less");
					  $(".viewall-Two").slideToggle(900);
					});
				});
			} 


			$(".add-fav-list").click(function(){
				$(".add-fav-list").toggleClass("checked");
			  });
	// Skill Add Row
	
	// Working Hours
	
	$('#check_hour').click(function() {
		if ($(this).is(':checked')) {
			$(".checkout-hour").show();
			$(".check-hour").hide();
		} else {
			$(".checkout-hour").hide();
			$(".check-hour").show();
		}
	});
	$('.hoursradio').click(function() {
		$(".hours-rate").addClass("active");
		$(".hours-rates").addClass("d-block");
		$(".fixed-rate").removeClass("active");
		$(".fixed-rates").addClass("d-none");
		$(".hours-rates").removeClass("d-none");
		
	});
	$('.fixedradio').click(function() {
		$(".hours-rate").removeClass("active");
		$(".fixed-rate").addClass("active");
		$(".hours-rates").addClass("d-none");
		$(".fixed-rates").addClass("d-block");
		$(".fixed-rates").removeClass("d-none");
	});
	// Select Screen
	
	$(document).on('click','.accounts_type',function(){
		var id=$(this).data('id');
		localStorage.setItem('screen',id);
	});
	$(document).ready(function(){
		var screen=localStorage.getItem('screen');
		if(screen!='')
		{
			$('#'+screen).prop('checked',true);
		}
		else
		{
			$('#freelance').prop('checked',true);
		}
	});
	
	// Add More Hours
	
    $(".hours-info").on('click','.trash', function () {
		$(this).closest('.hours-cont').remove();
		return false;
    });

    $(".add-hours").on('click', function () {
		
		var hourscontent = '<div class="row form-row hours-cont">' +
			'<div class="col-12 col-md-10">' +
				'<div class="row form-row">' +
					'<div class="col-12 col-md-6">' +
						'<div class="input-block">' +
							'<label>Start Time</label>' +
							'<select class="form-control">' +
								'<option>-</option>' +
								'<option>12.00 am</option>' +
								'<option>12.30 am</option>' + 
								'<option>1.00 am</option>' +
								'<option>1.30 am</option>' +
							'</select>' +
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6">' +
						'<div class="input-block">' +
							'<label>End Time</label>' +
							'<select class="form-control">' +
								'<option>-</option>' +
								'<option>12.00 am</option>' +
								'<option>12.30 am</option>' +
								'<option>1.00 am</option>' +
								'<option>1.30 am</option>' +
							'</select>' +
						'</div>' +
					'</div>' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="javascript:void(0);" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>' +
		'</div>';
		
        $(".hours-info").append(hourscontent);
        return false;
    });
	
	// Content div min height set
	
	function resizeInnerDiv() {
		var height = $(window).height();	
		var header_height = $(".header").height();
		var footer_height = $(".footer").height();
		var setheight = height - header_height;
		var trueheight = setheight - footer_height;
		$(".content").css("min-height", trueheight);
	}
	
	if($('.content').length > 0 ){
		resizeInnerDiv();
	}

	$(window).on('resize', function(){
		if($('.content').length > 0 ){
			resizeInnerDiv();
		}
	});
	
	// Date Range Picker
	if($('.bookingrange').length > 0) {
		var start = moment().subtract(6, 'days');
		var end = moment();

		function booking_range(start, end) {
			$('.bookingrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		}

		$('.bookingrange').daterangepicker({
			startDate: start,
			endDate: end,
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		}, booking_range);

		booking_range(start, end);
	}
	// Chat

	var chatAppTarget = $('.chat-window');
	(function() {
		if ($(window).width() > 991)
			chatAppTarget.removeClass('chat-slide');
		
		$(document).on("click",".chat-window .chat-users-list a.media",function () {
			if ($(window).width() <= 991) {
				chatAppTarget.addClass('chat-slide');
			}
			return false;
		});
		$(document).on("click","#back_user_list",function () {
			if ($(window).width() <= 991) {
				chatAppTarget.removeClass('chat-slide');
			}	
			return false;
		});
	})();
	
	// Rating Star Review

	const stars = document.querySelectorAll('.rating-select i');
	const starsNone = document.querySelector('.form-info');

	// ---- ---- Stars ---- ---- //
	stars.forEach((star, index1) => {
	star.addEventListener('click', () => {
		stars.forEach((star, index2) => {
		// ---- ---- Active Star ---- ---- //
		index1 >= index2
			? star.classList.add('active')
			: star.classList.remove('active');
		});
	});
	});
	
	// Datatable
	if ($('.datatable').length > 0) {
		$('.datatable').DataTable({
			"bFilter": true,
		});
	}
	
	// select Box
	$(document).on('click', '.select-group .select-item .service-item', function() {
		$('.selected .service-item .fa').removeClass('fa-check');
		$('.select-item .service-item').removeClass('selected');
		$(this).addClass('selected');
	});
	
	// Preloader
	
	$(window).on('load', function () {
		if($('#loader').length > 0) {
			$('#loader').delay(350).fadeOut('slow');
			$('body').delay(350).css({ 'overflow': 'visible' });
		}
	})
	
	// readmore
	
	$(document).on('click', '.readmore', function() {
		var dots = document.getElementById("dots");
		var moreText = document.getElementById("more");
		var btnText = document.getElementById("myBtn");

		if (dots.style.display === "none") {
			dots.style.display = "inline";
			btnText.innerHTML = "Read more";
			moreText.style.display = "none";
		} else {
			dots.style.display = "none";
			btnText.innerHTML = "Read less";
			moreText.style.display = "inline";
		}
	});
	
	// Range slider
	
	if($('.slidercontainer').length > 0) {
		var slider = document.getElementById("myRange");
		var output = document.getElementById("demo");
		output.innerHTML = slider.value;

		slider.oninput = function() {
		  output.innerHTML = this.value;
		}
	}
	
	// Fade in scroll

	if($('.main-wrapper .aos').length>0){
		AOS.init({
			duration:1200,
			once:true
		});
	}
	
	// Scroll Window
	
	$(window).on('scroll', function () {
		if ($(this).scrollTop() > 0) {
		  $('.scroll-to-target').addClass('open');
		} else {
		  $('.scroll-to-target').removeClass('open');
		}
		if ($(this).scrollTop() > 500) {
		  $('.scroll-to-target').addClass('open');
		} else {
		  $('.scroll-to-target').removeClass('open');
		}
	});

  // 3. back to top
  if ($('.scroll-to-target').length) {
    $(".scroll-to-target").on('click', function () {
      var target = $(this).attr('data-target');
      // animate
      $('html, body').animate({
        scrollTop: $(target).offset().top
      }, 500);

    });
  }
	
	// Summernote
	
	if($('.summernote').length > 0) {
		$('.summernote').summernote({
			height: 200,                 // set editor height
			minHeight: null,             // set minimum height of editor
			maxHeight: null,             // set maximum height of editor
			focus: false ,
			toolbar: [
				// [groupName, [list of button]]
				['style', ['bold', 'italic', 'underline', 'clear']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['height', ['height']]
			]			// set focus to editable area after initializing summernote
		});
	}
	
	// custom seleaction
	
	if($('#store').length > 0) {
		document.getElementById('store').storeID.onchange = function() {
			var newaction = this.value;
			document.getElementById('store').action = newaction;
		}
	};

	// toggle-password
	if($('.toggle-password').length > 0) {
		$(document).on('click', '.toggle-password', function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $(".pass-input");
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	}
	// toggle-password
	if($('.toggle-passwords').length > 0) {
		$(document).on('click', '.toggle-passwords', function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $(".pass-inputs");
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	}
	// toggle-password
	if($('.toggle-password1').length > 0) {
		$(document).on('click', '.toggle-password1', function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $(".pass-input1");
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	}
	// Otp Verfication

	$('.digit-group').find('input').each(function () {
		$(this).attr('maxlength', 1);
		$(this).on('keyup', function (e) {
			var parent = $($(this).parent());

			if (e.keyCode === 8 || e.keyCode === 37) {
				var prev = parent.find('input#' + $(this).data('previous'));

				if (prev.length) {
					$(prev).select();
				}
			} else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
				var next = parent.find('input#' + $(this).data('next'));

				if (next.length) {
					$(next).select();
				} else {
					if (parent.data('autosubmit')) {
						parent.submit();
					}
				}
			}
		});
	});

	$('.digit-group input').on('keyup', function () {
		var self = $(this);
		if (self.val() != '') {
			self.addClass('active');
		} else {
			self.removeClass('active');
		}
	});
	
	$(window).on('scroll', function () {
		var scroll = $(window).scrollTop();
		if (scroll < 100) {
			$(".header").removeClass("sticky");
		} else {
			$(".header").addClass("sticky");
		}
	});
	
	if($('#developers-slider').length > 0 ){
		$('#developers-slider').owlCarousel({
			items: 5,
	        margin: 24,
	        dots : false,
			nav: true,
			smartSpeed: 2000,
			navText: [
				'<i class="fas fa-chevron-left"></i>',
				'<i class="fas fa-chevron-right"></i>'
			],
			loop: true,
			responsiveClass:true,
	        responsive: {
	          	0: {
	            	items: 1
	          	},
	          	768 : {
	            	items: 3
	          	},
	          	1170: {
	            	items: 4
	          	}
	        }
	    });
    }
	
	if($('#trend-slider').length > 0 ){
		$('#trend-slider').owlCarousel({
			items: 5,
	        margin: 30,
	        dots : true,
			nav: false,
			smartSpeed: 2000,
			loop: true,
			responsiveClass:true,
	        responsive: {
	          	0: {
	            	items: 1
	          	},
	          	768 : {
	            	items: 2
	          	},
				991 : {
	            	items: 2
	          	},
	          	1170: {
	            	items: 3
	          	}
	        }
	    });
    }
	
	if($('#review-three-slider').length > 0 ){
		$('#review-three-slider').owlCarousel({
			items: 5,
	        margin: 30,
	        dots : true,
			nav: true,
			smartSpeed: 2000,
			navText: [
				'<i class="fas fa-arrow-left"></i>',
				'<i class="fas fa-arrow-right"></i>'
			],
			loop: true,
			responsiveClass:true,
	        responsive: {
	          	0: {
	            	items: 1
	          	},
	          	768 : {
	            	items: 1
	          	},
	          	1170: {
	            	items: 1
	          	}
	        }
	    });
    }
	//Top Online Contacts
	if($('.top-online-contacts .swiper-container').length > 0 ){
		var swiper = new Swiper('.top-online-contacts .swiper-container', {
			slidesPerView: 5,
			spaceBetween: 15,
		});
	}
	
	if($('#feature-project-slider').length > 0 ){
		$('#feature-project-slider').owlCarousel({
			items: 5,
	        margin: 24,
	        dots : true,
			nav: true,
			smartSpeed: 2000,
			navText: [
				'<i class="fas fa-arrow-left"></i>',
				'<i class="fas fa-arrow-right"></i>'
			],
			loop: true,
			responsiveClass:true,
	        responsive: {
	          	0: {
	            	items: 1
	          	},
	          	768 : {
	            	items: 2
	          	},
				991 : {
	            	items: 3
	          	},
	          	1170: {
	            	items: 4
	          	}
	        }
	    });
    }
	
	if($('#blog-slider').length > 0 ){
		$('#blog-slider').owlCarousel({
			items: 5,
	        margin: 30,
	        dots : true,
			nav: true,
			smartSpeed: 2000,
			navText: [
				'<i class="fas fa-arrow-left"></i>',
				'<i class="fas fa-arrow-right"></i>'
			],
			loop: true,
			responsiveClass:true,
	        responsive: {
	          	0: {
	            	items: 1
	          	},
	          	768 : {
	            	items: 2
	          	},
				991 : {
	            	items: 3
	          	},
	          	1170: {
	            	items: 3
	          	}
	        }
	    });
    }
	
	if($('#blog-slider').length > 0 ){
		$('#blog-slider').owlCarousel({
			items: 5,
	        margin: 25,
	        dots : false,
			nav: true,
			smartSpeed: 2000,
			navText: [
				'<i class="fas fa-arrow-left"></i>',
				'<i class="fas fa-arrow-right"></i>'
			],
			loop: true,
			responsiveClass:true,
	        responsive: {
	          	0: {
	            	items: 1
	          	},
	          	768 : {
	            	items: 1
	          	},
	          	1170: {
	            	items: 3
	          	}
	        }
	    });
    }
	if($('#category-slider').length > 0 ){
		$('#category-slider').owlCarousel({
			items: 5,
	        margin: 25,
	        dots : false,
			nav: true,
			smartSpeed: 2000,
			navText: [
				'<i class="fas fa-arrow-left"></i>',
				'<i class="fas fa-arrow-right"></i>'
			],
			loop: true,
			responsiveClass:true,
	        responsive: {
	          	0: {
	            	items: 1
	          	},
				  576: {
	            	items: 2
	          	},
	          	768 : {
	            	items: 3
	          	},
	          	1170: {
	            	items: 5
	          	}
	        }
	    });
    }
	
	if($('#testimonial-slider').length > 0 ){
		$('#testimonial-slider').owlCarousel({
			items: 5,
	        margin: 30,
	        dots : false,
			nav: true,
			smartSpeed: 2000,
			navText: [
				'<i class="fas fa-chevron-left"></i>',
				'<i class="fas fa-chevron-right"></i>'
			],
			loop: true,
			responsiveClass:true,
	        responsive: {
	          	0: {
	            	items: 1
	          	},
	          	768 : {
	            	items: 2
	          	},
				991 : {
	            	items: 3
	          	},
	          	1170: {
	            	items: 3
	          	}
	        }
	    });
    }
	
	if($('#testimonial-slider-two').length > 0 ){
		$('#testimonial-slider-two').owlCarousel({
			items: 5,
	        margin: 30,
	        dots : false,
			nav: true,
			smartSpeed: 2000,
			navText: [
				'<i class="fas fa-arrow-left"></i>',
				'<i class="fas fa-arrow-right"></i>'
			],
			loop: true,
			responsiveClass:true,
	        responsive: {
	          	0: {
	            	items: 1
	          	},
	          	768 : {
	            	items: 2
	          	},
				991 : {
	            	items: 3
	          	},
	          	1170: {
	            	items: 3
	          	}
	        }
	    });
    }
	
	if($('#testimonial-two').length > 0 ){
		$('#testimonial-two').owlCarousel({
			items: 5,
	        margin: 30,
			slideSpeed: 500,
	        dots : false,
			nav: true,
			smartSpeed: 2000,
			navText: [
				'<i class="fas fa-chevron-left"></i>',
				'<i class="fas fa-chevron-right"></i>'
			],
			loop: true,
			responsiveClass:true,
	        responsive: {
	          	0: {
	            	items: 1
	          	},
	          	768 : {
	            	items: 1
	          	},
				991 : {
	            	items: 1
	          	},
	          	1170: {
	            	items: 1
	          	}
	        }
	    });
    }
	
	if($('#company-slider').length > 0 ){
		$('#company-slider').owlCarousel({
			items: 8,
	        margin: 24,
	        dots : false,
			nav: false,
			smartSpeed: 2000,
			navText: [
				'<i class="fas fa-chevron-left"></i>',
				'<i class="fas fa-chevron-right"></i>'
			],
			loop: true,
			responsiveClass:true,
	        responsive: {
	          	0: {
	            	items: 1
	          	},
	          	768 : {
	            	items: 3
	          	},
	          	1170: {
	            	items: 6
	          	}
	        }
	    });
    }
	
	if($('#popular-slider').length > 0 ){
		$('#popular-slider').owlCarousel({
			items: 6,
	        margin: 30,
	        dots : false,
			nav: true,
			smartSpeed: 2000,
			navText: [
				'<i class="fas fa-arrow-left"></i>',
				'<i class="fas fa-arrow-right"></i>'
			],
			loop: true,
			responsiveClass:true,
	        responsive: {
	          	0: {
	            	items: 1
	          	},
	          	768 : {
	            	items: 2
	          	},
	          	1170: {
	            	items: 3
	          	}
	        }
	    });
    }
	if($('#dev-slider').length > 0 ){
		$('#dev-slider').owlCarousel({
			items: 4,
	        margin: 24,
	        dots : false,
			nav: true,
			smartSpeed: 2000,
			navText: [
				'<i class="fas fa-arrow-left"></i>',
				'<i class="fas fa-arrow-right"></i>'
			],
			loop: true,
			responsiveClass:true,
	        responsive: {
	          	0: {
	            	items: 1
	          	},
	          	768 : {
	            	items: 2
	          	},
	          	1170: {
	            	items: 4
	          	}
	        }
	    });
    }
	
	if($('#blog-article').length > 0 ){
		$('#blog-article').owlCarousel({
			items: 6,
	        margin: 30,
	        dots : false,
			nav: true,
			smartSpeed: 2000,
			navText: [
				'<i class="fas fa-arrow-left"></i>',
				'<i class="fas fa-arrow-right"></i>'
			],
			loop: true,
			responsiveClass:true,
	        responsive: {
	          	0: {
	            	items: 1
	          	},
	          	768 : {
	            	items: 2
	          	},
	          	1170: {
	            	items: 3
	          	}
	        }
	    });
    }
	if($('#trust-company-slider').length > 0 ){
		$('#trust-company-slider').owlCarousel({
			items: 6,
	        margin: 24,
	        dots : false,
			nav: false,
			smartSpeed: 2000,
			navText: [
				'<i class="fas fa-arrow-left"></i>',
				'<i class="fas fa-arrow-right"></i>'
			],
			loop: true,
			responsiveClass:true,
	        responsive: {
	          	0: {
	            	items: 1
	          	},
	          	768 : {
	            	items: 2
	          	},
	          	1170: {
	            	items: 6
	          	}
	        }
	    });
    }
	
	// Slick testimonial two

	if($('.say-about.slider-for').length > 0) {
		$('.say-about.slider-for').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			fade: true,
			asNavFor: '.client-img.slider-nav'
		});																										
	}

	if($('.client-img.slider-nav').length > 0) {
		$('.client-img.slider-nav').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			asNavFor: '.say-about.slider-for',
			dots: false,
			arrows: false,
			centerMode: true,
			focusOnSelect: true
			
		});
	}
	
	$(window).on('scroll', function () {
		var scroll = $(window).scrollTop();
		if (scroll < 100) {
			$(".header").removeClass("sticky");
		} else {
			$(".header").addClass("sticky");
		}
	});

	// Edit Experiance

	$('#edit_experiance').on('click',function(){
        $('.pro-new').css('display','block');
        $('.pro-text').css('display','none');
    });

	$('.profile-cancel-btn').on('click',function(){
       $('.pro-new').css('display','none');
       $('.pro-text').css('display','block');
   	});
   
   	// Overview
	$('#edit_overview').on('click',function(){
       $('.pro-new1').css('display','block');
       $('.pro-text1').css('display','none');
   	});

	$('.profile-cancel-btn').on('click',function(){
       $('.pro-new1').css('display','none');
       $('.pro-text1').css('display','block');
   	});
   
   	// Overview

   	$('#edit_education').on('click',function(){
	   $('.pro-new2').css('display','block');
	   $('.pro-text2').css('display','none');
    });

	$('.profile-cancel-btn').on('click',function(){
       $('.pro-new2').css('display','none');
       $('.pro-text2').css('display','block');
   	});

	$('#edit_name').on('click',function(){
        $('.pro-new3').css('display','block');
        $('.pro-text3').css('display','none');
    });

	$('.profile-cancel-btn').on('click',function(){
        $('.pro-new3').css('display','none');
        $('.pro-text3').css('display','block');
    });

	// Skill Add Row
	
	$("#skill_add").click(function () {
        var html = '';
        html += '<div class="row" id="form-row">';
        html += '<div class="col-md-6">';
        html += '<div class="input-block ">';
        html += '<label class="form-label">Skills</label>';
        html += '<input type="text" name="skills["name"][]" class="form-control">';
        html += '</div>';
        html += '</div>';
		html += '<div class="col-md-6">';
        html += '<div class="input-block ">';
        html += '<label class="focus-label">Level</label>';
        html += '<select name="skills["level"][]" class="form-control select-level select">';
        html += '<option value="">Choose Level</option>';
		html += '<option value="Basic" <?php if(old("level")=="Basic") echo "selected"; ?>Basic</option>';
		html += '<option value="Intermediate" <?php if(old("level")=="Intermediate") echo "selected"; ?>Intermediate</option>';
		html += '<option value="Proficient" <?php if(old("level")=="Proficient") echo "selected"; ?>Proficient</option>';
        html += '</select>';
		html += '<div class="new-addd">';
        html += '<a  id="remove_row" class="remove_row"> Remove</a>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

		$('.select').select2({
			minimumResultsForSearch: -1,
			width: '100%'
		});
        $('#skill_add_row').append(html);
    });	

	// Education Add Row
	
    $("#edu_add").click(function () {
        var html = '';
        html += '<div class="row" id="form-row">';
		html += '<div class="col-md-6 col-lg-3">';
        html += '<div class="input-block">';
        html += '<label class="focus-label">Degree Name</label>';
        html += '<select name="education["degree_name"][]" class="form-control select-level select-edu select">';
        html += '<option value="0">Select</option>';
        html += '<option value="1">Bachelors degree</option>';
        html += '<option value="1">Masters Degree</option>';
        html += '</select>';
        html += '</div>';
		html += '</div>';
		html += '<div class="col-md-6 col-lg-3">';
        html += '<div class="input-block ">';
        html += '<label class="focus-label">University Name</label>';
        html += '<input type="text" name="education["university_name"][]" class="form-control">';
        html += '</div>';
        html += '</div>';
		html += '<div class="col-md-6 col-lg-3">';
        html += '<div class="input-block ">';
        html += '<label class="focus-label">Start Date</label>';
        html += '<div class="cal-icon">';
        html += '<input type="text" name="education["start_date"][]" class="form-control datetimepicker" placeholder="Choose">';
        html += '</div>';
        html += '</div>';
		html += '</div>';
		html += '<div class="col-md-6 col-lg-3">';
        html += '<div class="input-block ">';
        html += '<label class="focus-label">End Date</label>';
        html += '<div class="cal-icon">';
        html += '<input type="text" name="education["end_date"][]" class="form-control datetimepicker" placeholder="Choose">';
        html += '</div>';
        html += '<div class="new-addd">';
        html += '<a  id="remove_row" class="remove_row"> Remove</a>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
		html += '</div>';

		$('.select').select2({
			minimumResultsForSearch: -1,
			width: '100%'
		});
        $('#education_add_row').append(html);
    });	

	// education add freelancer profile

	$(".add-edu").click(function () {
        var html = '';
        html += '<div class="form-row align-items-center skill-cont">';
		html += '<div class="input-block col-lg-3">';
        html += '<label class="form-label">Degree Name</label>';
        html += '<input type="text" class="form-control" value="BE CSE">';
        html += '</div>';
		html += '<div class="input-block col-lg-3">';
        html += '<label class="form-label">University Name</label>';
        html += '<input type="text" class="form-control" value="Brington">';
        html += '</div>';
		html += '<div class="input-block col-lg-3">';
        html += '<label class="form-label">Start Date</label>';
        html += '<input type="text" class="form-control">';
        html += '</div>';
		html += '<div class="input-block col-lg-2">';
        html += '<label class="form-label">End Date</label>';
        html += '<input type="text" class="form-control">';
        html += '</div>';
		html += '<div class="input-block col-lg-1 mb-0">';
		html += '<a href="javascript:void(0);" class="btn trash-icon"><i class="far fa-trash-alt"></i></a>';
		html += '</div>';
		html += '</div>';
       

		$('.select').select2({
			minimumResultsForSearch: -1,
			width: '100%'
		});
        $('#education_add_row').append(html);
		$(".trash-icon").click(function(){
			$(this).parent().parent().addClass("d-none");
			return false;
		  });
    });

		// Certificate add freelancer profile

		$(".add-certi").click(function () {
			var html = '';
			html += '<div class="form-row align-items-center skill-cont w-100">';
			html += '<div class="input-block col-lg-4">';
			html += '<label class="form-label">Certification or Award</label>';
			html += '<input type="text" class="form-control" value="Feast of UI">';
			html += '</div>';
			html += '<div class="input-block col-lg-4">';
			html += '<label class="form-label">Certified from</label>';
			html += '<input type="text" class="form-control" value="PSD Technologies">';
			html += '</div>';
			html += '<div class="input-block col-lg-3 floating-icon">';
			html += '<label  class="form-label">Year</label>';
			html += '<input type="text" class="form-control datetimepicker" placeholder="Choose">';
			html += '<span><i class="feather-calendar"></i></span>';
			html += '</div>';
			html += '<div class="input-block col-lg-1 mb-0">';
			html += '<a href="javascript:void(0);" class="btn trash-icon"><i class="far fa-trash-alt"></i></a>';
			html += '</div>';
			html += '</div>';
		   
			$('.select').select2({
				minimumResultsForSearch: -1,
				width: '100%'
			});
			$('#certi_add_row').append(html);
			$(".trash-icon").click(function(){
				$(this).parent().parent().addClass("d-none");
				return false;
			  });
		});

		
	// Experience add freelancer profile

	$(".add-exp").click(function () {
        var html = '';
        html += '<div class="form-row align-items-center skill-cont">';
		html += '<div class="input-block col-lg-3">';
        html += '<label class="form-label">Company Name</label>';
        html += '<input type="text" class="form-control">';
        html += '</div>';
		html += '<div class="input-block col-lg-3">';
        html += '<label class="form-label">Position</label>';
        html += '<input type="text" class="form-control">';
        html += '</div>';
		html += '<div class="input-block col-lg-3 floating-icon">';
		html += '<label  class="form-label">Start Date</label>';
		html += '<input type="text" class="form-control datetimepicker" placeholder="Choose">';
		html += '<span><i class="feather-calendar"></i></span>';
		html += '</div>';
		html += '<div class="input-block col-lg-2 floating-icon">';
		html += '<label  class="form-label">End Date</label>';
		html += '<input type="text" class="form-control datetimepicker" placeholder="Choose">';
		html += '<span><i class="feather-calendar"></i></span>';
		html += '</div>';
		html += '<div class="input-block col-lg-1 mb-0">';
		html += '<a href="javascript:void(0);" class="btn trash-icon"><i class="far fa-trash-alt"></i></a>';
		html += '</div>';
		html += '</div>';
       

		$('.select').select2({
			minimumResultsForSearch: -1,
			width: '100%'
		});
        $('#exp_add_row').append(html);
		$(".trash-icon").click(function(){
			$(this).parent().parent().addClass("d-none");
			return false;
		  });
    });
	
	// Experience Add Row

    $("#experience_add").click(function () {
        var html = '';
        html += '<div class="row" id="form-row">';
		html += '<div class="col-md-6 col-lg-3">';
        html += '<div class="input-block ">';
        html += '<label class="focus-label">Company Name</label>';
        html += '<input type="text" name="experience["company_name"][]" class="form-control">';
        html += '</div>';
        html += '</div>';
		html += '<div class="col-md-6 col-lg-3">';
        html += '<div class="input-block">';
        html += '<label class="focus-label">Position</label>';
        html += '<select name="experience["position"][]" class="form-control select-level select-edu select">';
        html += '<option value="0">Select</option>';
        html += '<option>Basic</option>';
        html += '<option>Intermediate</option>';
		html += '<option>Proficient</option>';
        html += '</select>';
        html += '</div>';
		html += '</div>';
		html += '<div class="col-md-6 col-lg-3">';
        html += '<div class="input-block ">';
        html += '<label class="focus-label">Start Date</label>';
        html += '<div class="cal-icon">';
        html += '<input type="text" name="education["start_date"][]" class="form-control datetimepicker" placeholder="Choose">';
        html += '</div>';
        html += '</div>';
		html += '</div>';
		html += '<div class="col-md-6 col-lg-3">';
        html += '<div class="input-block ">';
        html += '<label class="focus-label">End Date</label>';
        html += '<div class="cal-icon">';
        html += '<input type="text" name="education["end_date"][]" class="form-control datetimepicker" placeholder="Choose">';
        html += '</div>';
        html += '<div class="new-addd">';
        html += '<a  id="remove_row" class="remove_row"> Remove</a>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
		html += '</div>';

		$('.select').select2({
			minimumResultsForSearch: -1,
			width: '100%'
		});
        $('#experience_add_row').append(html);
		$(".trash-icon").click(function(){
			$(this).parent().parent().addClass("d-none");
			return false;
		  });
    });	
	
	// Certification Add Row
	
    $("#certify_add").click(function () {
        var html = '';
        html += '<div class="row" id="form-row">';
		html += '<div class="col-md-4 col-lg-4">';
		html += '<div class="input-block">';
		html += '<label class="focus-label">Certification or Award</label>';
		html += '<select name="certification["award"][]" class="form-control select-level select-edu select">';
		html += '<option value="0">Select</option>';
		html += '<option value="1">Certification</option>';
		html += '<option value="1">Award</option>';
		html += '</select>';
		html += '</div>';
		html += '</div>';
		html += '<div class="col-md-4 col-lg-4">';
		html += '<div class="input-block">';
		html += '<label class="focus-label">Certified from</label>';
		html += '<input type="text" name="certification["certified_from"][]" class="form-control">';
		html += '</div>';
		html += '</div>';
		html += '<div class="col-md-4 col-lg-4">';
		html += '<div class="input-block">';
		html += '<label class="focus-label">Year</label>';
		html += '<div class="cal-icon">';
		html += '<input type="text" name="certification["year"][]" class="form-control datetimepicker" placeholder="Choose">';
		html += '</div>	';
		html += '<div class="new-addd">';
        html += '<a  id="remove_row" class="remove_row"> Remove</a>';
		html += '</div>	';
		html += '</div>	';
		html += '</div>	';
		

		$('.select').select2({
			minimumResultsForSearch: -1,
			width: '100%'
		});
        $('#certify_add_row').append(html);
		$(".trash-icon").click(function(){
			$(this).parent().parent().addClass("d-none");
			return false;
		  });
    });	

		// Language add freelancer profile
	
		$(".lang-add").click(function () {
			var html = '';
			html += '<div class="form-row align-items-center skill-cont">';
			html += '<div class="input-block col-md-6">';
			html += '<label>Language</label>';
			html += '<input type="text" class="form-control">';
			html += '</div>';
			html += '<div class="input-block col-md-5">';
			html += '<label>Language Fluency</label>';
			html += '<select class="form-control select">';
			html += '<option value="0">Select</option>';
			html += '<option value="1">Intermediate</option>';
			html += '<option value="2">Expert</option>';
			html += '</select>';
			html += '</div>';
			html += '<div class="input-block col-lg-1 mb-0">';
			html += '<a href="javascript:void(0);" class="btn trash-icon"><i class="far fa-trash-alt"></i></a>';
			html += '</div>';
			html += '</div>';
			
			$('.select').select2({
				minimumResultsForSearch: -1,
				width: '100%'
			});
			$('#lang_add_row').append(html);
			$(".trash-icon").click(function(){
				$(this).parent().parent().addClass("d-none");
				return false;
			  });
		});	

	// Language Add Row

    $("#lang_add").click(function () {
        var html = '';
        html += '<div class="row" id="form-row">';
		html += '<div class="col-md-6 col-lg-6">';
        html += '<div class="input-block ">';
        html += '<label class="focus-label">Language</label>';
        html += '<input type="text" name="language[name][]" class="form-control">';
        html += '</div>';
        html += '</div>';
		html += '<div class="col-md-6 col-lg-6">';
        html += '<div class="input-block">';
        html += '<label class="focus-label">Level</label>';
        html += '<select name="experience["position"][]" class="form-control select-level select-edu select">';
        html += '<option value="0">Choose Level</option>';
        html += '<option>Basic</option>';
        html += '<option>Intermediate</option>';
		html += '<option>Proficient</option>';
        html += '</select>';
        html += '<div class="new-addd">';
        html += '<a  id="remove_row" class="remove_row"> Remove</a>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
		html += '</div>';

		$('.select').select2({
			minimumResultsForSearch: -1,
			width: '100%'
		});

        $('#language_add_row').append(html);
		$(".trash-icon").click(function(){
			$(this).parent().parent().addClass("d-none");
			return false;
		  });
    });	

	

    // Sidebar Slimscroll

	if($slimScrolls.length > 0) {
		$slimScrolls.slimScroll({
			height: 'auto',
			width: '100%',
			position: 'right',
			size: '7px',
			color: '#ccc',
			wheelStep: 10,
			touchScrollStep: 100
		});
		var wHeight = $(window).height();
		$slimScrolls.height(wHeight);
		$('.left-sidebar .slimScrollDiv, .sidebar-menu .slimScrollDiv, .sidebar-menu .slimScrollDiv').height(wHeight);
		$('.right-sidebar .slimScrollDiv').height(wHeight - 30);
		$('.chat .slimScrollDiv').height(wHeight - 70);
		$('.chat.settings-main .slimScrollDiv').height(wHeight);
		$('.right-sidebar.video-right-sidebar .slimScrollDiv').height(wHeight - 90);
		$(window).resize(function() {
			var rHeight = $(window).height();
			$slimScrolls.height(rHeight);
			$('.left-sidebar .slimScrollDiv, .sidebar-menu .slimScrollDiv, .sidebar-menu .slimScrollDiv').height(rHeight);
			$('.right-sidebar .slimScrollDiv').height(wHeight - 30);
			$('.chat .slimScrollDiv').height(rHeight - 70);
			$('.chat.settings-main .slimScrollDiv').height(wHeight);
			$('.right-sidebar.video-right-sidebar .slimScrollDiv').height(wHeight - 90);
		});
	}

	$(".group-left-setting").on('click', function () {
		$('.right_side_group').addClass('show-right-sidebar');
		$('.right_side_group').removeClass('hide-right-sidebar');
		$('.right-side-contact').addClass('hide-right-sidebar');
		$('.chat-options ').addClass('chat-small');
	});
	$(".remove-group-message").on('click', function () {
		$('.right_side_group').addClass('hide-right-sidebar');
		$('.right_side_group').removeClass('show-right-sidebar');
		$('.chat-options ').removeClass('chat-small');
		if ( $(window).width() > 991 && $(window).width() < 1201) {
			$(".chat").css('margin-left', 0);
		}
		if ($(window).width() < 992) {
			$('.chat').removeClass('hide-chatbar');
		}
	});

	$(".star-message-left").on('click', function () {
		$('.right_side_star').addClass('show-right-sidebar');
		$('.right_side_star').removeClass('hide-right-sidebar');
		$('.right-side-contact').addClass('hide-right-sidebar');
		$('.right-side-contact').removeClass('show-right-sidebar');
		$('.chat-options ').addClass('chat-small');
	});
	$(".remove-star-message").on('click', function () {
		$('.right_side_star').addClass('hide-right-sidebar');
		$('.right_side_star').removeClass('show-right-sidebar');
		$('.chat-options ').removeClass('chat-small');
		if ( $(window).width() > 991 && $(window).width() < 1201) {
			$(".chat").css('margin-left', 0);
		}
		if ($(window).width() < 992) {
			$('.chat').removeClass('hide-chatbar');
		}
	});

	$(".message-info-left").on('click', function () {
		$('.right_sidebar_info').addClass('show-right-sidebar');
		$('.right_sidebar_info').removeClass('hide-right-sidebar');
		$('.right-side-contact').addClass('hide-right-sidebar');
		$('.right-side-contact').removeClass('show-right-sidebar');
		$('.right_side_star').addClass('hide-right-sidebar');
		$('.right_side_star').removeClass('show-right-sidebar');
		$('.right_side_group').addClass('hide-right-sidebar');
		$('.right_side_group').removeClass('show-right-sidebar');
		$('.chat-options ').addClass('chat-small');
		if ( $(window).width() > 991 && $(window).width() < 1201) {
			$(".chat:not(.right_sidebar_info .chat)").css('margin-left', - chat_bar);
		}
		if ($(window).width() < 992) {
			$('.chat:not(.right_sidebar_info .chat)').addClass('hide-chatbar');
		}
	});
	$(".remove-message-info").on('click', function () {
		$('.right_sidebar_info').addClass('hide-right-sidebar');
		$('.right_sidebar_info').removeClass('show-right-sidebar');
		$('.chat-options ').removeClass('chat-small');
		if ( $(window).width() > 991 && $(window).width() < 1201) {
			$(".chat").css('margin-left', 0);
		}
		if ($(window).width() < 992) {
			$('.chat').removeClass('hide-chatbar');
		}
	});

	$(".dream_profile_menu").on('click', function () {
		$('.right-side-contact').addClass('show-right-sidebar');
		$('.right-side-contact').removeClass('hide-right-sidebar');
		$('.right_sidebar_info').addClass('hide-right-sidebar');
		$('.right_sidebar_info').removeClass('show-right-sidebar');
		$('.right_side_star').addClass('hide-right-sidebar');
		$('.right_side_star').removeClass('show-right-sidebar');
		$('.video-right-sidebar').addClass('show-right-sidebar');
		$('.video-right-sidebar').removeClass('hide-right-sidebar');
		$('.chat-options ').addClass('chat-small');
		if ( $(window).width() > 991 && $(window).width() < 1201) {
			$(".chat:not(.right-side-contact .chat)").css('margin-left', - chat_bar);
			$(".chat:not(.right_side_star .chat)").css('margin-left', - chat_bar);
			$('.left-sidebar').hide();
			$('.chat').css("margin-left", "0");

		}
		if ($(window).width() < 992) {
			$('.chat:not(.right-side-contact .chat)').addClass('hide-chatbar');
			$('.chat:not(.right_side_star .chat)').addClass('hide-chatbar');
		}
	});

	$(".close_profile").on('click', function () {
		$('.right-side-contact').addClass('hide-right-sidebar');
		$('.right-side-contact').removeClass('show-right-sidebar');
		$('.video-right-sidebar').addClass('hide-right-sidebar');
		$('.video-right-sidebar').removeClass('show-right-sidebar');
		$('.chat-options ').removeClass('chat-small');
		if ( $(window).width() > 991 && $(window).width() < 1201) {
			$(".chat").css('margin-left', 0);
		}
		if ($(window).width() < 992) {
			$('.chat').removeClass('hide-chatbar');
		}
	});



	// Chat Search Visible

	$('.chat-search-btn').on('click', function () {
		$('.chat-search').addClass('visible-chat');
	});
	$('.close-btn-chat').on('click', function () {
		$('.chat-search').removeClass('visible-chat');
	});
	$(".chat-search .form-control").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$(".chat .chat-body .messages .chats").filter(function() {
		  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});

	// Chat Search Visible

	$('.user-chat-search-btn').on('click', function () {
		$('.user-chat-search').addClass('visible-chat');
	});
	$('.user-close-btn-chat').on('click', function () {
		$('.user-chat-search').removeClass('visible-chat');
	});

	$(".user-list-item:not(body.status-page .user-list-item, body.voice-call-page .user-list-item)").on('click', function () {
		if ($(window).width() < 992) {
			$('.left-sidebar').addClass('hide-left-sidebar');
			$('.chat').addClass('show-chatbar');
		}
	});
	
	$(".left_sides").on('click', function () {
		if ($(window).width() <= 991) {
			$('.sidebar-group').removeClass('hide-left-sidebar');
			$('.sidebar-menu').removeClass('d-none');
		}
	});
	$(".user-list li a").on('click', function () {
		if ($(window).width() <= 767) {
			$('.left-sidebar').addClass('hide-left-sidebar');
				$('.sidebar-menu').addClass('d-none');
		}
	});

	function toggleBookmark(element) {
		// Get the element with the class 'fa-regular' within the clicked section
		var iconElement = $(element).find('i');
		// Toggle between 'fa-regular' and 'fa'
		if (iconElement.length > 0) {
		  iconElement.toggleClass('fa-regular fa');
		}
	  }
	
	function addLink(){
		var filename = document.getElementById("FileUpload1");
		document.getElementById("test").value = filename.value;
	}
		
	$(".trash-icon").click(function(){
		$(this).parent().parent().addClass("d-none");
		return false;
	  });
	  $(".file-close").click(function(){
		$(this).parent().parent().addClass("d-none");
		return false;
	  });
	  

	  // image file upload image
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
		
				reader.onload = function (e) {
					$('#blah').attr('src', e.target.result);
				}
		
				reader.readAsDataURL(input.files[0]);
			}
		}
		
		$("#imgInp").change(function(){
			readURL(this);
		});

})(jQuery);

