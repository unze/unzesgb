sel = {
	el: null,
	start: -1,
	end: -1,
	range: null,
	
	setSelection: function(el) {
		if (typeof el == 'object') {
			sel.el = el;
		
			if (sel.el.setSelectionRange)	{
		    	sel.start = sel.el.selectionStart;
		    	sel.end = sel.el.selectionEnd;
		    }
			else if (document.selection) {
		    	sel.range = document.selection.createRange();
		    }
		}
	},
	
	replaceSelection: function(str1, str2) {	
		if (typeof str1 != 'undefined')
		{
			if (sel.el != null)
			{					
				var setTags = typeof str2 != 'undefined';

				if (sel.el.setSelectionRange)
			    {
			        if (setTags)
			        {
			        	sel.el.value = 
							sel.el.value.substring(0, sel.start) 
							+ str1 
							+ sel.el.value.substring(sel.start, sel.end)
							+ str2 
							+ sel.el.value.substring(sel.end);
					}
					else
					{				
						sel.el.value = 
							sel.el.value.substring(0, sel.start) 
							+ str1 
							+ sel.el.value.substring(sel.end);
					}
			        if (sel.start != sel.end) {
			        	if (setTags) {
			         		sel.el.selectionStart = sel.start;
			         		sel.el.selectionEnd = sel.end += str2.length + str1.length;
			         	}
			         	else
			         		sel.el.selectionStart = sel.start = sel.el.selectionEnd = sel.end = sel.start + str1.length;
			        }
			        else {
			        	if (setTags)
			         		sel.el.selectionStart = sel.start = sel.el.selectionEnd = sel.end += str1.length;
			         	else
			         		sel.el.selectionStart = sel.start = sel.el.selectionEnd = sel.end = sel.start + str1.length;
					}
			        
			    }
			    else if (document.selection)
			    {
			        if (sel.range.parentElement() == sel.el)
			        {
			        	var length = sel.range.text.length
			        	var selection = length > 0;
			            sel.range.text = (setTags) 
							? (str1 + sel.range.text + str2)
							: str1;

			            if (selection) {
			            	if (setTags)
			            		sel.range.moveEnd('character', str1.length + str2.length + length);
			            		sel.range.moveStart('character', -(str1.length + str2.length + length));
						}
						else {
							if (setTags)
								sel.range.move('character', -str2.length);
						}
						
						sel.range.select();
			        }
			    }
			    else
				{
					if (typeof str2 == 'undefined')
						str2 = '';
					sel.el.value += str1 + str2;
				}
				
				sel.el.focus();
		    }
		}
	}
}
