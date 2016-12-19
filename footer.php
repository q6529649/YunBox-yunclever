</div>

<?php wp_footer(); ?>
<script>
		//init loader
		NProgress.start();
		$.html5Loader({
				filesToLoad: '//localhost/demo/wp-content/themes/YunBox-master/js/file.json',
				stopExecution: true,
				onBeforeLoad: function() {
						$(".loading-icon").show();
						$(".loader-img").show();
						$(".load-tips").fadeIn('slow');
				},
				onComplete: function() {
						NProgress.done(true);
						setTimeout(function() {
								$(".loading-icon").hide();
								$(".loader-img").hide();
								$(".load-tips").fadeOut('fast');
								$("#wrapper").animate({
										opacity: 1
								}, 600);
						}, 1500);
						console.log("All the assets are loaded!");
				},
				onUpdate: function(percentage) {
						$("#load-per").html(percentage + "%");
						NProgress.set(percentage / 100);
				}
		});
		$(document).ready(function() {
			/*
				outdatedBrowser({
						bgColor: '#f25648',
						color: '#ffffff',
						lowerThan: 'transform',
						languagePath: './outdatedbrowser/lang/zh-cn.html'
				});
				*/

				$.ajaxSetup({
						cache: false
				});
				//menu
				$("#menu li").on("mouseenter", function() {
						$(this).find("span").animate({
								top: '-100px'
						}, 200);
						$(this).find("font").animate({
								bottom: '0'
						}, 200);
				});
				$("#menu li").on("mouseleave", function() {
						$(this).find("span").animate({
								top: '0'
						}, 200);
						$(this).find("font").animate({
								bottom: '-100px'
						}, 200);
				});
				//video
				$(".video-title ul li").on("click", function() {
						var url = $(this).attr("data-url");
						var str = '<video src="' + url + '" controls="controls" width="100%" height="100%" preload="preload"></video>'
						$(".video-play").find("video").remove();
						$(".video-play").html(str);
				});
				//fullpage
				var slideAuto = null,
						time = 6000;

				function autoSlide() {
						$.fn.fullpage.moveSlideRight();
				}
				var init_url = $(".video-title").find("li").first().attr("data-url");
				$('#fullpage').fullpage({
						sectionSelector: '.section',
						slideSelector: '.slide',
						scrollingSpeed: 400,
						autoScrolling: true,
						loopHorizontal: true,
						responsiveWidth: 0,
						responsiveHeight: 0,
						resize: true,
						lockAnchors: false,
						anchors: ['home', 'video', 'services', 'brands', 'work', 'about', 'contact'],
						menu: '#menu',
						slidesNavigation: true,
						recordHistory: true,
						afterLoad: function(anchorLink, index) {
								clearInterval(slideAuto);
								$(".top-fixed").addClass("fadeInDown animated");
								if (anchorLink == 'home') {
										$(".logo").find("img").attr("src", "./wp-content/themes/YunBox-master/images/LOGO.png");
										$(".menu ul li a").css("color", "#008cd7");
										slideAuto = setInterval(autoSlide, time);
								} else {
										$(".logo").find("img").attr("src", "./wp-content/themes/YunBox-master/images/LOGO.png");
										$(".menu ul li a").css("color", "#FFF");

								}
								if (anchorLink == 'services') {
										slideAuto = setInterval(autoSlide, time);
										$("#animate-idea").css("visibility", "visible").addClass("fadeInDown animated");
										$(".animate-title").css("visibility", "visible").addClass("fadeInUp animated delay-05s");
										$("#animate-media").css("visibility", "visible").addClass("fadeInDown animated");
										$(".animate-mtitle").css("visibility", "visible").addClass("fadeInUp animated delay-05s");
								}
								if (anchorLink == 'brands') {
										$(".brand-list").css("visibility", "visible").addClass("fadeInUp animated");
								}
								if (anchorLink == 'about') {
										$(".animate-client").css("visibility", "visible").addClass("fadeInLeft animated");
										$(".animate-cj").css("visibility", "visible").addClass("fadeInRight animated");
								}
								if (anchorLink == 'contact') {
										$(".contact-us").css("visibility", "visible").addClass("fadeIn animated");
								}
								if (anchorLink == 'video') {
										var init_video = '<video src="' + init_url + '" controls="controls" width="100%" height="100%" preload="preload"></video>';
										$(".video-play").html(init_video);
								}
						},
						onLeave: function(index, nextIndex, direction) {
								if (index == 1) {
										$(".top-fixed").removeClass("fadeInDown animated");
								} else {
										$(".top-fixed").addClass("fadeInDown animated");
								}
								if (index == 2) {
										var cur_url = $(".video-play").find("video").attr("src");
										init_url = cur_url;
										$(".video-play").find("video").remove();
								}
								if (index == 3) {
										$("#animate-idea").removeClass("fadeInDown animated").css("visibility", "hidden");
										$(".animate-title").removeClass("fadeInUp animated delay-05s").css("visibility", "hidden");
										$("#animate-media").removeClass("fadeInDown animated").css("visibility", "hidden");
										$(".animate-mtitle").removeClass("fadeInUp animated delay-05s").css("visibility", "hidden");
								}
								if (index == 4) {
										$(".brand-list").removeClass("fadeInUp animated").css("visibility", "hidden");
								}
								if (index == 6) {
										$(".animate-client").removeClass("fadeInLeft animated").css("visibility", "hidden");
										$(".animate-cj").removeClass("fadeInRight animated").css("visibility", "hidden");
								}
								if (index == 7) {
										$(".contact-us").removeClass("fadeIn animated").css("visibility", "hidden");
								}
						},
						afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex) {
								if (anchorLink == "services" && slideIndex == 0) {
										$("#animate-idea").css("visibility", "visible").addClass("fadeInDown animated");
										$(".animate-title").css("visibility", "visible").addClass("fadeInUp animated delay-05s");
								}
								if (anchorLink == "services" && slideIndex == 1) {
										$("#animate-media").css("visibility", "visible").addClass("fadeInDown animated");
										$(".animate-mtitle").css("visibility", "visible").addClass("fadeInUp animated delay-05s");
								}
								if (anchorLink == "about" && slideIndex == 0) {
										$(".animate-client").css("visibility", "visible").addClass("fadeInLeft animated");
										$(".animate-cj").css("visibility", "visible").addClass("fadeInRight animated");
								}
								if (anchorLink == "about" && slideIndex == 1) {
										$(".animate-client").css("visibility", "visible").addClass("fadeInLeft animated");
										$(".animate-cj").css("visibility", "visible").addClass("fadeInRight animated");
								}
								if (anchorLink == "about" && slideIndex == 2) {
										$(".animate-client").css("visibility", "visible").addClass("fadeInLeft animated");
										$(".animate-cj").css("visibility", "visible").addClass("fadeInRight animated");
								}
								if (anchorLink == "about" && slideIndex == 3) {
										$(".animate-client").css("visibility", "visible").addClass("fadeInLeft animated");
										$(".animate-cj").css("visibility", "visible").addClass("fadeInRight animated");
								}
								if (anchorLink == "about" && slideIndex == 4) {
										$(".animate-client").css("visibility", "visible").addClass("fadeInLeft animated");
										$(".animate-cj").css("visibility", "visible").addClass("fadeInRight animated");
								}
								if (anchorLink == "about" && slideIndex == 5) {
										$(".animate-client").css("visibility", "visible").addClass("fadeInLeft animated");
										$(".animate-cj").css("visibility", "visible").addClass("fadeInRight animated");
								}
						},
						onSlideLeave: function(anchorLink, index, slideIndex, direction, nextSlideIndex) {
								if (anchorLink == "services" && slideIndex == 0) {
										$("#animate-idea").removeClass("fadeInDown animated").css("visibility", "hidden");
										$(".animate-title").removeClass("fadeInUp animated delay-05s").css("visibility", "hidden");
								}
								if (anchorLink == "services" && slideIndex == 1) {
										$("#animate-media").removeClass("fadeInDown animated").css("visibility", "hidden");
										$(".animate-mtitle").removeClass("fadeInUp animated delay-05s").css("visibility", "hidden");
								}
								if (anchorLink == "about" && slideIndex == 0) {
										$(".animate-client").removeClass("fadeInLeft animated").css("visibility", "hidden");
										$(".animate-cj").removeClass("fadeInRight animated").css("visibility", "hidden");
								}
								if (anchorLink == "about" && slideIndex == 1) {
										$(".animate-client").removeClass("fadeInLeft animated").css("visibility", "hidden");
										$(".animate-cj").removeClass("fadeInRight animated").css("visibility", "hidden");
								}
								if (anchorLink == "about" && slideIndex == 2) {
										$(".animate-client").removeClass("fadeInLeft animated").css("visibility", "hidden");
										$(".animate-cj").removeClass("fadeInRight animated").css("visibility", "hidden");
								}
								if (anchorLink == "about" && slideIndex == 3) {
										$(".animate-client").removeClass("fadeInLeft animated").css("visibility", "hidden");
										$(".animate-cj").removeClass("fadeInRight animated").css("visibility", "hidden");
								}
								if (anchorLink == "about" && slideIndex == 4) {
										$(".animate-client").removeClass("fadeInLeft animated").css("visibility", "hidden");
										$(".animate-cj").removeClass("fadeInRight animated").css("visibility", "hidden");
								}
								if (anchorLink == "about" && slideIndex == 5) {
										$(".animate-client").removeClass("fadeInLeft animated").css("visibility", "hidden");
										$(".animate-cj").removeClass("fadeInRight animated").css("visibility", "hidden");
								}
						}
				});

				//case carousel
				var carousel = $("#carousel").featureCarousel({
						largeFeatureWidth: 1,
						largeFeatureHeight: 1,
						smallFeatureWidth: .85,
						smallFeatureHeight: .85,
						topPadding: 100,
						sidePadding: 0,
						smallFeatureOffset: 50,
						startingFeature: 1,
						autoPlay: false,
						carouselSpeed: 500,
						trackerIndividual: false,
						trackerSummation: false,
						leftButtonTag: '#carousel-left',
						rightButtonTag: '#carousel-right',
						captionBelow: true,
						clickedCenter: function(feature) {
								console.log(feature);
								//case-show
								var case_id = feature.find('a').attr('data-case_id');
								$(".loader").show();
								$(".menu").slideUp(200);
								var close_in = function() {
										$(".icon-close").addClass("slideInRight animated");
								}
								setTimeout(close_in, 200);
								$(".case-slide-show").load('case.php?id=' + case_id, function() { //请求案例页面
										$("#cs-case").sudoSlider({
												effect: "slide",
												speed: '300',
												controlsFade: false,
												auto: false,
												continuous: true,
												numeric: true,
												prevNext: true,
												responsive: true,
												numericAttr: 'class="numeric"',
												prevHtml: '<a href="./#" class="c-prev"></a>',
												nextHtml: '<a href="./#" class="c-next"></a>',
												initCallback: function() {
														var remove_ani = function() {
																$(".icon-close").removeClass("slideInRight animated");
														}
														setTimeout(remove_ani, 1000);
														$.fn.fullpage.setAllowScrolling(false);
														$.fn.fullpage.setKeyboardScrolling(false);
														$(".cs-case").css('visibility', 'visible');
														$(".cs-case").css('display', 'none');
														$(".cs-case").slideDown(200);
														$(".loader").hide();
														doResizeCheck();
												}
										});
										$(".back,.icon-close").on("click", function() {
												$(".cs-case").slideUp(200);
												var menu_down = function() {
														$(".menu").slideDown(200);
												}
												setTimeout(menu_down, 200);
												$.fn.fullpage.setAllowScrolling(true);
												$.fn.fullpage.setKeyboardScrolling(true);
										});
								});
						}
				});

				//carousel
				var teamcarousel = $("#team-carousel");
				teamcarousel.Cloud9Carousel({
						yOrigin: 50,
						xRadius: 500,
						yRadius: 50,
						speed: 6,
						itemClass: "card",
						buttonLeft: $(".carousel-left"),
						buttonRight: $(".carousel-right"),
						bringToFront: true,
						onLoaded: function(carousel) {
								teamcarousel.css('visibility', 'visible');
								teamcarousel.css('display', 'none');
								teamcarousel.fadeIn(1500);
								$(".card h2,.card h3,.card article").hide();
								$(".item0 h2,.item0 h3,.item0 article").fadeIn();
						},
						onRendered: function(carousel) {
								var count = teamcarousel.data("carousel").nearestIndex();
								if (count == 0) {
										$(".item0 h2,.item0 h3,.item0 article").show();
										$(".item1 h2,.item1 h3,.item1 article").hide();
										$(".item2 h2,.item2 h3,.item2 article").hide();
										$(".item3 h2,.item3 h3,.item3 article").hide();
										$(".item4 h2,.item4 h3,.item4 article").hide();
										$(".item5 h2,.item5 h3,.item5 article").hide();
										$(".item6 h2,.item6 h3,.item6 article").hide();
										$(".item7 h2,.item7 h3,.item7 article").hide();
										$(".item8 h2,.item8 h3,.item8 article").hide();
										$(".item9 h2,.item9 h3,.item9 article").hide();
								}
								if (count == 1) {
										$(".item1 h2,.item1 h3,.item1 article").show();
										$(".item0 h2,.item0 h3,.item0 article").hide();
										$(".item2 h2,.item2 h3,.item2 article").hide();
										$(".item3 h2,.item3 h3,.item3 article").hide();
										$(".item4 h2,.item4 h3,.item4 article").hide();
										$(".item5 h2,.item5 h3,.item5 article").hide();
										$(".item6 h2,.item6 h3,.item6 article").hide();
										$(".item7 h2,.item7 h3,.item7 article").hide();
										$(".item8 h2,.item8 h3,.item8 article").hide();
										$(".item9 h2,.item9 h3,.item9 article").hide();
								}
								if (count == 2) {
										$(".item2 h2,.item2 h3,.item2 article").show();
										$(".item0 h2,.item0 h3,.item0 article").hide();
										$(".item1 h2,.item1 h3,.item1 article").hide();
										$(".item3 h2,.item3 h3,.item3 article").hide();
										$(".item4 h2,.item4 h3,.item4 article").hide();
										$(".item5 h2,.item5 h3,.item5 article").hide();
										$(".item6 h2,.item6 h3,.item6 article").hide();
										$(".item7 h2,.item7 h3,.item7 article").hide();
										$(".item8 h2,.item8 h3,.item8 article").hide();
										$(".item9 h2,.item9 h3,.item9 article").hide();
								}
								if (count == 3) {
										$(".item3 h2,.item3 h3,.item3 article").show();
										$(".item0 h2,.item0 h3,.item0 article").hide();
										$(".item1 h2,.item1 h3,.item1 article").hide();
										$(".item2 h2,.item2 h3,.item2 article").hide();
										$(".item4 h2,.item4 h3,.item4 article").hide();
										$(".item5 h2,.item5 h3,.item5 article").hide();
										$(".item6 h2,.item6 h3,.item6 article").hide();
										$(".item7 h2,.item7 h3,.item7 article").hide();
										$(".item8 h2,.item8 h3,.item8 article").hide();
										$(".item9 h2,.item9 h3,.item9 article").hide();
								}
								if (count == 4) {
										$(".item4 h2,.item4 h3,.item4 article").show();
										$(".item0 h2,.item0 h3,.item0 article").hide();
										$(".item1 h2,.item1 h3,.item1 article").hide();
										$(".item2 h2,.item2 h3,.item2 article").hide();
										$(".item3 h2,.item3 h3,.item3 article").hide();
										$(".item5 h2,.item5 h3,.item5 article").hide();
										$(".item6 h2,.item6 h3,.item6 article").hide();
										$(".item7 h2,.item7 h3,.item7 article").hide();
										$(".item8 h2,.item8 h3,.item8 article").hide();
										$(".item9 h2,.item9 h3,.item9 article").hide();
								}
								if (count == 5) {
										$(".item5 h2,.item5 h3,.item5 article").show();
										$(".item0 h2,.item0 h3,.item0 article").hide();
										$(".item1 h2,.item1 h3,.item1 article").hide();
										$(".item2 h2,.item2 h3,.item2 article").hide();
										$(".item3 h2,.item3 h3,.item3 article").hide();
										$(".item4 h2,.item4 h3,.item4 article").hide();
										$(".item6 h2,.item6 h3,.item6 article").hide();
										$(".item7 h2,.item7 h3,.item7 article").hide();
										$(".item8 h2,.item8 h3,.item8 article").hide();
										$(".item9 h2,.item9 h3,.item9 article").hide();
								}
								if (count == 6) {
										$(".item6 h2,.item6 h3,.item6 article").show();
										$(".item0 h2,.item0 h3,.item0 article").hide();
										$(".item1 h2,.item1 h3,.item1 article").hide();
										$(".item2 h2,.item2 h3,.item2 article").hide();
										$(".item3 h2,.item3 h3,.item3 article").hide();
										$(".item4 h2,.item4 h3,.item4 article").hide();
										$(".item5 h2,.item5 h3,.item5 article").hide();
										$(".item7 h2,.item7 h3,.item7 article").hide();
										$(".item8 h2,.item8 h3,.item8 article").hide();
										$(".item9 h2,.item9 h3,.item9 article").hide();
								}
								if (count == 7) {
										$(".item7 h2,.item7 h3,.item7 article").show();
										$(".item0 h2,.item0 h3,.item0 article").hide();
										$(".item1 h2,.item1 h3,.item1 article").hide();
										$(".item2 h2,.item2 h3,.item2 article").hide();
										$(".item3 h2,.item3 h3,.item3 article").hide();
										$(".item4 h2,.item4 h3,.item4 article").hide();
										$(".item5 h2,.item5 h3,.item5 article").hide();
										$(".item6 h2,.item6 h3,.item6 article").hide();
										$(".item8 h2,.item8 h3,.item8 article").hide();
										$(".item9 h2,.item9 h3,.item9 article").hide();
								}
								if (count == 8) {
										$(".item8 h2,.item8 h3,.item8 article").show();
										$(".item0 h2,.item0 h3,.item0 article").hide();
										$(".item1 h2,.item1 h3,.item1 article").hide();
										$(".item2 h2,.item2 h3,.item2 article").hide();
										$(".item3 h2,.item3 h3,.item3 article").hide();
										$(".item4 h2,.item4 h3,.item4 article").hide();
										$(".item5 h2,.item5 h3,.item5 article").hide();
										$(".item6 h2,.item6 h3,.item6 article").hide();
										$(".item7 h2,.item7 h3,.item7 article").hide();
										$(".item9 h2,.item9 h3,.item9 article").hide();
								}
								if (count == 9) {
										$(".item9 h2,.item9 h3,.item9 article").show();
										$(".item0 h2,.item0 h3,.item0 article").hide();
										$(".item1 h2,.item1 h3,.item1 article").hide();
										$(".item2 h2,.item2 h3,.item2 article").hide();
										$(".item3 h2,.item3 h3,.item3 article").hide();
										$(".item4 h2,.item4 h3,.item4 article").hide();
										$(".item5 h2,.item5 h3,.item5 article").hide();
										$(".item6 h2,.item6 h3,.item6 article").hide();
										$(".item7 h2,.item7 h3,.item7 article").hide();
										$(".item8 h2,.item8 h3,.item8 article").hide();
								}
						}
				});

				//comment-show
				$("#show-comment").on("click", function() {
						$(".loader").show();
						$(".menu").slideUp(200);
						var close_in = function() {
								$(".icon-close").addClass("slideInRight animated");
						}
						setTimeout(close_in, 200);
						$(".comment-slide-show").load('comment.php', function() {
								$("#cs-comment").sudoSlider({
										effect: "slide",
										speed: '300',
										controlsFade: false,
										auto: false,
										continuous: true,
										numeric: true,
										prevNext: true,
										responsive: true,
										numericAttr: 'class="numeric"',
										prevHtml: '<a href="./#" class="c-prev"></a>',
										nextHtml: '<a href="./#" class="c-next"></a>',
										initCallback: function() {
												var remove_ani = function() {
														$(".icon-close").removeClass("slideInRight animated");
												}
												setTimeout(remove_ani, 1000);
												$.fn.fullpage.setAllowScrolling(false);
												$.fn.fullpage.setKeyboardScrolling(false);
												$(".cs-comment").css('visibility', 'visible');
												$(".cs-comment").css('display', 'none');
												$(".cs-comment").slideDown(200);
												$(".loader").hide();
												doResizeCheck();
										}
								});
								$(".icon-close").on("click", function() {
										$(".cs-comment").slideUp(200);
										var menu_down = function() {
												$(".menu").slideDown(200);
										}
										setTimeout(menu_down, 200);
										$.fn.fullpage.setAllowScrolling(true);
										$.fn.fullpage.setKeyboardScrolling(true);
								});
						});
				});

				//hr-show
				$("#show-join").on("click", function() {
						$(".loader").show();
						$(".menu").slideUp(200);
						var close_in = function() {
								$(".icon-close").addClass("slideInRight animated");
						}
						setTimeout(close_in, 200);
						$(".join-slide-show").load('hr.php', function() {
								$("#cs-joinus").sudoSlider({
										effect: "slide",
										speed: '300',
										controlsFade: false,
										auto: false,
										continuous: true,
										numeric: true,
										prevNext: true,
										responsive: true,
										numericAttr: 'class="numeric"',
										prevHtml: '<a href="./#" class="c-prev"></a>',
										nextHtml: '<a href="./#" class="c-next"></a>',
										initCallback: function() {
												var remove_ani = function() {
														$(".icon-close").removeClass("slideInRight animated");
												}
												setTimeout(remove_ani, 1000);
												$.fn.fullpage.setAllowScrolling(false);
												$.fn.fullpage.setKeyboardScrolling(false);
												$(".cs-joinus").css('visibility', 'visible');
												$(".cs-joinus").css('display', 'none');
												$(".cs-joinus").slideDown(200);
												$(".loader").hide();
												doResizeCheck();
										}
								});
								$(".icon-close").on("click", function() {
										$(".cs-joinus").slideUp(200);
										var menu_down = function() {
												$(".menu").slideDown(200);
										}
										setTimeout(menu_down, 200);
										$.fn.fullpage.setAllowScrolling(true);
										$.fn.fullpage.setKeyboardScrolling(true);
								});
						});
				});

				//party-show
				$("#show-party").on("click", function() {
						$(".loader").show();
						$(".menu").slideUp(200);
						var close_in = function() {
								$(".icon-close").addClass("slideInRight animated");
						}
						setTimeout(close_in, 200);
						$(".join-slide-show").load('party.php', function() {
								var remove_ani = function() {
										$(".icon-close").removeClass("slideInRight animated");
								}
								setTimeout(remove_ani, 1000);
								$.fn.fullpage.setAllowScrolling(false);
								$.fn.fullpage.setKeyboardScrolling(false);
								$(".cs-joinus").css('visibility', 'visible');
								$(".cs-joinus").css('display', 'none');
								$(".cs-joinus").slideDown(200);
								$(".loader").hide();
								doResizeCheck();
								$(".icon-close").on("click", function() {
										$(".cs-joinus").slideUp(200);
										var menu_down = function() {
												$(".menu").slideDown(200);
										}
										setTimeout(menu_down, 200);
										$.fn.fullpage.setAllowScrolling(true);
										$.fn.fullpage.setKeyboardScrolling(true);
								});
						});
				});

				//resize detect
				doResizeCheck();
				$(window).resize(function() {
						doResizeCheck();
				});

				function doResizeCheck() {
						$(".content-zoom").each(function(idx, elem) {
								var curr_zoom = $(elem).data("curr_zoom");
								if (curr_zoom == undefined) {
										curr_zoom = 1;
								} else {
										curr_zoom = parseFloat(curr_zoom);
								}

								var extra_buffer_width = $(elem).data("extra_buffer_width");
								if (extra_buffer_width == undefined) {
										extra_buffer_width = 0;
								} else {
										extra_buffer_width = parseFloat(extra_buffer_width);
								}

								var extra_buffer_height = $(elem).data("extra_buffer_height");
								if (extra_buffer_height == undefined) {
										extra_buffer_height = 0;
								} else {
										extra_buffer_height = parseFloat(extra_buffer_height);
								}

								var elem_height = $(elem).height();
								var window_height = $(window).height();
								var elem_width = $(elem).width();
								var window_width = $(window).width();
								if ((elem_height == 0) || (window_height == 0)) return;

								var head_footer_height = 200;
								head_footer_height += extra_buffer_height;

								var left_right_width = 120;
								left_right_width += extra_buffer_width;

								var zoom_required_by_width = null;
								var max_elem_width = window_width - left_right_width;
								zoom_required_by_width = max_elem_width / elem_width;

								var max_elem_height = window_height - head_footer_height;
								var zoom_required_by_height = max_elem_height / elem_height;

								var max_zoom = $(elem).data("max_zoom");

								if (max_zoom == "UNLIMITED") {
										max_zoom = "10000";
								} else if (max_zoom != undefined) {
										max_zoom = parseFloat(max_zoom);
								} else {
										max_zoom = 1;
								}

								var zoom = Math.min(zoom_required_by_width, zoom_required_by_height, max_zoom);
								$(elem).css("-webkit-transform", "scale(" + zoom + "," + zoom + ")");
								$(elem).css("-moz-transform", "scale(" + zoom + "," + zoom + ")");
								$(elem).css("-ms-transform", "scale(" + zoom + "," + zoom + ")");
								$(elem).css("transform", "scale(" + zoom + "," + zoom + ")");
								$(elem).data("curr_zoom", "" + zoom);
						});
				}
		});
</script>
</body>
</html>
