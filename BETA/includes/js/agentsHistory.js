	//javascriptHandler = "/includes/javascriptHandler.php";
	function initTrees() {
		$("#agentsHistory").treeview({
			collapsed: true,animated: "fast"
		});
	}
	$(document).ready(function(){
		initTrees();
		$( ".draggable" ).draggable({
			revert : true,
			zIndex: 1,
			containment:'parent'
		});
		$( ".draggable" ).droppable({
			drop: function( event, ui ) {
				var dragged = ui.draggable;
				idDragged = $(dragged).find("span").find("input").val();
				idDropped = $(this).find("span").find("input").val();
				historySum(idDragged , idDropped);
			}
		});
                $(function() {
			$('.datepicker').datetimepicker({
				format:'Y-m-d'
			});
		});
	});
