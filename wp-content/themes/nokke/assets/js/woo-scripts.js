(function ($) {
	"use strict";

	var $document = $(document);

	wooQuantityButtons();
	offcanvasMiniCart();
	addToWishlist();

	function wooQuantityButtons() {
		var forms = jQuery(".woocommerce-cart-form, form.cart");
		forms.find(".quantity.hidden").prev(".quantity__button").hide();
		forms.find(".quantity.hidden").next(".quantity__button").hide();

		$document.on(
			"click",
			"form.cart .quantity__button, .woocommerce-cart-form .quantity__button",
			function () {
				var $this = $(this);

				// Get current quantity values
				var qty = $this.closest(".quantity").find(".qty");
				var val = qty.val() == "" ? 0 : parseFloat(qty.val());
				var max = parseFloat(qty.attr("max"));
				var min = parseFloat(qty.attr("min"));
				var step = parseFloat(qty.attr("step"));

				// Change the value if plus or minus
				if ($this.is(".quantity__plus")) {
					if (max && max <= val) {
						qty.val(max).change();
					} else {
						qty.val(val + step).change();
					}
				} else {
					if (min && min >= val) {
						qty.val(min).change();
					} else if (val >= 1) {
						qty.val(val - step).change();
					}
				}
			}
		);
	}

	function offcanvasMiniCart() {
		const offcanvas = document.querySelector(".nokke-offcanvas-default");
		const trigger = document.querySelectorAll(".nokke-offcanvas-js-trigger");

		if (0 === trigger.length) {
			return;
		}

		trigger.forEach((item, i) => {
			const panel = offcanvas.querySelector(".nokke-offcanvas__panel");
			const overlay = offcanvas.querySelector(".nokke-offcanvas__overlay");
			const close = offcanvas.querySelector(".nokke-offcanvas__close");

			$document.on("added_to_cart", () => {
				if (
					typeof wc_add_to_cart_params !== "undefined" ||
					wc_add_to_cart_params.cart_redirect_after_add !== "yes"
				) {
					panel.classList.add("nokke-offcanvas__panel--is-open");
				}
			});

			item.addEventListener("click", (e) => {
				e.preventDefault();
				panel.classList.add("nokke-offcanvas__panel--is-open");
			});

			close.addEventListener("click", (e) => {
				closePanel(panel);
			}); // Close on icon click

			overlay.addEventListener("click", (e) => {
				closePanel(panel);
			}); // Close on overlay click

			window.addEventListener("scroll", (e) => {
				closePanel(panel);
			}); // Close on scroll

			document.addEventListener("keyup", (e) => {
				if (e.key === "Escape" || 27 === e.keyCode) {
					closePanel(panel);
				}
			}); // Close on esc
		});

		function closePanel(panel) {
			panel.classList.remove("nokke-offcanvas__panel--is-open");
			document.activeElement.blur();
		}
	}

	function addToWishlist() {
		$document.on("added_to_wishlist removed_from_wishlist", function () {
			$.get(
				yith_wcwl_l10n.ajax_url,
				{
					action: "yith_wcwl_update_wishlist_count",
				},
				function (data) {
					if (0 === data.count) {
						$(".nokke-menu-wishlist__count").addClass("d-none");
					} else {
						$(".nokke-menu-wishlist__count").removeClass("d-none");
					}
					$(".yith-wcwl-items-count").html(data.count);
				}
			);
		});
	}
})(jQuery);
