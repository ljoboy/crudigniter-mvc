jQuery.notif_biru();
(function($)
{
	$(function()
	{
		$('.notif').text('<?php echo $isi ?>');
		$('.notif').css('background','#007BFF');
		$('.notif').animate(
		{
			top:"100px",
			opacity:"0.9"
		},700);
		
		setTimeout(function()
		{
			$('.notif').animate(
			{
				top:"-100px",
				opacity:"0"
			},900);
		},4000);
	});
})(jQuery);