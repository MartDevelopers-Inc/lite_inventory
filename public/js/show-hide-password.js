

$(function() {
	"use strict";


$(document).ready(function () {

			$("#show_hide_password span").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bi-eye-slash");
					$('#show_hide_password i').removeClass("bi-eye");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bi-eye-slash");
					$('#show_hide_password i').addClass("bi-eye");
				}
			});

			$("#show_hide_password1 span").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password1 input').attr("type") == "text") {
					$('#show_hide_password1 input').attr('type', 'password');
					$('#show_hide_password1 i').addClass("bi-eye-slash");
					$('#show_hide_password1 i').removeClass("bi-eye");
				} else if ($('#show_hide_password1 input').attr("type") == "password") {
					$('#show_hide_password1 input').attr('type', 'text');
					$('#show_hide_password1 i').removeClass("bi-eye-slash");
					$('#show_hide_password1 i').addClass("bi-eye");
				}
			});

			$("#show_hide_password2 span").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password2 input').attr("type") == "text") {
					$('#show_hide_password2 input').attr('type', 'password');
					$('#show_hide_password2 i').addClass("bi-eye-slash");
					$('#show_hide_password2 i').removeClass("bi-eye");
				} else if ($('#show_hide_password2 input').attr("type") == "password") {
					$('#show_hide_password2 input').attr('type', 'text');
					$('#show_hide_password2 i').removeClass("bi-eye-slash");
					$('#show_hide_password2 i').addClass("bi-eye");
				}
			});

		});



  });