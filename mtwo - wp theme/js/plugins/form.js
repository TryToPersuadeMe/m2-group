$(document).ready(function() {
		$("form")
			.submit(function() {
				var a = $(this)
					.attr("id"),
					b = $("#" + a),
					c = $(b)
					.find(".msgs"),
					d = $(b)
					.find(".formToggle");
				return $.ajax({
					type: "POST",
					url: "/wp-content/themes/mtwo/mail.php",
					data: b.serialize(),
					success: function(a) {
						c.html(a), d.addClass("disable"), setTimeout(function() {
							$(".formToggle")
								.removeClass("disable"), $(".msgs")
								.html(""), $("input")
								.not(":input[type=submit], :input[type=hidden]")
								.val("")
						}, 9e9)
					},
					error: function(a, b, e) {
						c.html(e), d.css("display", "none"), setTimeout(function() {
							$(".formToggle")
								.css("display", "block"), $(".msgs")
								.html(""), $("input")
								.not(":input[type=submit], :input[type=hidden]")
								.val("")
						}, 9e9)
					}
				}), !1
			});
		var a = $(".form-fieldset > input");
		a.blur(function() {
			$(this)
				.toggleClass("filled", !!$(this)
					.val())
		})
	});