	$(function(){
	
	function internationale(){
		/**
		 * Controls the active language and memory management of user preferred language
		 */
		var lang = getCookie("lang");
		if(lang==""){
			setCookie("lang","ru",365);
			lang = "ru";
		}

		$(".lang").addClass("hidden");
		$(".lang").css("visibility","visible");
		$(".lang."+lang).removeClass("hidden");
	}	
	function toggleInternationale(){
		/** 
		 *  reads the selected language in the triggering control, updates the user preferred language and calls the language control function `internationale`
		 */
		var lang = $(this).find(":selected").text();
		setCookie("lang",lang,365);
		internationale();
	}
	function main(){
		//update copyrights sections
		$(".copyright-date").html((new Date().getFullYear()));	
		internationale();
		$(".international").val(getCookie("lang")).on("change",toggleInternationale);
		$("#client-validate")
			.prop("checked",getCookie("server-side") === 'true')
			.on("change",function(){
				setCookie("server-side", $(this).is(":checked"));
		});

		$("title,.title").html("Маркеты");
	}
	main();
})