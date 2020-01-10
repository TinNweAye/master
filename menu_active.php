		//for menubar active

		var txt = "<?php echo $this->webroot.$this->params['controller'].'/'.$this->params['action']; ?>";
	    $("li.class").each(function() {
			var text = $(this).find("a.linkclass").attr('href');
			var param = "<?php echo $this->webroot.$this->params['controller']; ?>";
			if(text.indexOf(param) !== -1) {
				$(this).css({'border-bottom': '3px solid #99ccff'});
			}

			// for submenu active

			var c_name="<?php echo $this->params['controller']; ?>";
	    $("li.uk").each(function() {
			var text = $(this).find("a.textheader").attr('href');
			var param = "<?php echo $this->webroot.$this->params['controller']; ?>";

			if(c_name=='controllername' || c_name=='controllername' ) {
				$('#header id').css({'border-bottom': '3px solid #99ccff'});
			}
			 if(c_name=='controllername'){
				var txt = "<?php echo $this->params['controller'].'/'.$this->params['action']; ?>";
				if(txt=='controllername/action'){
					$('#header id').css({'border-bottom': '3px solid #99ccff'});
				}else{
					$('#header id').css({'border-bottom': '3px solid #99ccff'});
				}
			}else if(text.indexOf(param) !== -1) {
				$(this).css({'border-bottom': '3px solid #99ccff'});
			}
		});