jQuery(function($){
	
	var rascript = {
		cantoggle: true
	};
	
	
	var showCbox = function() {
		$('.edit-cbox > input').each().val('');
		$('.edit-cbox > textarea').each().val('');
		$('.edit-cbox').css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1.0},200);
	};
	
	var hideCbox = function() {
		$('.edit-cbox').css({opacity: 1.0, visibility: "visible"}).animate({opacity: 0.0},200,function(){
			$('.edit-cbox').css({visibility:'hidden'});
		});
	};

	$(document).ready(function(){	
		$('.diagram-box').each(function(){
			var datatarget = '#'+$(this).attr('data-target');
			if($(datatarget).is(':visible')) {
				$(datatarget).toggle();
			}
		});
		$('.diagram-box').on('mouseover',function(){
			$(this).stop().animate({backgroundColor: '#2ca9e3'},200);
			var datatarget = '#'+$(this).attr('data-target');
			var toptargetpos = parseInt($(this).css('top'))+parseInt($(this).height())+80;
			
				if($(this).attr('data-location') == 'top') {
					toptargetpos = parseInt($(this).css('top'))-100-120;
				}
			$(datatarget).css('top',toptargetpos+"px");
			$(datatarget).css('left',"170px");
			if($(datatarget).is(':visible')) {
				$(datatarget).toggle();
			}
			$(datatarget).stop().slideToggle();
		});
		
		$('.diagram-box').on('mouseout',function(){
			$(this).stop().animate({backgroundColor: '#1e7ca8'},200);
			var datatarget = '#'+$(this).attr('data-target');
			if(! $(datatarget).is(':visible')) {
				$(datatarget).toggle();
			}
			$(datatarget).stop().slideToggle();
			
		});
		
		$('.diagram-box > a').on('click',function(e){
			e.preventDefault();
		});
		$('.diagram-box').on('click',function(){
			var datatarget = '#'+$(this).attr('datatarget');
			if($(datatarget).is(':visible')) {
				$(datatarget).toggle();
			}
			
			$.post(
				tc_humandiag.ajaxurl,
				{
					
					action: 'humandiag_getdata',
					postID: $(this).attr('data-id'),
				},
				  function(data){
					$('.edit-cbox #id').val(data['id']);
					$('.edit-cbox #title').val(data['title']);
					$('.edit-cbox #details').val(data['details']);
				}
			);
			showCbox();
		});
		
		$('.exit-btn').on('click',function(){
			hideCbox();
		});
	});
	
	$(window).load(function(){
				
		$('.diagram-box').each(function(){
			var datatarget = '#'+$(this).attr('data-target');
			if($(datatarget).is(':visible')) {
				$(datatarget).toggle();
			}
		});
	});
});