jQuery(document).ready(function(e){"use strict";e(function(){var o=e(".header-top");e(window).on("scroll",function(){e(window).scrollTop()>=50?o.removeClass("header-top").addClass("header-top-dark"):o.removeClass("header-top-dark").addClass("header-top")})})});