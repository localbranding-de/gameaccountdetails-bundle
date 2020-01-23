jQuery.noConflict();
/*
jQuery( document ).ready(addColorListeners());

function addColorListeners()
{
	jQuery('input.tl_text').on('click',function(event){
		var element = jQuery(this);
		if(!jQuery('#kb_selected_color').length){
				jQuery('#tl_lb_branding').append('<input type="color" id="kb_selected_color">');
		}


					// Farbe aus ColorPicker auslesen
					var theInput = document.getElementById("kb_selected_color");

					var theColor = theInput.value;


					theInput.addEventListener("input", function handleInput() {

					// Farcode (Hex) schreiben

					jQuery(element).val(theInput.value);
		theInput.removeEventListener("input", handleInput);

			jQuery('#kb_selected_color').remove();
					}, false);
						jQuery('#kb_selected_color').trigger('click');

			});



}
*/
setTimeout(function(){ addColorListeners(); }, 500);

function addColorListeners() {

	inputColor();

	jQuery('input.moor-okButton').on('click',function(){

	inputColor();

	});
}
function inputColor(){


		jQuery('input.tl_text').each(function(){
			if(jQuery("#"+jQuery(this).attr('id')+"box").length)
				{
				jQuery("#"+jQuery(this).attr('id')+"box").remove();
				}
			jQuery(this).next('img').after('<div id="'+jQuery(this).attr('id')+'box" style="background-color:#'+jQuery(this).val()+';border-radius: 2px; border: 1px solid #ccc ;height:29px; width:29px; float:left;" class="lb_colorbox"></div>');
			});



}
