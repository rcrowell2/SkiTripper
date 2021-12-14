function updateDisplay() {
		var responseID = $('.searchType').val()
        console.log(responseID)
		if(responseID == "all"){
			$('#all').removeClass("hidden");
			$('#all').addClass("show");
            $('#state').removeClass("show");
			$('#pass').removeClass("show");
			$('#trip').removeClass("show");
            $('#state').addClass("hidden");
			$('#pass').addClass("hidden");
			$('#trip').addClass("hidden");
		} else if (responseID == "state"){
			$('#state').removeClass("hidden");
			$('#state').addClass("show");
            $('#all').removeClass("show");
			$('#pass').removeClass("show");
			$('#trip').removeClass("show");
            $('#all').addClass("hidden");
			$('#pass').addClass("hidden");
			$('#trip').addClass("hidden");
		} else if (responseID == "pass"){
			$('#pass').removeClass("hidden");
			$('#pass').addClass("show");
            $('#all').removeClass("show");
			$('#state').removeClass("show");
			$('#trip').removeClass("show");
            $('#all').addClass("hidden");
			$('#state').addClass("hidden");
			$('#trip').addClass("hidden");
		} else if (responseID == "trip"){
			$('#trip').removeClass("hidden");
			$('#trip').addClass("show");
            $('#all').removeClass("show");
			$('#pass').removeClass("show");
			$('#state').removeClass("show");
            $('#all').addClass("hidden");
			$('#pass').addClass("hidden");
			$('#state').addClass("hidden");
		} else {
            $('#all').removeClass("show");
			$('#pass').removeClass("show");
			$('#state').removeClass("show");
            $('#all').addClass("hidden");
			$('#pass').addClass("hidden");
			$('#state').addClass("hidden");
            $('#trip').removeClass("show");
			$('#trip').addClass("hidden");
        }
}