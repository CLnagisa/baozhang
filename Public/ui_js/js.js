$(document).ready(function(){
	var nowtime = getNowFormatDate();
	
});

// $(function() {
// 	$("td #repair").each(function() {
// 		$(this).on("click", function(event) {
// 			/* Act on the event */
// 			$(this).hide();
// 			$(this).siblings("#success").show();
// 			$(this).parent().siblings().children("#state").text("维修");
// 		});	
// 	});
// 	$("td #success").each(function() {
// 		$(this).click(function(event) {
// 			/* Act on the event */
// 			$(this).hide();
// 			// $(this).siblings("#repair").show();
// 			$(this).parent().siblings().children("#state").text("完成");
// 		});	
// 	});
// });

$(function() {
	$("#pages tr").hide();
	var nowpage = 0;
	$("#page li").each(function() {
		if($(this).attr("class") == "active") {
			nowpage = parseInt($(this).children("a").text());
			return false;
		} 
	});
	var now = (nowpage -1) * 10;
	for(var i = 0; i < 10; i++) {
		$("#pages").children('tr').eq(now).show();
		now++;
	}
	$("#page").each(function() {
		$(this).children('li').click(function() {
			if($(this).attr("id") == "previous") {

				//向前翻页

					var nowpage = 0;
					$("#page li").each(function() {
						if($(this).attr("class") == "active") {
							return false;
						} else {
							nowpage++;
						}
					});
				nowpage--;
				if(nowpage) {
					$("#page li").each(function() {
						$(this).removeClass();
					});
					$("#page li:eq(" + nowpage + ")").addClass("active");
				}

				$("#pages tr").hide();
				var nowpage = 0;
				$("#page li").each(function() {
					if($(this).attr("class") == "active") {
						nowpage = parseInt($(this).children("a").text());
						return false;
					} 
				});
				var now = (nowpage -1) * 10;
				for(var i = 0; i < 10; i++) {
					$("#pages").children('tr').eq(now).show();
					now++;
				}

			} else if($(this).attr("id") == "next") {

				//向后翻页

				var nowpage = 0;
				$("#page li").each(function() {
					if($(this).attr("class") == "active") {
						return false;
					} else {
						nowpage++;
					}
				});
				nowpage++;
				if(nowpage != 6) {
					$("#page li").each(function() {
						$(this).removeClass();
					});
					$("#page li:eq(" + nowpage + ")").addClass("active");
				}

				$("#pages tr").hide();
				var nowpage = 0;
				$("#page li").each(function() {
					if($(this).attr("class") == "active") {
						nowpage = parseInt($(this).children("a").text());
						return false;
					} 
				});
				var now = (nowpage -1) * 10;
				for(var i = 0; i < 10; i++) {
					$("#pages").children('tr').eq(now).show();
					now++;
				}
				
			} else {

				//点击哪一页

				$("#page li").each(function() {
					$(this).removeClass();
				});
				$(this).addClass("active");

				$("#pages tr").hide();
				var nowpage = 0;
				$("#page li").each(function() {
					if($(this).attr("class") == "active") {
						nowpage = parseInt($(this).children("a").text());
						return false;
					} 
				});
				var now = (nowpage -1) * 10;
				for(var i = 0; i < 10; i++) {
					$("#pages").children('tr').eq(now).show();
					now++;
				}

			}


			$("#page li").each(function() {
				if($(this).attr("class") == "active") {
					nowpage = parseInt($(this).children("a").text());
					return false;
				} 
			});
			var sum = $("#pages").children("tr").length;
			var yidong = 0;
			var nowyidong = 0;
			$("#page li").each(function() {
				if($(this).attr("class") == "active") {
					nowyidong = parseInt($(this).children("a").text());
					return false;
				} 
				else {
					yidong++;
				}
			})
			if(yidong == 1 && nowyidong != 1) {
				$("#page li#yema").each(function() {
					var a = parseInt($(this).children("a").text()) - 1;
					$(this).html("<a href='#page'>" + a + "<span class='sr-only'>(current)</span></a>")
				});
				$("#page li#yema").each(function() {
					$(this).removeClass("active");
				})
				$("#page li#yema").eq(1).addClass("active");
				$("#pages tr").hide();
				var nowpage = 0;
				$("#page li").each(function() {
					if($(this).attr("class") == "active") {
						nowpage = parseInt($(this).children("a").text());
						return false;
					} 
				});
				var now = (nowpage - 1) * 10;
				for(var i = 0; i < 10; i++) {
					$("#pages").children('tr').eq(now).show();
					now++;
				}
			}





			$("#page li").each(function() {
				if($(this).attr("class") == "active") {
					nowpage = parseInt($(this).children("a").text());
					return false;
				} 
			});
			var sum = $("#pages").children("tr").length;
			var yidong = 0;
			var nowyidong = 0;
			$("#page li").each(function() {
				if($(this).attr("class") == "active") {
					nowyidong = parseInt($(this).children("a").text());
					return false;
				} 
				else {
					yidong++;
				}
			});
			if(yidong == 5 && ((nowyidong * 10) < sum)) {
				$("#page li#yema").each(function() {
					var a = parseInt($(this).children("a").text()) + 1;
					$(this).html("<a href='#page'>" + a + "<span class='sr-only'>(current)</span></a>")
				});
				$("#page li#yema").each(function() {
					$(this).removeClass("active");
				})
				$("#page li#yema").eq(3).addClass("active");
				$("#pages tr").hide();
				var nowpage = 0;
				$("#page li").each(function() {
					if($(this).attr("class") == "active") {
						nowpage = parseInt($(this).children("a").text());
						return false;
					} 
				});
				var now = (nowpage - 1) * 10;
				for(var i = 0; i < 10; i++) {
					$("#pages").children('tr').eq(now).show();
					now++;
				}
			}


		});
	});


});

(function($) {
	$("#form-up").click(function() {
		$.ajax({
			url: "./ajax_info.json",
			dataType: "json",
			success: function(request) {
				alert(request.success);
			}
		});
	});
})(jQuery);

$(function() {
	$("#shiyanshi").focus(function(e) {
		$("#shiyanshi").click(function(e) {
			$("#choose").show();
			e.stopPropagation();
		});
		$("#choose").show();
		
	});
	$("ul#choose li").each(function() {
		$(this).bind("click", function() {
			$("#shiyanshi").val($(this).text());
			$("#choose").hide();
		});
	});
	$("#shiyanshi").bind("input propertychange", function() {
		if($("#shiyanshi").val() == "M" || $("#shiyanshi").val() == "m") {
			$("li#M_hide").show();
			$("li#Z_hide").hide();
		}
		if($("#shiyanshi").val() == "Z" || $("#shiyanshi").val() == "z") {
			$("li#M_hide").hide();
			$("li#Z_hide").show();
		}
		if($("#shiyanshi").val() != "M" && $("#shiyanshi").val() != "Z" && $("#shiyanshi").val() != "m" && $("#shiyanshi").val() != "z") {
			$("#shiyanshi").val("").attr("placeholder", "只能输入“M”、“m”、“Z”、“z”");
		}
	});
	$("body").click(function() {
		if($("#shiyanshi").val() == "M" || $("#shiyanshi").val() == "m") {
			$("li#M_hide").show();
			$("li#Z_hide").hide();
		} else if($("#shiyanshi").val() == "Z" || $("#shiyanshi").val() == "z") {
			$("li#M_hide").hide();
			$("li#Z_hide").show();
		} else {
			$("li#M_hide").show();
			$("li#Z_hide").show();
		}
		$("#choose").hide();
	})
});

function getNowFormatDate() {
	var date = new Date();
    var month = date.getMonth() + 1;
    var strDate = date.getDate();
    var minutes = date.getMinutes();
    var second = date.getSeconds();
    if (month >= 1 && month <= 9) {
        month = "0" + month;
    }
    if (strDate >= 0 && strDate <= 9) {
        strDate = "0" + strDate;
    }
    if (minutes >= 0 && minutes <= 9) {
    	minutes = "0" + minutes;
    }
    if (second >= 0 && second <= 9) {
    	second = "0" + second;
    }
    var currentdate = date.getFullYear() + "-" + month + "-" + strDate
            + " " + date.getHours() + ":" + minutes
            + ":" + second;
    var t = setTimeout("getNowFormatDate()", 500);
    $("#timenow").text("当前时间：" + currentdate);
}
