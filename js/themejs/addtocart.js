/* -------------------------------------------------------------------------------- /
	
	Magentech jQuery
	Created by Magentech
	v1.0 - 20.9.2016
	All rights reserved.
	
/ -------------------------------------------------------------------------------- */


	// Cart add remove functions
	var cart = {
		'add': function(product_id, quantity, product_img, product_name) {
			addProductNotice('Product added to Cart', '<img src="'+product_img+'">', '<h3><a href="product.php?proid='+product_id+'">'+product_name+'</a> added to <a href="cart.php">shopping cart</a>!</h3>', 'success');
		}
	}

	var wishlist = {
		'add': function(product_id, product_img, product_name) {
			addProductNotice('Product added to Wishlist', '<img src="'+product_img+'" alt="'+product_name+'">', '<h3>You must <a href="#">login</a>  to save <a href="#">'+product_name+'</a> to your <a href="#">wish list</a>!</h3>', 'success');
		}
	}
	var compare = {
		'add': function(product_id, product_img, product_name) {
			addProductNotice('Product added to compare', '<img src="'+product_img+'" alt="'+product_name+'">', '<h3>Success: You have added <a href="#">'+product_name+'</a> to your <a href="#">product comparison</a>!</h3>', 'success');
		}
	}

	/* ---------------------------------------------------
		jGrowl – jQuery alerts and message box
	-------------------------------------------------- */
	function addProductNotice(title, thumb, text, type) {
		$.jGrowl.defaults.closer = false;
		//Stop jGrowl
		//$.jGrowl.defaults.sticky = true;
		var tpl = thumb + '<h3>'+text+'</h3>';
		$.jGrowl(tpl, {		
			life: 4000,
			header: title,
			speed: 'slow',
			theme: type
		});
	}

	/*
	-----------------------------------
	Fuction Made By Anam
	-----------------------------------
	*/
	$(document).ready(function(){
		$(#addCart).blur(function(){
			var addCart = $(this).val();
			$.ajax({
				url:
				method:"POST",
				data:{addCart:addCart},
				dataType:"text",
				success:function(data){

				}
			});
		});
	});