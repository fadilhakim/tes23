/*************************************************************
 * Studio 19
 * Version 1.0.0
 * by WEBIDIA
*************************************************************/


jQuery(document).ready(function() {
	"use strict";
	var $ = jQuery;
	
	/*************************************************************
	 * Typed
	 * https://github.com/mattboldt/typed.js
	*************************************************************/

	$(".hero-typed").typed({
		strings: ["Graphic Design", "Web Development", "Web Hosting", "Digital Marketing", "eCommerce", "Web Applications"],
		typeSpeed: 100,
		loop: true,
		showCursor: true
	});

	/*************************************************************
	 * Google Maps
	 * https://github.com/hpneo/gmaps
	 *
	 * Map Styles
	 * https://snazzymaps.com/style/151/ultra-light-with-labels
	 *************************************************************/

	if ($('#gmap').length) {
		var map = new GMaps({
			el: '#gmap',
			lat: 51.495814,
			lng: -0.10084,
			hideInfoWindows: true,
			navigationControl: false,
			mapTypeControl: false,
			zoom: 14,
			zoomControl: false,
			streetViewControl: false,
			disableDoubleClickZoom: true,
			scaleControl: false,
			draggable: false,
			scrollwheel: false,
			styles: [{
					"featureType": "all",
					"elementType": "labels.text.fill",
					"stylers": [{
							"saturation": 36
						},
						{
							"color": "#768687"
						},
						{
							"lightness": 40
						}
					]
				},
				{
					"featureType": "all",
					"elementType": "labels.text.stroke",
					"stylers": [{
							"visibility": "on"
						},
						{
							"color": "#ffffff"
						},
						{
							"lightness": 16
						}
					]
				},
				{
					"featureType": "all",
					"elementType": "labels.icon",
					"stylers": [{
						"visibility": "off"
					}]
				},
				{
					"featureType": "administrative",
					"elementType": "geometry.fill",
					"stylers": [{
							"color": "#f3f5f5"
						},
						{
							"lightness": 20
						}
					]
				},
				{
					"featureType": "administrative",
					"elementType": "geometry.stroke",
					"stylers": [{
							"color": "#f3f5f5"
						},
						{
							"lightness": 17
						},
						{
							"weight": 1.2
						}
					]
				},
				{
					"featureType": "landscape",
					"elementType": "geometry",
					"stylers": [{
							"color": "#f3f5f5"
						},
						{
							"lightness": 20
						}
					]
				},
				{
					"featureType": "poi",
					"elementType": "geometry",
					"stylers": [{
							"color": "#f3f5f5"
						},
						{
							"lightness": 21
						}
					]
				},
				{
					"featureType": "poi.park",
					"elementType": "geometry",
					"stylers": [{
							"color": "#e1e3e4"
						},
						{
							"lightness": 21
						}
					]
				},
				{
					"featureType": "road.highway",
					"elementType": "geometry.fill",
					"stylers": [{
							"color": "#ffffff"
						},
						{
							"lightness": 17
						}
					]
				},
				{
					"featureType": "road.highway",
					"elementType": "geometry.stroke",
					"stylers": [{
							"color": "#ffffff"
						},
						{
							"lightness": 29
						},
						{
							"weight": 0.2
						}
					]
				},
				{
					"featureType": "road.arterial",
					"elementType": "geometry",
					"stylers": [{
							"color": "#ffffff"
						},
						{
							"lightness": 18
						}
					]
				},
				{
					"featureType": "road.local",
					"elementType": "geometry",
					"stylers": [{
							"color": "#ffffff"
						},
						{
							"lightness": 16
						}
					]
				},
				{
					"featureType": "transit",
					"elementType": "geometry",
					"stylers": [{
							"color": "#768687"
						},
						{
							"lightness": 19
						}
					]
				},
				{
					"featureType": "water",
					"elementType": "geometry",
					"stylers": [{
							"color": "#eaecec"
						},
						{
							"lightness": 17
						}
					]
				}
			]
		});

		map.addMarker({
			lat: 51.495814,
			lng: -0.10084,
			title: 'Lima',
			icon: "./img/icon-map.png",
			infoWindow: {
				content: '<strong>Studio 19</strong><br/>Elephant & Castle<br/>London</br>SE1'
			}
		});
	}

	/*************************************************************
	 * Back to Top
	 * https://github.com/imakewebthings/jquery-waypoints
	*************************************************************/

	// Toggle display of the button
	var waypoint = new Waypoint({
		element: $('.entry-content'),
		handler: function(direction) {
			$('.back-to-top').toggleClass('active', direction === 'down');
		}
	});

	// Return to top of page
	$('.back-to-top').on('click', function(e) {
		e.preventDefault();
		$('html,body').animate({
			scrollTop: 0
		}, 700);
	});

	/**
	 * Menu Classes
	 */

	// Add class for the megamenu when active
	$('.main-navigation li.has-child').on('mouseover', function() {
		$(this).find('.submenu').addClass('active');
	});

	$('.main-navigation li.has-child').on('mouseleave', function() {
		$(this).find('.submenu').removeClass('active');
	});

	/*************************************************************
	 * Mobile Menu
	 * https://github.com/dcdeiv/simpler-sidebar
	*************************************************************/

	$('#panel-left').simplerSidebar({
		opener: '.toggle-panel',
		mask: {
			display: true
		},
		animation: {
			duration: 350,
			easing: 'easeInOutCubic'
		},
		sidebar: {
			align: 'left',
			width: 350,
			closingLinks: '.close-sidebar'
		},
	});

	// Submenu Toggle
	$('.mobile-navigation li.has-child').on('click', function() {
		$(this).toggleClass('active');
		$(this).find('ul.submenu').addClass('active').slideToggle(500);
	});

	/*************************************************************
	 * Preloader
	 * https://github.com/Gix075/jqueryIntroLoader
	*************************************************************/

	$('.introLoading').introLoader({
		animation: {
			name: 'gifLoader',

			options: {
				preventScroll: false,
				delayBefore: 500,
				delayAfter: 0,
				exitTime: 300,
				customGif: 'img/load.svg',
			}
		}
	});

	/*************************************************************
	 * Lightbox
	 * https://github.com/noelboss/featherlight/
	*************************************************************/

	// Image Lightbox
	$('.image-lightbox').featherlight({
		targetAttr: 'href',
		loading: 'Loading..',
		closeOnEsc: true,
		closeOnClick: 'background',
		openSpeed: 250,
		closeSpeed: 250,
		variant: null,
	});

	// Post Format - Image
	$('figure.post-image').featherlight({
		targetAttr: 'data-image',
		loading: 'Loading..',
		closeOnEsc: true,
		closeOnClick: 'background',
		openSpeed: 250,
		closeSpeed: 250,
		variant: null,
		previousIcon: '<i class="fa fa-angle-left"></i>',
		nextIcon: '<i class="fa fa-angle-right"></i>'
	});

	// Post Format - Gallery
	$('.gallery-item > a').featherlight({
		targetAttr: 'href',
		loading: 'Loading..',
		closeOnEsc: true,
		closeOnClick: 'background',
		openSpeed: 250,
		closeSpeed: 250,
		variant: null,
		previousIcon: '<i class="fa fa-angle-left"></i>',
		nextIcon: '<i class="fa fa-angle-right"></i>'
	});

	// Portfolio Single
	$('.portfolio-single-gallery').featherlightGallery({
		loading: 'Loading..',
		closeOnEsc: true,
		closeOnClick: 'background',
		openSpeed: 250,
		closeSpeed: 250,
		previousIcon: '<i class="fa fa-angle-left"></i>',
		nextIcon: '<i class="fa fa-angle-right"></i>'
	});

	/*************************************************************
	 * Parallax
	 * https://github.com/wagerfield/parallax
	*************************************************************/

	$('#parallax-hero').parallax({
		relativeInput: true,
		clipRelativeInput: true,
		scalarX: 20,
		scalarY: 20,
		originX: 0.0,
		originY: 0.0
	});

	/*************************************************************
	 * Carousel
	 * https://github.com/kenwheeler/slick/
	*************************************************************/

	// Clients
	$('.clients-carousel').slick({
		dots: true,
		arrows: false,
		draggable: false,
		infinite: false,
		speed: 500,
		slidesToShow: 5,
		slidesToScroll: 5,
		autoplay: true,
		autoplaySpeed: 3000,
		responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					dots: true,
					draggable: true,
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					dots: true,
					draggable: true,
				}
			},
			{
				breakpoint: 481,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					dots: false,
					draggable: true,
				}
			}
		]
	});

	// Testimonials
	$('.testimonials-carousel').slick({
		dots: true,
		arrows: false,
		draggable: false,
		infinite: false,
		speed: 500,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 6000,
		responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 1,
					draggable: true,
					dots: false
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 1,
					draggable: true,
					dots: false
				}
			},
			{
				breakpoint: 481,
				settings: {
					slidesToShow: 1,
					draggable: true,
					dots: false
				}
			}
		]
	});

	// Post Format - Gallery
	$('.format-gallery').slick({
		dots: true,
		arrows: false,
		adaptiveHeight: false,
		draggable: false,
		infinite: true,
		speed: 500,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 6000,
		responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 1,
					draggable: true,
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 1,
					draggable: true,
				}
			},
			{
				breakpoint: 481,
				settings: {
					slidesToShow: 1,
					draggable: true,
				}
			}
		]
	});

	// Portfolio Single
	$('.portfolio-slider').slick({
		autoplay: false,
		dots: true,
		adaptiveHeight: true,
		customPaging: function(slider, i) {
			var thumb = $(slider.$slides[i]).data('thumb');
			return '<a><img src="' + thumb + '"></a>';
		}
	});

	/*************************************************************
	 * Isotope - Blog
	 * https://github.com/metafizzy/isotope
	*************************************************************/

	$('.isotope-blog').imagesLoaded(function() {

		var $grid = $('.isotope-blog');

		$grid.isotope({
			layoutMode: 'packery',
			itemSelector: '.grid-item',
			percentagePostion: true,
			resize: true,
			transitionDuration: '0.25s'
		});
	});

	/*************************************************************
	 * Isotope - About
	 * https://github.com/metafizzy/isotope
	*************************************************************/

	$('.isotope-studio').imagesLoaded(function() {

		var $grid = $('.isotope-studio');

		$grid.isotope({
			layoutMode: 'packery',
			itemSelector: '.grid-item',
			percentagePostion: true,
			resize: true,
			transitionDuration: '0.25s'
		});
	});

	/*************************************************************
	 * Isotope - Portfolio
	 * https://github.com/metafizzy/isotope
	*************************************************************/

	$('.isotope-portfolio').imagesLoaded(function() {

		var $grid = $('.isotope-portfolio');

		$grid.isotope({
			layoutMode: 'packery',
			itemSelector: '.grid-item',
			percentagePostion: true,
			resize: true,
			transitionDuration: '0.25s'
		});

		// Portfolio Filters
		$('.isotope-filters').on('click', 'button', function() {
			var filterValue = $(this).attr('data-filter');

			filterValue = filterValue;
			$grid.isotope({
				filter: filterValue
			});
		});
	});

	// Load More Example
	$('.load-more-wrapper > a').on('click', function() {

		var $this = $('.load-more-wrapper > a');
		var $icon = $('.load-more-wrapper > a > i');

		$this.addClass('loading fa-spin');
		$icon.addClass('fa-spin');

		setTimeout(function() {
			$this.removeClass('loading fa-spin');
			$icon.removeClass('fa-spin');
		}, 5000);
	});

	/*************************************************************
	 * Selectric
	 * https://github.com/lcdsantos/jQuery-Selectric
	*************************************************************/

	if ($('select').length) {
		$('select').selectric();
	}

	/*************************************************************
	 * Tooltips
	 * https://github.com/iamceege/tooltipster
	*************************************************************/

	$('.tooltipster').tooltipster({
		animation: 'fade',
		delay: 200,
		theme: 'tooltipster-noir',
		touchDevices: false,
		trigger: 'hover'
	});

	/*************************************************************
	 * Social icons
	 * https://github.com/tabalinas/jssocials
	*************************************************************/

	if ($('.sm-share-buttons').length) {
		$('.sm-share-buttons').jsSocials({
			shares: ['email', 'twitter', 'facebook', 'googleplus', 'linkedin', 'pinterest'],
			showLabel: true,
			showCount: true,
			shareIn: 'popup',
		});
	}

	/*************************************************************
	 * Heart Post Example
	*************************************************************/

	$('a.meta-heart').on('click', function() {
		$(this).toggleClass('liked');
	});

});