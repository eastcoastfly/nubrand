import "../../vendor/js/waapi-animate-details";
(function ($, window, document) {
	/**
	 *   ... code out here will run immediately on load
	 */
	const debounce = function (func, delay) {
		let timer;
		return function () {
			//anonymous function
			const context = this;
			const args = arguments;
			clearTimeout(timer);
			timer = setTimeout(() => {
				func.apply(context, args);
			}, delay);
		};
	};
	const throttle = (func, limit) => {
		let inThrottle;
		return function () {
			const args = arguments;
			const context = this;
			if (!inThrottle) {
				func.apply(context, args);
				inThrottle = true;
				setTimeout(() => (inThrottle = false), limit);
			}
		};
	};

	/**
	 *
	 *   ... code in here will run after jQuery says document is ready
	 */
	$(function () {
		let root = document.documentElement;
		let $headerHeight = $("header.header").outerHeight() + "px";
		root.style.setProperty("--nu--mainel--offset", $headerHeight);
		root.style.setProperty(
			"--nu--full--screen--height",
			"calc(100vh - " + $headerHeight + ")"
		);

		window.addEventListener(
			"resize",
			debounce(function () {
				let root = document.documentElement;
				let $headerHeight = $("header.header").outerHeight() + "px";
				root.style.setProperty("--nu--mainel--offset", $headerHeight);
				root.style.setProperty(
					"--nu--full--screen--height",
					"calc(100vh - " + $headerHeight + ")"
				);
			}, 20),
			false
		);

		let alertPopup = $("#nu__alerts");
		if (alertPopup.length) {
			alertPopup.prepend(
				'<button class="toggle-alert"><i class="fa-regular fa-chevron-left"></i></button>'
			);
			alertPopup.addClass("is-open");
			if (localStorage.getItem("alert-dismissed")) {
				alertPopup.removeClass("is-open");
			}
		}
		$(alertPopup).on("click", ".toggle-alert", function () {
			alertPopup.toggleClass("is-open");
			localStorage.setItem("alert-dismissed", true);
		});

		// //
		// $('html').css('margin-top', '0');
		// //

		// //
		// $("body").css(
		// 	"--nu--full--screen--height",
		// 	"calc(100vh - " + $headerHeight + ")"
		// );
		// //
		// $("body").css("--nu--mainel--offset", $headerHeight);
		// //
		// let $offset_minimalView = $("header.header").outerHeight();
		// //
		// if (window.pageYOffset > $offset_minimalView) {
		// 	$("body").addClass("is-using-minimal-header-view");
		// }

		//
		var lastScrollTop = 0;
		window.addEventListener(
			"scroll",
			throttle(function () {
				var st =
					window.pageYOffset || document.documentElement.scrollTop;
				let $offset_minimalView = $("header.header").outerHeight();
				if (st > lastScrollTop) {
					if (window.pageYOffset > $offset_minimalView) {
						$("body").addClass("is-using-minimal-header-view");
					}
				} else {
					if (window.pageYOffset < $offset_minimalView) {
						$("body").removeClass("is-using-minimal-header-view");
					}
				}
				lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
			}, 10),
			false
		);
		//

		// * Change slider bullets to add numbers (CODE FROM KYLE)
		// * This is for the new slider with no arrows and red pagination boxes
		let indexed_dotnav_slider = {
			_init: function () {
				if (
					!$(
						".wp-block-eedee-block-gutenslider.patterns--sliders--red-buttons"
					).length
				) {
					return;
				}

				// grab the real instance of this slider
				let $instance = $(
					".wp-block-eedee-block-gutenslider.patterns--sliders--red-buttons"
				)[0].gutenslider.swiperInstance;
				// adjust settings not exposed in the CMS
				// $instance.allowTouchMove = false;
				// get the actual bullets from the actual instance (do not look thru the DOM)
				let $bullets = $instance.pagination.$el[0];
				//
				$($bullets)
					.children()
					.each(function (index, element) {
						$(element).html(index + 1);
					});
			},
		};
		indexed_dotnav_slider._init();

		//
		//
		//

		let ThisWork = $(".temp--some-special-class");
		ThisWork.append(
			'<aside class="is-the-scroll-bar-track"><div class="is-the-scroll-bar-thumb"></div></aside>'
		);

		//
		//

		// get the offset of the scroll track thumb,
		// get the offset of various p.is-style-eyebrow
		// if eyebrow is higher up on the page than the thumb - offset;
		// switch eyebrow to primary color
		//

		const animated_eyebrows = $(
			".temp--some-special-class p.is-style-eyebrow"
		);

		const elem_data = [];

		animated_eyebrows.each(function (index, element) {
			elem_data.push($(element));
		});

		if (elem_data.length) {
			window.addEventListener(
				"scroll",
				throttle(function (e) {
					let thumbParentPos = $(".temp--some-special-class").offset()
						.top;
					let thumbPos = $(
						".is-the-scroll-bar-track .is-the-scroll-bar-thumb"
					).offset().top;

					elem_data.forEach((element) => {
						let elemOffset = $(element).offset().top;
						let actionOffset = 128;

						if (elemOffset < thumbPos + actionOffset) {
							// element.addClass("has-primary-color");
							// element.addClass("has-text-color");
							element.addClass("has-active-text-color");
						} else {
							// element.removeClass("has-primary-color");
							// element.removeClass("has-text-color");
							element.removeClass("has-active-text-color");
						}
					});
				}, 16)
			);
		}

		//
		//
		//
		//

		//
		//
		//
		// ? 		handle a delayed fade in for... something, i forgot.
		//
		//
		//
		setTimeout(function () {
			$(".is-special-fadein strong").animate(
				{
					opacity: 1,
					left: 0,
				},
				1000,
				function () {
					// animation callback
				}
			);
		}, 2000);

		//
		//
		//
		//
		$("#nu__cookiewarning").on(
			"click",
			"button.cookies-accept",
			function (e) {
				localStorage.setItem("acceptCookies", "true");
				$("#nu__cookiewarning").remove();
			}
		);

		//
		//
		//
		//
		$("#nu__cookiewarning").on("click", "span.closeicon", function (e) {
			$("#nu__cookiewarning").remove();
		});

		//
		//
		//
		if (localStorage.getItem("acceptCookies") !== "true") {
			$("#nu__cookiewarning").show().css("display", "flex");
		} else {
			$("#nu__cookiewarning").remove();
		}

		if (localStorage.getItem("alertsHidden") !== "true") {
			$(".nu__alerts--wrapper").show();
		}

		$(".nu__alerts--wrapper").on("click", ".closeicon", function (e) {
			$(".nu__alerts--wrapper").hide();
			localStorage.setItem("alertsHidden", "true");
		});
		//

		//
		//
		//
		$(".wp-block-image.is-video-placeholder a").magnificPopup({
			type: "iframe",
		});

		//
		//
		//
		$(
			".wp-block-button.is-style-playhead .wp-block-button__link"
		).magnificPopup({
			type: "iframe",
		});

		//
		//
		//
		$(".wp-block-image.js__magnific img").magnificPopup({
			type: "image",
		});

		//
		//
		//
		$(".js__magnific.mfp-iframe .wp-block-button__link").magnificPopup({
			type: "ajax",
		});

		//
		//
		// * Clear the search form for WP-style search (on search results page)
		$(".nu__sitesearch-close").click(function () {
			$(".search-results-info").find("#sitesearch-input").val("");
			$(".navlinks--container").find("#sitesearch-input").val("");
		});

		//
		//
		// * Function to automatically open an accordion if a hash is in the URL
		let accordion_hash_handler = {
			_init: function () {
				// * Get the actual hash (anchor tag)
				let hash = window.location.hash;

				// * Get the accordion item with the hash above
				let anchor = $(".wp-block-nu-blocks-accordion-item" + hash);

				// * Exit the function if there is no accordion item with this hash
				if (!anchor.length) {
					return;
				}

				// * Otherwise click open the element's summary with this hash
				$(anchor).find("summary").click();
			},
		};

		//
		//
		// * Run the accordion hash handler function if a hash has been passed in the URL
		if (window.location.hash) {
			accordion_hash_handler._init();
		}
	});
})(window.jQuery, window, document);
