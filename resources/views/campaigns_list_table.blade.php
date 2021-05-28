<div class="table-wrapper-scroll-y my-custom-scrollbar scrollbar scrollbar-secondary">
<table  class="display" id="campaignsTable" cellspacing="0">
	<thead>
		<tr>
			<th id="" class="nameCol1" align="center"></th>
			<th id="statusCol" class="baseCol testHover">
				<div class="btn-group dropstart " style="float:right;">
					<button type="button" class="tableButton testHover" id="selectColumm" data-toggle="dropdown" aria-haspopup="true">
						<svg xmlns="http://www.w3.org/2000/svg" width="14" height="20" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
				 		<path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
						</svg>
					</button>
		 			<div class="dropdown-menu">
						<a class="dropdown-item">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" onchange="setStates('active','#activeCh')" id="activeCh">
								<label class="form-check-label" >
								Active
								</label>
							</div>
						</a>
						<a class="dropdown-item">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" onchange="setStates('draft','#draftCh')" id="draftCh">
								<label class="form-check-label" >
								Draft
								</label>
							</div>
						</a>
						<a class="dropdown-item">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" onchange="setStates('inactive','#inactiveCh')" id="inactiveCh" >
								<label class="form-check-label" >
								Inactive
								</label>
							</div>
						</a>
						<a class="dropdown-item">
							<div class="form-check">
								<button type="button" class="tableButton testHover filterButton" onclick="listCampaigns(val,'asc',1,row)" id="filterButton">Apply
								</button>
							</div>
						</a>
					</div>
				</div>	
				<div style="float:right;" onclick="sort('state','asc',1,row)">Status
				</div>
			</th>
			<th id="clickCol" class="baseCol">Click</th>
			<th id="viewsCol" class="baseCol">Views</th>
			<th id="bugetCol" class="bugetCol testHover" >
				<div class="btn-group dropstart" style="float:right;">
					<button type="button" class="tableButton testHover" data-toggle="dropdown" aria-haspopup="true" >
						<svg xmlns="http://www.w3.org/2000/svg" width="14" height="20" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
						<path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
						</svg>
					</button>
					<div class="dropdown-menu" id="bugetDropDown">
						<a class="dropdown-item">
							<span class="font-weight-bold indigo-text mr-2 mt-1">0</span>
							<input type="range" class="border-0" min="0" max="1000000" id="customRange" onchange="setMaxBuget(this.value)" style="width: 180px;" >
							<span class="font-weight-bold indigo-text mr-2 mt-1">1000000</span>
						</a>
						<a class="dropdown-item">
							<button type="button" class="tableButton testHover filterButton" onclick="listCampaigns(val,'asc',1,row)" id="filterButton" style="float:left" >Apply</button>
							<span id="slider_value" style="float:right"><div class="sliebarVal"></div></span>
						</a>
					</div>
					<script type="text/javascript">
						$('.sliebarVal').html(max_buget_val);
						document.getElementById('customRange').value=max_buget_val;
					</script>
				</div>
				<div style="float:right;" onclick="sort('buget','asc',1,row)">Buget</div>
			</th>
			<th class="baseCol"></th>
			<th class="baseCol">
				<button class="button1 button" style="font-size: 14px" onclick="resetFilter()">Reset Filter</button>
			</th>
		</tr>
	</thead>
	<script type="text/javascript">
		$(document).on('input', '#customRange', function() {
    	$('#slider_value').html( $(this).val() );
		});
	</script>
	<tbody id="test">
	</tbody>
</table>
</div>
	<br>
<div class="d-flex justify-content-left" style="float:left">
	<div class="dropdown" align="left">
		<script type="text/javascript">
		reCheckFilter();
    $("#dropdownCampaigns").html(row+' rows');
		</script>
  <button class="btn dropdown-toggle" id="dropdownCampaigns" data-toggle="dropdown" aria-haspopup="true">
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" value="10" onclick="listCampaigns('name','asc',1,10)">10</a>
    <a class="dropdown-item" value="25" onclick="listCampaigns('name','asc',1,25)">25</a>
    <a class="dropdown-item" value="50" onclick="listCampaigns('name','asc',1,50)">50</a>
  </div>
</div>
{!! $campaigns->links() !!} 
</div>
<div>
	<button class="button button1" onclick="deleteCampaigns()" align="right" style="float:right">Delete</button>
</div>

