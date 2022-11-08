

$(document).ready(function () {

	// screen carousel
	$('.screen .carousel').slick({
		infinite: true,
		autoplay: true,
		lazyLoad: 'ondemand',
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		draggable: true,
		prevArrow: "<button class=' slick-prev'><i class='material-icons'>keyboard_arrow_left</i></button>",
		nextArrow: "<button class=' slick-next '><i class='material-icons'>keyboard_arrow_right</i></button>",
		responsive: [
			{
				breakpoint: 840,
				settings: {
					arrows: false,
				}
			}

		]
	});

	// categories
	$('.nepal .carousel, .cmm .carousel ').slick({
		infinite: true,
		lazyLoad: 'ondemand',
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: true,
		draggable: true,
		prevArrow: "<button class=' slick-prev'><i class='material-icons'>keyboard_arrow_left</i></button>",
		nextArrow: "<button class=' slick-next '><i class='material-icons'>keyboard_arrow_right</i></button>",
		responsive: [
			{
				breakpoint: 840,
				settings: {
					slidesToShow: 2.2,
					arrows: false,
					infinite: false,
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 1.4,
					arrows: false,
					infinite: false,
				}
			}

		]
	});

	document.multiselect('#testSelect1')
		.setCheckBoxClick("checkboxAll", function (target, args) {
			// console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
		})
		.setCheckBoxClick("1", function (target, args) {
			// console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
		});

	// lev2 advance filter
	document.multiselect('#testSelect2')
		.setCheckBoxClick("checkboxAll", function (target, args) {
			// console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
		})
		.setCheckBoxClick("1", function (target, args) {
			// console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
		});

	$('#testSelect1_input').attr('placeholder', 'select province')
	// dropdown active

	$('#testSelect1_input').focusin(function () {
		setTimeout(() => {
			$(this).parents('#testSelect1_multiSelect').next().addClass('active');
		}, 300)
	}).focusout(
		function () {
			setTimeout(() => {
				$(this).parents('#testSelect1_multiSelect').next().removeClass('active');
			}, 300)
		});




	// hide on dropdown click

	$('.multiselect-wrapper').next().off('click').on('click', function (e) {
		// e.stopPropagation();
		$(this).prev().find('.multiselect-list').removeClass('active');

	})




	//custom checkboxes
	$('.screen .main-form .second .multiselect-list label').addClass('custom-control custom-checkbox');

	$('.screen .main-form .second .multiselect-list input[type="checkbox"] ').addClass('multiselect-checkbox custom-control-input');

	$('.screen .main-form .second .multiselect-list span').addClass('multiselect-text custom-control-label');


	// addding province class
	let province = $('#testSelect1_itemList ul li');
	province.each(function (index, elem) {
		// console.log( index + ": " + $( this ).text() );
		let provinceClass = $(elem);
		provinceClass.addClass(`province_${index}`);
		// console.log(provinceClass)
	});

	// select all to all province
	$('#testSelect1_itemList> .multiselect-text .multiselect-text.custom-control-label').text('All province')

	function timeElemFunc(elem) {
		elem.parents('.multiselect-wrapper').next().addClass('active');
	}
	$('.multiselect-wrapper li').hover(function (event) {
		let timoutElem = $(this);
		setTimeout(timeElemFunc(timoutElem), 200)
	});

	// lev 2
	$('#testSelect1_itemList li').hover(function (event) {
		let provinceActive = $(this).attr('class');
		if (provinceActive.includes('active')) {
			provinceActive = provinceActive.replace('active ', '');
			provinceActive = provinceActive.replace(' active', '');
		}
		// console.log(provinceActive)
		let elem = $(`.city.${provinceActive}`)
		// console.log(elem)
		elem.addClass('active');

	},
		function () {
			$('.screen .city').removeClass('active');

		});

	// append the checked tag near search par
	function appendTag() {
		let elem = $('.screen .city .custom-checkbox input:checked');
		$('#appendtag .tag__container .tag').remove();
		let elemValue = elem.next().text();
		elemValue = elemValue.trim().split(" ");
		setTimeout(function () {
			$('#testSelect1_multiSelect + .material-icons.arrow').addClass('active')
		}, 300)

		// append to form
		elemValue.forEach(function (elem, index) {
			if (elem) {
				formAppendItem = `<div class="tag"><small>${elem}</small> <a href="#!" class="close"><i class="material-icons">close</i></a></div>`;
				formAppend.append(formAppendItem);
			}
		})
	}

	// when selecting provice 1 select all the province including in it
	$('#testSelect1_itemList li input').change(function (event) {
		if ($(this).prop("checked") == true) {
			// console.log('yeah babay')
			$('.city.active input').prop("checked", true);
		} else {
			// console.log('lol')
			$('.city.active input').prop("checked", false);
		}
		appendTag();

	});




	// lev1 stay open while focusing on lev2
	$('.screen .city').off('mouseover').on('mouseover', function (event) {
		$('#testSelect1_itemList').addClass('active');
	})

	const searchForm = $('.form-inline.main-form .form-group input[type=search]');
	const cityLabel = $('.screen .city .custom-checkbox .custom-control-label');
	cityLabel.each(function (index, elem) {
		let vrelem = $(elem);
		vrelem.text(vrelem.text() + ' ');

	})


	// apped item parent
	const formAppend = $('#appendtag .tag__container');
	let formAppendItem;



	// searchForm.val("GeeksForGeeks");
	$('.screen .city .custom-checkbox').off('click').on('click', function (event) {
		event.stopPropagation();
		$('#testSelect1_itemList').addClass('active');
		appendTag();


		// searchForm.focus();
	})


	// removing active from arrow
	$('.material-icons.arrow').click(function () {
		$(this).removeClass('active');
	})

	// removing item on cross click input
	$(document).on('click', '#appendtag .tag a.close', function (e) {
		event.stopPropagation();
		e.preventDefault();
		let parentClose = $(this).parent();
		let itemText = parentClose.find('small').text();
		itemText += " ";
		// console.log(itemText);
		let elem = $('.screen .city .custom-checkbox input:checked');
		// console.log(elem)
		elem.each(function (index, elemi) {
			let checkedElem = $(elemi)
			if (itemText == checkedElem.next().text()) {
				checkedElem.prop("checked", false)
			}
		});
		parentClose.remove();
		searchForm.focus();

	});

	// remove last element on back space
	searchForm.on('keydown', function (e) {
		let key = event.keyCode || event.charCode;
		let lastAppend = $('#appendtag .tag:last-child');
		if (!($(this).val())) {
			if (key == 8 || key == 46) {
				lastAppend.remove();
				let itemText = lastAppend.find('small').text();
				itemText += " ";
				// console.log(itemText);
				let elem = $('.screen .city .custom-checkbox input:checked');
				elem.each(function (index, elemi) {
					let checkedElem = $(elemi)
					if (itemText == checkedElem.next().text()) {
						checkedElem.prop("checked", false)
					}
				});
			}
		}
	});

	searchForm.on('keypress', function (e) {
		$(this).next().addClass('show');
	});

	searchForm.on('focusout', function (e) {
		$(this).next().removeClass('show');
	});

	// search recmmoneded list
	$('#appendtag .dropdown-item').click(function (e) {
		searchForm.focus();
	})

	if ($(window).width() < 840) {
		$('#appendtag .form-control[type=search]').attr('readonly', '');
		$('#appendtag').on('click', function (e) {
			e.stopPropagation();
			$('.search-page .filter').addClass('active');
			return true;
		})

		$('.filter a.close').click(function (e) {
			$(this).parents('.filter').removeClass('active');
		})
	} else {
		searchForm.focusin(function (event) {
			event.stopPropagation();
			$('.advance').addClass('active');
			// $('.multiselect-list').removeClass('active');

		});
		$('.screen .multiselect-input-div, .screen .form-control, .form-row.second.advance').click(function (e) {
			event.stopPropagation();

		})

	}



	$('#testSelect2_input').attr('placeholder', 'Property types');

	$('#testSelect2_itemList label').click(function (e) {

		if ($(this).find('.multiselect-text').text() === 'Land') {
			if ($(this).parent().hasClass('active')) {
				$('.only_home').show();
				$('.only_land').hide();
			}
			else {
				$('.only_home').hide();
				$('.only_land').show();
			}
			if ($('#testSelect2_itemList li:not(:nth-child(2))').hasClass('active')) {
				$('.only_home').show();
			}
		}

		else if ($(this).find('.multiselect-text').text() === 'Select all') {
			$('.only_home').show();
			$('.only_land').show();
		}
		else {
			if (!($('#testSelect2_itemList li:nth-child(2)').hasClass('active'))) {
				$('.only_home').show();
				$('.only_land').hide();
			}
			else {
				$('.only_home, .only_land').show();
			}
		}
	})



	$('body').on('click', function (event) {
		$('.advance').removeClass('active');

	});


	// dropdown active
	$('#testSelect2_input').focusin(function () {
		setTimeout(() => {
			$(this).parents('#testSelect2_multiSelect').next().addClass('active');
		}, 300)
	}).focusout(
		function () {
			setTimeout(() => {
				$(this).parents('#testSelect2_multiSelect').next().removeClass('active');
			}, 300)
		});

        

	$('#testSelect2_multiSelect').next().click(function (e) {
		$('#testSelect2_itemList').removeClass('active');

	});

	$('.multiselect-list').hover(function (e) {
		setTimeout(function (e) {
			$(this).next().addClass('active');

		}, 400)
	})



	// ui slider and filter


	var html5Slider = document.getElementById('html5');
	var select = document.getElementById('input-select');
	var select2 = document.getElementById('input-select2');

	for (var i = 0; i <= 200000;) {
		var option = document.createElement("option");
		option.text = `Rs: ${i}`;
		option.value = i;
		select2.appendChild(option);
		i += 20000;
	}
	for (var i = 0; i <= 200000;) {
		var option = document.createElement("option");
		option.text = `Rs: ${i}`;
		option.value = i;
		select.appendChild(option);
		i += 20000;
	}

	noUiSlider.create(html5Slider, {
		start: [0, 20000],
		step: 20000,
		connect: true,
		range: {
			'min': 0,
			'max': 200000
		}
	});

	html5Slider.noUiSlider.on('update', function (values, handle) {
		var value = values[handle];
		// console.log(value)
		if (handle === 0) {
			var value = values[handle];
			select.value = Math.round(value);
		}
		else {
			var value = values[handle];
			select2.value = Math.round(value);
		}

	});

	select.addEventListener('change', function () {
		html5Slider.noUiSlider.set([this.value, null]);
	});

	select2.addEventListener('change', function () {
		html5Slider.noUiSlider.set([null, this.value]);
	});
	let toggle = 0;

	$('.adsTrigger').click(function (e) {
		$('#advanceSearch').slideToggle();
	})








})
