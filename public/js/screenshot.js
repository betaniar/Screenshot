var myscreenshoot = function () {
	var blob;
	var estado;
	var img;
	var myblob;
	var printcount = 0;
	var prArr = [];
	var imagefile;
	var stateselect = $("#stateselect");
	var savebutton = $("#savecodebutton");
	var resetbutton = $("#resetbutton");
	var viewbutton = $("#viewbutton");
	var brw = window.navigator.userAgent;
	$("#prcode").bind("paste", function (e) {
		window.addEventListener("paste", processEvent);
		$("#prcode").empty();
		$("p").removeClass("img_cont");
		//this is an example from stackoverflow, credit to author
		function processEvent(e) {
			//if (!navigator.userAgent.match(/Trident.*rv\:11\./)) {
			if(e.clipboardData.getData || e.clipboardData.items.length > 0){
				console.log(e);
				for (var i = 0; i < e.clipboardData.items.length; i++) {
						// get the clipboard item
						var clipboardItem = e.clipboardData.items[i];
						var type = clipboardItem.type;
						// if it's an image add it to the image field
						if (type.indexOf("image") != -1) {
							// get the image content and create an img dom element
							myblob = clipboardItem.getAsFile();
							var blob1 = window.btoa(clipboardItem);
							var fr = new FileReader;
							fr.onloadend = function () {
								blob = fr.result;
								img = $("<img/>");
								img.attr("src", blob);
								$("#prcode").append(img);
							}

							fr.readAsDataURL(myblob);

						}

					}
			}
			else {
			console.log(window);
				var fileList = window.clipboardData.files;
				for (var i = 0; i < fileList.length; i++) {
					// get the clipboard item
					var clipboardItem = fileList[i];
					var type = clipboardItem.type;
					if (type.indexOf("image") != -1) {
						var url = URL.createObjectURL(clipboardItem);
						blob = e.msConvertURL(clipboardItem, "base64", url);
					}
				}
		}//here
		}
	}); //end of save pr code


	stateselect.on('change', function () {
		estado = $("#stateselect option:selected").val();
	});

	savebutton.on('click', function (e) {
		e.preventDefault();
	
		if (!validation()) {
			return;
		}
		
		var datatoserver = new FormData($("#savecontrolcodeform")[0]);
		estado = $("#stateselect option:selected").val();
		var imagefile = $("#prcode img").attr("src");
		datatoserver.append('imageurl', imagefile);
		datatoserver.append('option', 'savecontrol');
		datatoserver.append('state', estado);
		$.ajax({
			url: 'saveimage',
			type: "post",
			data: datatoserver,
			processData: false,
			contentType: false,
			success: function (response) {
				viewbutton.attr('href', response);
				//viewbutton.attr('id', response);
			}

		});
		
	});

	function validation() {

		if ($("#prcode").find('img').length == 0) {
			//alert("Paste an Image Please");
			$("#palert").slideDown("slow");
			return false;
		}
		return true;
	}
	resetbutton.on('click', function (e) {
		e.preventDefault();
		window.location.reload();
	});

	viewbutton.on('click', function (e) {
	
	});

}
myscreenshoot();
function displaydate() {
	var d = new Date();
	var n = d.toDateString();
	$("#datelabel").append(n);
}
displaydate();
