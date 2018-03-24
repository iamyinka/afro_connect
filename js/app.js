// jQuery(document).ready(function($) {

// 	function check_form (formId, formMsgId, postToLink) {
// 		// body...
// 		$(formId).submit(function(event) {
// 			/* Act on the event */
// 			event.preventDefault();

// 			var dataToPost = $(this).serializeArray();

// 			console.log(dataToPost);

// 			$.ajax({
// 				url: postToLink,
// 				type: 'POST',
// 				dataType: '',
// 				data: dataToPost,
// 			})
// 			.done(function() {
// 				$('#' + formMsgId).html();
// 				console.log("success");
// 			})
// 			.fail(function() {
// 				console.log("error");
// 			})
// 			.always(function() {
// 				console.log("complete");
// 			});
			
// 		});
// 	}

// 	check_form('#regForm', 'regMsg', 'register.php');

	
// });