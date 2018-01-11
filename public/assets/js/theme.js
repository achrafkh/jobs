$(document).ready(function() {

	function fileValidation(id){
	    var fileInput = document.getElementById(id);
	    var filePath = fileInput.value;
	    var allowedExtensions = /(\.pdf|\.doc|\.docx)$/i;
	    if(!allowedExtensions.exec(filePath)){
	        return false;
	    }
	    return true;
	}



	/*
	-----------------------------------------
	Svg polyfill
	-----------------------------------------
	*/

	svg4everybody({
		polyfill: true,
	});

	
	/*
	-----------------------------------------
	Waves
	-----------------------------------------
	*/

	$.ripple('[waves-hover]', {
		on: 'mouseenter',
		multi: true
	});

	$.ripple('[waves-hover]', {
		multi: true
	});

	$.ripple('[waves-click]', {
		multi: true
	});

	/*
	-----------------------------------------
	Bootstrap select
	-----------------------------------------
	*/

	$('.dropdown').on({
		mouseenter: function(){
			$(this).addClass('open')
		},
		mouseleave: function(){
			$(this).removeClass('open')
		}
	});


	/*
	-----------------------------------------
	Bootstrap select
	-----------------------------------------
	*/

	$('.selectpicker').selectpicker();

	/*
	-----------------------------------------
	Slider
	-----------------------------------------
	*/

	$('.category-slider').slick({
		infinite: false,
		slidesToShow: 3,
		slidesToScroll: 1,
  		swipeToSlide: true,
		dots: false,
		variableWidth: true,
		responsive: [
		    {
				breakpoint: 768,
				settings: {
					infinite: true,
					slidesToShow: 1,
					centerMode: true,
				}
		    },
		]
	});

	/*
	-----------------------------------------
	Radio Collapse
	-----------------------------------------
	*/

	$('.radiobox input[type="radio"]').on('change', function(){
		$('#submit').attr('disabled',false);
		$('.radiobox input[type="radio"]').attr('disabled',true);
		var collapse = '#' + $(this).data('collapse');
		$('.job-specs').collapse('hide');
		$(collapse).collapse('show');
		$(collapse).on('shown.bs.collapse', function () {
			$('.radiobox input[type="radio"]').attr('disabled',false);
		})
	})

	/*
	-----------------------------------------
	Add Inputs
	-----------------------------------------
	*/

	$(document).on('change', '.file-upload input[type="file"]', function() {
	    var input = $(this),
	    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
       
        if(fileValidation($(this).attr('id'))){
			$(this).siblings('.file-name').html(label).addClass('active');
		} else {
			toastr.error("L'extension de fichier doit être word ou pdf", 'Oops!');
		}
	});

	/*
	-----------------------------------------
	Add Inputs
	-----------------------------------------
	*/

	var fileIndex = 1;
	$('#add-file').on('click', function(){
		fileIndex++
		$('.files-wrap').append(
			'<label class="file-upload" for="file-'+ fileIndex +'">\
				<input id="file-'+ fileIndex +'" name="file[]" type="file">\
				<span class="file-name">Click to browse file</span>\
				<span class="file-btn">\
					<i class="ico-upload"></i>\
					<span>Upload</span>\
				</span>\
			</label>'
		);
	})

	var siteIndex = 1;
	$('#add-site').on('click', function(){
		siteIndex++
		$('.sites-wrap').append(
			'<div class="input-wrap">\
				<div class="input-icon">\
					<input id="site-'+ siteIndex +'" name="site[]" class="form-control" type="text" placeholder="http://exemple">\
					<i class="ico-link"></i>\
				</div>\
			</div>'
		);
	})

});

